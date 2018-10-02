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
