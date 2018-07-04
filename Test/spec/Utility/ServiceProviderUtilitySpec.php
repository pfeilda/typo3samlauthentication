<?php

namespace spec\DanielPfeil\Samlauthentication\Utility;

use DanielPfeil\Samlauthentication\Domain\Model\Serviceprovider;
use DanielPfeil\Samlauthentication\Domain\Model\Tablemapping;
use DanielPfeil\Samlauthentication\Utility\ServiceProviderUtility;
use PhpSpec\ObjectBehavior;
use TYPO3\CMS\Extbase\Persistence\ObjectStorage;

class ServiceProviderUtilitySpec extends ObjectBehavior
{
    /**
     * @var Serviceprovider[]
     */
    private $serviceproviders = array();

    public function __construct()
    {
        $this->serviceproviders = $this->generateServiceProviders();
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(ServiceProviderUtility::class);
    }

    public function it_is_detecting_correct_active_serviceProvider_for_frontend()
    {
        define("TYPO3_MODE", "FE");
        $referenceServiceProvider = $this->serviceproviders[0];
        $serverIndex = $referenceServiceProvider->getPrefix() . "Shib-Identity-Provider";
        $_SERVER[$serverIndex] = $referenceServiceProvider->getIdentityprovider();

        $serviceProviderUtility = ServiceProviderUtility::getInstance();
        $activeServiceProvider = $serviceProviderUtility->getActive($this->serviceproviders);
        $activeServiceProvider->shouldBe($referenceServiceProvider);
    }

    public function it_is_detecting_correct_active_serviceProvider_for_backend()
    {
        ServiceProviderUtility::getActive($this->serviceproviders);
    }

    private function generateServiceProviders(): array
    {
        $serviceProviders = [];

        $tableMapping = new Tablemapping();
        $tableMapping->setUid(1);
        $tableMapping->setHidden(false);
        $tableMapping->setTable("fe_user");

        $tableMappingStorage = new ObjectStorage();
        $tableMappingStorage->attach($tableMapping);

        $serviceProvider = new Serviceprovider();
        $serviceProvider->setUid(1);
        $serviceProvider->setContext(0);
        $serviceProvider->setDestinationpid(2);
        $serviceProvider->setHidden(false);
        $serviceProvider->setIdentityprovider("https://test.idp");
        $serviceProvider->setPrefix("pre_");
        $serviceProvider->setTitle("title");
        $serviceProvider->setType(1);
        $serviceProvider->setTablemapping($tableMappingStorage);
        $serviceProviders[] = $serviceProvider;

        $serviceProvider = new Serviceprovider();
        $serviceProvider->setUid(2);
        $serviceProvider->setContext(0);
        $serviceProvider->setDestinationpid(3);
        $serviceProvider->setHidden(true);
        $serviceProvider->setIdentityprovider("https://test2.idp");
        $serviceProvider->setPrefix("prefix_");
        $serviceProvider->setTitle("Test");
        $serviceProvider->setType(1);
        $serviceProviders[] = $serviceProvider;

        $serviceProvider = new Serviceprovider();
        $serviceProvider->setUid(3);
        $serviceProvider->setContext(0);
        $serviceProvider->setDestinationpid(3);
        $serviceProvider->setHidden(false);
        $serviceProvider->setIdentityprovider("https://test3.idp");
        $serviceProvider->setPrefix("prefix3_");
        $serviceProvider->setTitle("Test3");
        $serviceProvider->setType(1);
        $serviceProviders[] = $serviceProvider;

        $serviceProvider = new Serviceprovider();
        $serviceProvider->setUid(4);
        $serviceProvider->setContext(1);
        $serviceProvider->setDestinationpid(3);
        $serviceProvider->setHidden(false);
        $serviceProvider->setIdentityprovider("https://test4.idp");
        $serviceProvider->setPrefix("prefix4_");
        $serviceProvider->setTitle("Test4");
        $serviceProvider->setType(1);
        $serviceProviders[] = $serviceProvider;

        $serviceProvider = new Serviceprovider();
        $serviceProvider->setUid(5);
        $serviceProvider->setContext(2);
        $serviceProvider->setDestinationpid(3);
        $serviceProvider->setHidden(false);
        $serviceProvider->setIdentityprovider("https://test5.idp");
        $serviceProvider->setPrefix("prefix5_");
        $serviceProvider->setTitle("Test5");
        $serviceProvider->setType(1);
        $serviceProviders[] = $serviceProvider;

        return $serviceProviders;
    }
}
