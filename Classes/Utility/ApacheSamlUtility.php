<?php
/**
 * User: pfeilda
 * Date: 08.02.2018
 * Time: 22:07
 */

namespace DanielPfeil\Samlauthentication\Utility;

use DanielPfeil\Samlauthentication\Domain\Model\Session;

class ApacheSamlUtility implements SamlUtility
{
    public function getData(): array
    {
        // TODO: Implement getData() method.
    }

    public function isSessionExisting(): boolean
    {
        // TODO: Implement isSessionExisting() method.
    }

    public function getSession(): Session
    {
        // TODO: Implement getSession() method.
    }

    public function getUserData(): array
    {
        /***************************
         *** Only for developing ***
         ***************************/
        if ((bool)FactoryUtility::getExtensionConfiguration()['debugMode']) {
            return [
                "uid" => "admin3",
                "displayName" => "Daniel Pfeil",
                "givenName" => "Daniel",
                "sureName" => "Pfeil"
            ];
        }
        /***************************
         *** Only for developing ***
         ***************************/
    }

    public function getGroup(): array
    {
        // TODO: Implement getGroup() method.
    }

    public function getUserGroups($user)
    {
        // TODO: Implement getUserGroups() method.
    }

}
