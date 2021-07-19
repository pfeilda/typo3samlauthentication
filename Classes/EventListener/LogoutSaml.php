<?php
declare(strict_types=1);

namespace DanielPfeil\Samlauthentication\EventListener;


use TYPO3\CMS\Core\Configuration\ExtensionConfiguration;
use TYPO3\CMS\Core\Exception;
use TYPO3\CMS\Extbase\Utility\DebuggerUtility;

class LogoutSaml
{
    public function __invoke(\TYPO3\CMS\FrontendLogin\Event\LogoutConfirmedEvent $event): void {
        $logoutServiceProvider = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(ExtensionConfiguration::class)
            ->get('samlauthentication', 'logoutServiceProvider');

        if (strlen($logoutServiceProvider) > 0) {
            $auth = new \SimpleSAML\Auth\Simple($logoutServiceProvider);
            if ($auth && $auth->isAuthenticated()) {
                $auth->logout();
            }
        }
    }
}
