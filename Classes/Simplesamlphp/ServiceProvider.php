<?php


namespace DanielPfeil\Samlauthentication\Simplesamlphp;


class ServiceProvider implements \DanielPfeil\ServiceProviderAuthenticator\ServiceProvider
{
    public function getApplicationID(): ?string
    {
        // TODO: Implement getApplicationID() method.
    }

    public function getSessionId(): ?string
    {
        // TODO: Implement getSessionId() method.
    }

    public function getIdentityProvider(): ?string
    {
        // TODO: Implement getIdentityProvider() method.
    }

    public function getAuthenticationInstant(): ?string
    {
        // TODO: Implement getAuthenticationInstant() method.
    }

    public function getAuthenticationMethod(): ?string
    {
        // TODO: Implement getAuthenticationMethod() method.
    }

    public function getAuthenticationContextClass(): ?string
    {
        // TODO: Implement getAuthenticationContextClass() method.
    }

    public function getSessionIndex(): ?string
    {
        // TODO: Implement getSessionIndex() method.
    }

    public function getPrefix(): ?string
    {
        // TODO: Implement getPrefix() method.
    }

    public function getCookieName(): ?string
    {
        // TODO: Implement getCookieName() method.
    }

    public function isSessionExisting(): bool
    {
        // TODO: Implement isSessionExisting() method.
    }

    public function getField(string $fieldName): ?string
    {
        // TODO: Implement getField() method.
    }

    public function getPrefixedField(string $fieldName, bool $useShortPrefix = true): ?string
    {
        // TODO: Implement getPrefixedField() method.
    }

}