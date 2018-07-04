<?php
/**
 * User: pfeilda
 * Date: 08.02.2018
 * Time: 22:07
 */

namespace DanielPfeil\Samlauthentication\Utility;

use DanielPfeil\Samlauthentication\Domain\Model\Serviceprovider;
use DanielPfeil\Samlauthentication\Domain\Model\Session;
use TYPO3\CMS\Extbase\Utility\DebuggerUtility;

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

        foreach ($serviceprovider->getTablemapping() as $tablemapping) {
            DebuggerUtility::var_dump($tablemapping);
        }

        return [
            "uid" => "admin5",
            "displayName" => "Daniel Pfeil",
            "givenName" => "Daniel",
            "sureName" => "Pfeil"
        ];
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
}
