<?php

namespace DanielPfeil\Samlauthentication\Utility;

use DanielPfeil\Samlauthentication\Domain\Model\Serviceprovider;
use DanielPfeil\Samlauthentication\Enum\ServiceProviderType;

class ServiceProviderUtility
{
    private function __construct()
    {
    }

    /**
     * @var ServiceProviderUtility
     */
    private static $instance;

    public static function getInstance(): ServiceProviderUtility
    {
        if (!isset(ServiceProviderUtility::$instance)) {
            ServiceProviderUtility::$instance = new  ServiceProviderUtility();
        }
        return ServiceProviderUtility::$instance;
    }

    /**
     * @param Serviceprovider[] $serviceProviders
     * @return Serviceprovider[]
     */
    final public function getActive(array $serviceProviders): array
    {
        $active = [];
        foreach ($serviceProviders as $serviceProvider) {
            if (!$serviceProvider->isHidden()) {
                $prefix = $serviceProvider->getPrefix();
                $idp = $this->getIdp($prefix, $serviceProvider->getType());
                if ($idp == $serviceProvider->getIdentityprovider()) {
                    if (TYPO3_MODE === $serviceProvider->getContext() || "FB" === $serviceProvider->getContext()) {
                        $active[] = $serviceProvider;
                    }
                }
            }
        }
        return $active;
    }

    final private function getIdp(String $prefix, int $type): ?String
    {
        $index = $prefix . "Shib-Identity-Provider";
        if ($type === ServiceProviderType::APACHE_SHIBBOLETH && isset($_SERVER[$index])) {
            return $_SERVER[$index];
        }
        return null;
    }
}
