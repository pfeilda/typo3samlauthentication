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
use DanielPfeil\Samlauthentication\Domain\Model\Tablemapping;
use TYPO3\CMS\Core\Database\ConnectionPool;
use TYPO3\CMS\Core\Utility\GeneralUtility;

//TODO maybe hooks at the start and the end of the ItemProcFunc
class BackendUtility
{
    private $tableMappingTableName = 'tx_samlauthentication_domain_model_tablemapping';

    public function getTables(array &$params)
    {
        foreach ($this->getConnections() as $connection) {
            $tables = $connection->getSchemaManager()->listTableNames();
            foreach ($tables as $table) {
                $params["items"][] = [$table, $table];
            }
        }
    }

    public function getFields(array &$params)
    {
        $queryBuilderTableMapping = GeneralUtility::makeInstance(ConnectionPool::class)
            ->getQueryBuilderForTable($this->tableMappingTableName);
        //TODO export to a factory method
        $tableRecord = $queryBuilderTableMapping->select('table')
            ->from($this->tableMappingTableName)
            ->where(
                $queryBuilderTableMapping->expr()->eq(
                    'uid',
                    $queryBuilderTableMapping->createNamedParameter(
                        $params['row']['table'],
                        \PDO::PARAM_INT
                    )
                )
            )
            ->execute()
            ->fetch();
        $connectionPool = GeneralUtility::makeInstance(ConnectionPool::class);
        $connection = $connectionPool->getConnectionForTable($this->tableMappingTableName);
        $fields = $connection->query(
            "DESC `" .
            $connection->getDatabase() .
            "`.`" .
            $tableRecord["table"]
            . "`;"
        )->fetchAll();

        foreach ($fields as $field) {
            $params["items"][] = [
                $field['Field'],
                $field['Field'],
            ];
        }
    }

    private function getConnections(): array
    {
        $connectionPool = GeneralUtility::makeInstance(ConnectionPool::class);
        $connectionNames = $connectionPool->getConnectionNames();
        $connections = [];
        foreach ($connectionNames as $connectionName) {
            $connections[] = $connectionPool->getConnectionByName($connectionName);
        }
        return $connections;
    }

    /**
     * @param Fieldmapping[] $fieldMapping
     */
    private function saveValues(array $fieldMapping, Tablemapping $tablemapping): bool
    {

    }
}
