<?php

namespace DanielPfeil\Samlauthentication\Utility;

use DanielPfeil\Samlauthentication\Domain\Model\Session;

interface SamlUtility
{
    public function getData(): array;
    public function isSessionExisting(): boolean;
    public function getSession():Session;
    public function getUserData():array;
    public function getGroup():array;
    public function getUserGroups($user);
}
