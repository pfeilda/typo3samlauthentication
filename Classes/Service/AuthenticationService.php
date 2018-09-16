<?php

namespace DanielPfeil\Samlauthentication\Service;

use DanielPfeil\Samlauthentication\Enum\AuthenticationStatus;
use DanielPfeil\Samlauthentication\Utility\FactoryUtility;
use DanielPfeil\Samlauthentication\Utility\ServiceProviderUtility;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Utility\DebuggerUtility;

class AuthenticationService extends \TYPO3\CMS\Sv\AuthenticationService
{
    public function authUser(array $user)
    {
        $serviceProviderUtility = ServiceProviderUtility::getInstance();

        $activeServiceProviders = $serviceProviderUtility->getActive(FactoryUtility::getServiceProviders());

        foreach ($activeServiceProviders as $activeServiceProvider) {
            $samlComponent = FactoryUtility::getSAMLUtility($activeServiceProvider);
            $samlUserData = $samlComponent->getUserData($activeServiceProvider);

            if (TYPO3_MODE === "FE") {
                $samlUsername = $samlUserData["fe_users"]["username"]->getValue();
            } else {
                $samlUsername = $samlUserData["be_users"]["username"]->getValue();
            }

            if ($samlUsername == $user["username"]) {
                return AuthenticationStatus::SUCCESS_BREAK;
            }
        }
        return AuthenticationStatus::FAIL_CONTINUE;
    }
}
