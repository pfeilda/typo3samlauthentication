<?php
/**
 * User: pfeilda
 * Date: 08.02.2018
 * Time: 22:09
 */

namespace DanielPfeil\Samlauthentication\Utility;

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

    public static function getExtensionConfiguration():array
    {
        return unserialize($GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf']['samlauthentication']);
    }
}
