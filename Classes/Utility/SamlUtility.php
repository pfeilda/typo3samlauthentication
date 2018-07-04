<?php

namespace DanielPfeil\Samlauthentication\Utility;

use DanielPfeil\Samlauthentication\Domain\Model\Serviceprovider;
use DanielPfeil\Samlauthentication\Domain\Model\Session;

interface SamlUtility
{
    public function getData(): array;

    public function isSessionExisting(): bool;

    public function getSession(): Session;

    public function getUserData(Serviceprovider $serviceprovider): array;

    public function getGroup(): array;

    public function getUserGroups($user);
}
