Installation
============

Prerequirements
***************

* TYPO3 (8.7.0-9.5.7)
* Apache SAML Service Provider (or any other SP but able to set Apache Environment Variables)

In the Apache Environment there must be some variables containing the SAML information.

  .. image:: _static/Images/phpinfo.png

Required are the fields:

* Session Id
* Session Index
* Identity Provider

These fields are needed to validate if a session is existing. Additional it makes sense to add a field with the
identifier of the user. But you can add as many additional fields as you want and configure it over the Backend.

Extension Installation
**********************

To install the extension you have to install via Composer. This is required because the extension depends on other
Composer packages.

You can use either the typo3ter:
  https://composer.typo3.org/satis.html#typo3-ter/samlauthentication

or the offical composer repository:
  https://packagist.org/packages/daniel-pfeil/samlauthentication

After a successfull `composer install` you can activate the extension like any other extension over your backend.