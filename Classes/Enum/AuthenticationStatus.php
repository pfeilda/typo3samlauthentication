<?php
namespace DanielPfeil\Samlauthentication\Enum;

class AuthenticationStatus
{
    const SUCCESS_BREAK = 200;
    const FAIL_CONTINUE = 100;
    const SUCCESS_CONTINUE = 10;
    const FAIL_BREAK = 0;
}
