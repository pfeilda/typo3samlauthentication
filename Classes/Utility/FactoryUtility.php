<?php
/**
 * User: pfeilda
 * Date: 08.02.2018
 * Time: 22:09
 */

namespace DanielPfeil\Samlauthentication\Utility;

use DanielPfeil\Samlauthentication\Domain\Model\Fieldmapping;
use DanielPfeil\Samlauthentication\Domain\Model\Serviceprovider;
use DanielPfeil\Samlauthentication\Domain\Model\Tablemapping;
use Doctrine\DBAL\Driver\Mysqli\MysqliStatement;
use TYPO3\CMS\Core\Database\ConnectionPool;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Object\ObjectManager;
use TYPO3\CMS\Extbase\Persistence\ObjectStorage;
use TYPO3\CMS\Extbase\Utility\DebuggerUtility;

abstract class FactoryUtility
{
    public static function getSAMLUtility(): SamlUtility
    {
        //Todo make configurable
        if (true) {
            //apache shibd
            return new ApacheSamlUtility();
        } else {
            //openSAML
//            return ;
        }
    }

    public static function getExtensionConfiguration(): array
    {
        return unserialize($GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf']['samlauthentication']);
    }

    public static function getServiceProviders(): array
    {
        $queryBuilderServiceProviders = GeneralUtility::makeInstance(ConnectionPool::class)
            ->getQueryBuilderForTable('tx_samlauthentication_domain_model_serviceprovider');

        $serviceProviders = $queryBuilderServiceProviders->select("*")->from('tx_samlauthentication_domain_model_serviceprovider')->execute();
        $serviceProvidersArray = $serviceProviders->fetchAll();
        foreach ($serviceProvidersArray as $key => $value){
            $serviceProvider = self::getServiceProviderObjectWithoutTablemappingFromArray($value);
            $serviceProvider->setTablemapping(self::getTableMappingObjectStorageForServiceProvider($serviceProvider));
            $serviceProvidersArray[$key] = $serviceProvider;
        }
        return $serviceProvidersArray;
    }

    private static function getServiceProviderObjectWithoutTablemappingFromArray(array $serviceProviderArray):Serviceprovider {
        $serviceProvider = new Serviceprovider();

        $serviceProvider->setUid($serviceProviderArray["uid"]);
        $serviceProvider->setPid($serviceProviderArray["pid"]);
        $serviceProvider->setTitle($serviceProviderArray["title"]);
        $serviceProvider->setHidden($serviceProviderArray["hidden"]);
        //todo implement fallback for empty value
        $serviceProvider->setDestinationpid($serviceProviderArray["destinationpid"]);
        $serviceProvider->setType($serviceProviderArray["type"]);
        $serviceProvider->setPrefix($serviceProviderArray["prefix"]);
        $serviceProvider->setIdentityprovider($serviceProviderArray["identityprovider"]);
        $serviceProvider->setContext($serviceProviderArray["context"]);

        return $serviceProvider;
    }

    private static function getTableMappingFromArrayWithoutFieldMapping(array $tableMappingArray):Tablemapping{
        $tableMapping = new Tablemapping();

        $tableMapping->setUid($tableMappingArray["uid"]);
        $tableMapping->setPid($tableMappingArray["pid"]);
        $tableMapping->setHidden($tableMappingArray["hidden"]);
        $tableMapping->setTable($tableMappingArray["table"]);

        return $tableMapping;
    }

    private static function getFieldMappingFromArray(array $fieldMappingArray):Fieldmapping{
        $fieldMapping = new Fieldmapping();

        $fieldMapping->setUid($fieldMappingArray["uid"]);
        $fieldMapping->setPid($fieldMappingArray["pid"]);
        $fieldMapping->setHidden($fieldMappingArray["hidden"]);
        $fieldMapping->setField($fieldMappingArray["field"]);
        $fieldMapping->setForeignfield($fieldMappingArray["foreignfield"]);

        return $fieldMapping;
    }

    private static function getTableMappingObjectStorageForServiceProvider(Serviceprovider $serviceprovider):ObjectStorage{
        $objectManager = GeneralUtility::makeInstance(ObjectManager::class);
        $objectStorage = $objectManager->get(ObjectStorage::class);
        $queryBuilderTableMapping = GeneralUtility::makeInstance(ConnectionPool::class)
            ->getQueryBuilderForTable('tx_samlauthentication_domain_model_tablemapping');

        $tableMappingsArray = $queryBuilderTableMapping
            ->select("*")
            ->from('tx_samlauthentication_domain_model_tablemapping')
            ->execute()->fetchAll();
        foreach ($tableMappingsArray as $key => $value){
            $tableMapping = self::getTableMappingFromArrayWithoutFieldMapping($value);
            $tableMapping->setFields(self::getFieldMappingObjectStorageForTableMapping($tableMapping));
            $objectStorage->attach($tableMapping);
        }

        return $objectStorage;
    }

    private static function getFieldMappingObjectStorageForTableMapping(Tablemapping $tablemapping): ObjectStorage{
        $objectManager = GeneralUtility::makeInstance(ObjectManager::class);
        $objectStorage = $objectManager->get(ObjectStorage::class);
        $queryBuilderFieldMapping = GeneralUtility::makeInstance(ConnectionPool::class)
            ->getQueryBuilderForTable('tx_samlauthentication_domain_model_fieldmapping');

        $fieldMappingsArray = $queryBuilderFieldMapping
            ->select("*")
            ->where(
                $queryBuilderFieldMapping->expr()->eq(
                    'table',
                    $queryBuilderFieldMapping->createNamedParameter($tablemapping->getUid())
                )
            )
            ->from('tx_samlauthentication_domain_model_fieldmapping')
            ->execute()->fetchAll();

        foreach ($fieldMappingsArray as $key => $value){
            $fieldMapping = self::getFieldMappingFromArray($value);
            $objectStorage->attach($fieldMapping);
        }

        return $objectStorage;
    }
}
