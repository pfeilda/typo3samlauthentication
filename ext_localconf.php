<?php
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addService(
    $_EXTKEY,
    'auth',
    \DanielPfeil\Samlauthentication\Service\AuthenticationService::class,
    array(
        'title' => 'Authentication service',
        'description' => 'Authentication with over a Service Provider.',

        'subtype' => 'authUserFE, authUserBE',

        'available' => true,
        'priority' => 100,
        'quality' => 100,

        'className' => 'DanielPfeil\\Samlauthentication\\Service\\AuthenticationService'
    )
);