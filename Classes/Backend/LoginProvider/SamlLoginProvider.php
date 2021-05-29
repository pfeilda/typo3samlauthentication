<?php


namespace DanielPfeil\Samlauthentication\Backend\LoginProvider;

use TYPO3\CMS\Backend\Controller\LoginController;
use TYPO3\CMS\Backend\LoginProvider\LoginProviderInterface;
use TYPO3\CMS\Core\Authentication\BackendUserAuthentication;
use TYPO3\CMS\Core\Page\PageRenderer;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Fluid\View\StandaloneView;

class SamlLoginProvider implements LoginProviderInterface
{
    public function render(StandaloneView $view, PageRenderer $pageRenderer, LoginController $loginController)
    {
        /**
         * @var $beuser BackendUserAuthentication
         */
        $beuser = $GLOBALS["BE_USER"];
        $_POST["uident"] = rand();
        $beuser->start();

        $pageRenderer->loadRequireJsModule('TYPO3/CMS/Backend/UserPassLogin');

        $view->setTemplatePathAndFilename(
            GeneralUtility::getFileAbsFileName(
                'EXT:samlauthentication/Resources/Private/Templates/Backend/samllogin.html'
            )
        );

        $view->assign('enablePasswordReset', false);
    }
}
