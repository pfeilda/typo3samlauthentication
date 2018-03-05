<?php
/**
 * User: pfeilda
 * Date: 08.02.2018
 * Time: 22:09
 */

namespace DanielPfeil\Samlauthentication\Utility;

use DanielPfeil\Samlauthentication\Domain\Model\Serviceprovider;
use Doctrine\DBAL\Driver\Mysqli\MysqliStatement;
use TYPO3\CMS\Core\Database\ConnectionPool;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Object\ObjectManager;

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
        }
    }

    public static function getExtensionConfiguration(): array
    {
        return unserialize($GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf']['samlauthentication']);
    }

    public static function getServiceProviders(): array
    {
        $queryBuilderServiceProviders = GeneralUtility::makeInstance(ConnectionPool::class)->getQueryBuilderForTable('tx_samlauthentication_domain_model_serviceprovider');
        $queryBuilderTableMapping = GeneralUtility::makeInstance(ConnectionPool::class)->getQueryBuilderForTable('tx_samlauthentication_domain_model_tablemapping');
        $queryBuilderFieldMapping = GeneralUtility::makeInstance(ConnectionPool::class)->getQueryBuilderForTable('tx_samlauthentication_domain_model_fieldmapping');

        /**
         * @var MysqliStatement $serviceProviders
         */
        $serviceProviders = $queryBuilderServiceProviders->select("*")->from('tx_samlauthentication_domain_model_serviceprovider')->execute();
        $serviceProvidersArray = $serviceProviders->fetchAll();
        return $serviceProvidersArray;
    }

    private static function getServiceProviderObjectWithoutTablemappingFromArray(array $serviceProviderArray): Serviceprovider{
        $objectManager = GeneralUtility::makeInstance(ObjectManager::class);
        $serviceProvider = $objectManager->get(Serviceprovider::class);
        $serviceProvider->setUid($serviceProviderArray["uid"]);
        $serviceProvider->setPid($serviceProviderArray["pid"]);
        $serviceProvider->;
    }
}
