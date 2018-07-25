<?php
/**
 * User: pfeilda
 * Date: 08.02.2018
 * Time: 22:07
 */

namespace DanielPfeil\Samlauthentication\Utility;

use DanielPfeil\Samlauthentication\Domain\Model\Fieldmapping;
use DanielPfeil\Samlauthentication\Domain\Model\FieldValue;
use DanielPfeil\Samlauthentication\Domain\Model\Serviceprovider;
use DanielPfeil\Samlauthentication\Domain\Model\Session;
use DanielPfeil\Samlauthentication\Domain\Model\Tablemapping;
use TYPO3\CMS\Core\Database\ConnectionPool;
use TYPO3\CMS\Core\Database\Query\QueryBuilder;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Persistence\ObjectStorage;

class ApacheSamlUtility implements SamlUtility
{
    public function getData(): array
    {
        // TODO: Implement getData() method.
        return null;
    }

    public function isSessionExisting(): bool
    {
        // TODO: Implement isSessionExisting() method.
        return null;
    }

    public function getSession(): Session
    {
        // TODO: Implement getSession() method.
        return null;
    }

    public function getUserData(Serviceprovider $serviceprovider): array
    {
        /***************************
         *** Only for developing ***
         ***************************/
        if ((bool)FactoryUtility::getExtensionConfiguration()['debugMode']) {
            return [
                "uid" => "admin5",
                "displayName" => "Daniel Pfeil",
                "givenName" => "Daniel",
                "sureName" => "Pfeil"
            ];
        }
        /***************************
         *** Only for developing ***
         ***************************/

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
        /**
         * @var ObjectStorage<Tablemapping> $tableMappings
         */
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
                "pid" => $serviceprovider->getDestinationpid()
            ];

            foreach ($data as $field) {
                if ($field->getValue() != null) {
                    //$index = $queryBuilderFeUsers->quoteIdentifier($field->getField());
                    //$values[$index] = $queryBuilderFeUsers->createNamedParameter($field->getValue());
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
                /*$result = $queryBuilderFeUsers->update($tableMapping->getTable())
                    ->values($values)
                    ->execute();*/
            }
            //DebuggerUtility::var_dump($result);
        }
        //todo make check
        return true;
    }

    public function getGroup(): array
    {
        // TODO: Implement getGroup() method.
        return null;
    }

    public function getUserGroups($user)
    {
        // TODO: Implement getUserGroups() method.
        return null;
    }

    final public function getDataForTableMapping(Tablemapping $tablemapping, string $prefix): array
    {
        $result = [];
        foreach ($tablemapping->getFields() as $field) {
            $fieldValue = new FieldValue();
            $fieldValue->setField($field->getField());
            $fieldValue->setForeignField($field->getForeignField());
            $fieldValue->setValue($_SERVER[$prefix . $fieldValue->getForeignField()]);
            $result[$field->getField()] = $fieldValue;
        }
        return $result;
//        return [
//            "uid" => "admin5",
//            "displayName" => "Daniel Pfeil",
//            "givenName" => "Daniel",
//            "sureName" => "Pfeil"
//        ];
    }
}
