<?php
/**
 * Copyright (C) 2018  Daniel Pfeil <daniel.pfeil@itpfeil.de
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 *
 */

namespace DanielPfeil\Samlauthentication\Utility;

use DanielPfeil\Samlauthentication\Domain\Model\Fieldmapping;
use DanielPfeil\Samlauthentication\Domain\Model\FieldValue;
use DanielPfeil\Samlauthentication\Domain\Model\Serviceprovider;
use DanielPfeil\Samlauthentication\Domain\Model\Tablemapping;
use TYPO3\CMS\Core\Database\ConnectionPool;
use TYPO3\CMS\Core\Database\Query\QueryBuilder;
use TYPO3\CMS\Core\Utility\GeneralUtility;

class ApacheSamlUtility implements SamlUtility
{
    public function getUserData(Serviceprovider $serviceprovider): array
    {
        $result = [];

        /**
         * @var $tablemapping Tablemapping
         */
        foreach ($serviceprovider->getTablemapping() as $tablemapping) {
            $result[$tablemapping->getTable()] = $this->getDataForTableMapping(
                $tablemapping,
                $serviceprovider->getPrefix()
            );
        }

        return $result;
    }

    public function saveUserData(Serviceprovider $serviceprovider): bool
    {
        $tableMappings = $serviceprovider->getTablemapping();
        /**
         * @var Tablemapping $tableMapping
         */
        foreach ($tableMappings as $tableMapping) {
            $data = $this->getDataForTableMapping($tableMapping, $serviceprovider->getPrefix());

            /**
             * @var QueryBuilder $queryBuilderFeUsers
             */
            $queryBuilderFeUsers = GeneralUtility::makeInstance(ConnectionPool::class)
                ->getQueryBuilderForTable($tableMapping->getTable());

            $values = [
                "tstamp" => time(),
                "pid" => $serviceprovider->getDestinationpid(),
            ];

            foreach ($data as $field) {
                if ($field->getValue() != null) {
                    $index = $field->getField();
                    $values[$index] = $field->getValue();
                }
            }

            $findUser = $queryBuilderFeUsers
                ->count('*')
                ->from($tableMapping->getTable());
            /**
             * @var Fieldmapping $field
             */
            foreach ($tableMapping->getFields() as $field) {
                if ($field->isIdentifier()) {
                    $predicate = $queryBuilderFeUsers->expr()->eq(
                        $field->getField(),
                        $queryBuilderFeUsers->createNamedParameter($values[$field->getField()])
                    );

                    $findUser->andWhere($predicate);
                }
            }

            $userExists = $findUser->execute()->fetch()['COUNT(*)'];
            if ($userExists === 0) {
                $result = $queryBuilderFeUsers->insert($tableMapping->getTable())
                    ->values($values)
                    ->execute();
            } else {
                //todo implement update
            }
        }
        //todo make check
        return true;
    }

    private function getDataForTableMapping(Tablemapping $tablemapping, string $prefix): array
    {
        $result = [];

        foreach ($tablemapping->getFields() as $field) {
            $fieldValue = new FieldValue();
            $fieldValue->setField($field->getField());
            $fieldValue->setForeignField($field->getForeignField());

            $key = $prefix . $fieldValue->getForeignField();
            if (array_key_exists($key, $_SERVER)) {
                $fieldValue->setValue($_SERVER[$key]);
            } else {
                if ($field->hasFallback()) {
                    $fieldValue->setValue($field->getDefaultvalue());
                }
            }

            $result[$field->getField()] = $fieldValue;
        }

        return $result;
    }
}
