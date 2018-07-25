<?php

namespace spec\DanielPfeil\Samlauthentication\Utility;

use DanielPfeil\Samlauthentication\Domain\Model\Serviceprovider;
use DanielPfeil\Samlauthentication\Enum\ServiceProviderContext;
use DanielPfeil\Samlauthentication\Enum\ServiceProviderType;
use DanielPfeil\Samlauthentication\Utility\ServiceProviderUtility;
use PhpSpec\ObjectBehavior;

class ServiceProviderUtilitySpec extends ObjectBehavior
{
    /**
     * @var Serviceprovider[]
     */
    private $serviceProviders;

    /**
     * @var Serviceprovider[]
     */
    private $activeserviceProviders;

    /**
     * @var Serviceprovider[]
     */
    private $inactiveserviceProviders;

    final public function let()
    {
        if (!defined('TYPO3_MODE')) {
            define("TYPO3_MODE", "BE");
        }

        $this->beConstructedThrough('getInstance');

        $this->activeserviceProviders = [];

        $serviceProvider = new Serviceprovider();
        $serviceProvider->setUid(1);
        $serviceProvider->setType(ServiceProviderType::APACHE_SHIBBOLETH);
        $serviceProvider->setContext(ServiceProviderContext::FRONT_AND_BACK_END);
        $serviceProvider->setHidden(false);
        $serviceProvider->setPrefix("prefix_eins_");
        $serviceProvider->setIdentityprovider("https://test.eins");
        $this->activeserviceProviders[] = $serviceProvider;

        $serviceProvider = new Serviceprovider();
        $serviceProvider->setUid(2);
        $serviceProvider->setType(ServiceProviderType::APACHE_SHIBBOLETH);
        $serviceProvider->setContext(ServiceProviderContext::BACK_END);
        $serviceProvider->setHidden(false);
        $serviceProvider->setPrefix("prefix_zwei_");
        $serviceProvider->setIdentityprovider("https://test.zwei");
        $this->activeserviceProviders[] = $serviceProvider;

        $serviceProvider = new Serviceprovider();
        $serviceProvider->setUid(3);
        $serviceProvider->setType(ServiceProviderType::APACHE_SHIBBOLETH);
        $serviceProvider->setContext(ServiceProviderContext::BACK_END);
        $serviceProvider->setHidden(true);
        $serviceProvider->setPrefix("prefix_zwei_");
        $serviceProvider->setIdentityprovider("https://test.zwei");
        $this->inactiveserviceProviders[] = $serviceProvider;

        $serviceProvider = new Serviceprovider();
        $serviceProvider->setUid(4);
        $serviceProvider->setType(ServiceProviderType::APACHE_SHIBBOLETH);
        $serviceProvider->setContext(ServiceProviderContext::BACK_END);
        $serviceProvider->setHidden(false);
        $serviceProvider->setPrefix("prefix_vier_");
        $serviceProvider->setIdentityprovider("https://test.zwei");
        $this->inactiveserviceProviders[] = $serviceProvider;

        $serviceProvider = new Serviceprovider();
        $serviceProvider->setUid(5);
        $serviceProvider->setType(ServiceProviderType::APACHE_SHIBBOLETH);
        $serviceProvider->setContext(ServiceProviderContext::BACK_END);
        $serviceProvider->setHidden(false);
        $serviceProvider->setPrefix("prefix_fuenf_");
        $serviceProvider->setIdentityprovider("https://test.fuenf");
        $this->inactiveserviceProviders[] = $serviceProvider;

        $serviceProvider = new Serviceprovider();
        $serviceProvider->setUid(6);
        $serviceProvider->setType(ServiceProviderType::APACHE_SHIBBOLETH);
        $serviceProvider->setContext(ServiceProviderContext::BACK_END);
        $serviceProvider->setHidden(false);
        $serviceProvider->setPrefix("prefix_sechs_");
        $serviceProvider->setIdentityprovider("https://test.zwei");
        $this->inactiveserviceProviders[] = $serviceProvider;

        $serviceProvider = new Serviceprovider();
        $serviceProvider->setUid(7);
        $serviceProvider->setType(ServiceProviderType::APACHE_SHIBBOLETH);
        $serviceProvider->setContext(ServiceProviderContext::FRONT_END);
        $serviceProvider->setHidden(false);
        $serviceProvider->setPrefix("prefix_zwei_");
        $serviceProvider->setIdentityprovider("https://test.zwei");
        $this->inactiveserviceProviders[] = $serviceProvider;

        $this->serviceProviders = array_merge($this->activeserviceProviders, $this->inactiveserviceProviders);
    }

    final public function it_is_initializable()
    {
        $this->shouldHaveType(ServiceProviderUtility::class);
    }

    final public function it_is_detecting_correct_active_serviceProvider_for_frontend()
    {
        foreach ($this->activeserviceProviders as $activeServiceProvider) {
            if ($activeServiceProvider->getType() === ServiceProviderType::APACHE_SHIBBOLETH) {
                $serverIndex = $activeServiceProvider->getPrefix() . "Shib-Identity-Provider";
                $_SERVER[$serverIndex] = $activeServiceProvider->getIdentityprovider();
            }
        }

        $this->getActive($this->serviceProviders)->shouldBeEqualTo($this->activeserviceProviders);

        foreach ($this->activeserviceProviders as $activeServiceProvider) {
            if ($activeServiceProvider->getType() === ServiceProviderType::APACHE_SHIBBOLETH) {
                $serverIndex = $activeServiceProvider->getPrefix() . "Shib-Identity-Provider";
                unset($_SERVER[$serverIndex]);
            }
        }
    }

    final public function it_is_able_to_return_null_if_no_matching_serviceprovider_is_available()
    {
        $_SERVER["unknownPrefix_Shib-Identity-Provider"] = "https://not.existing";

        $this->getActive($this->serviceProviders)->shouldBeEqualTo([]);
    }
}
