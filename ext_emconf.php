<?php
$EM_CONF[$_EXTKEY] = array(
    'title' => 'SAML Authentication',
    'description' => 'This extension adds a authentication method for SAML with different service provider.',
    'version' => '0.0.1',
    'category' => 'services',
    'constraints' => array(
        'depends' => array(
            'typo3' => '8.7.0-9.0.0'
        )
    ),
    'state' => 'alpha',
    'author' => 'Daniel Pfeil',
    'author_email' => 'daniel.pfeil@itpfeil.de'
);
