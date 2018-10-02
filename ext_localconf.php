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

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addService(
    $_EXTKEY,
    'auth',
    \DanielPfeil\Samlauthentication\Service\AuthenticationService::class,
    array(
        'title' => 'Authentication service',
        'description' => 'Authentication with over a Service Provider.',

        'subtype' => 'authUserFE, authUserBE',

        'available' => true,
        'priority' => 100,
        'quality' => 100,

        'className' => 'DanielPfeil\\Samlauthentication\\Service\\AuthenticationService'
    )
);