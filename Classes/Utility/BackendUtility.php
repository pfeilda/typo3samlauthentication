<?php


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
                $field['Field']
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
