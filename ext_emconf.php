<?php
/**
 * Copyright (C) 2018  Daniel Pfeil <daniel.pfeil@itpfeil.de
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 *
 */

$EM_CONF["samlauthentication"] = [
    'title' => 'SAML Authentication',
    'description' => 'This extension adds a authentication method for SAML with different service provider.',
    'version' => '4.1.2',
    'category' => 'services',
    'constraints' => [
        'depends' => [
            'typo3' => '9.0.0-10.4.99',
        ],
    ],
    'state' => 'stable',
    'author' => 'Daniel Pfeil',
    'author_email' => 'daniel.pfeil@itpfeil.de',
];
