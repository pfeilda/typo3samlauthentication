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

return [
    'ctrl' => [
        'title' => 'LLL:EXT:samlauthentication/Resources/Private/Language/locallang.xlf:serviceProvider',
        'label' => 'title',
        'iconfile' => 'EXT:samlauthentication/Resources/Public/Icons/Extension.svg',
        'crdate' => 'crdate',
        'cruser_id' => 'cruser_id',
        'default_sortby' => 'title ASC',
        'delete' => 'deleted',
        'enablecolumns' => [
            'disabled' => 'hidden',
        ],
    ],
    'columns' => [
        'title' => [
            'exclude' => false,
            'label' => 'LLL:EXT:samlauthentication/Resources/Private/Language/locallang.xlf:serviceProvider.title',
            'config' => [
                'type' => 'input',
                'eval' => 'trim,required,alphanum',
            ],
        ],
        'identityprovider' => [
            'exclude' => false,
            'label' =>
                'LLL:EXT:samlauthentication/Resources/Private/Language/locallang.xlf:serviceProvider.identityprovider',
            'config' => [
                'type' => 'input',
                'eval' => 'trim,required',
            ],
        ],
        'destinationpid' => [
            'label' =>
                'LLL:EXT:samlauthentication/Resources/Private/Language/locallang.xlf:serviceProvider.destinationpid',
            'config' => [
                'type' => 'group',
                'internal_type' => 'db',
                'allowed' => 'pages',
                'size' => '1',
                'maxitems' => '1',
                'minitems' => '0',
            ],
        ],
        'type' => [
            'exclude' => false,
            'label' => 'LLL:EXT:samlauthentication/Resources/Private/Language/locallang.xlf:serviceProvider.type',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'items' => [
                    ['Apache2 Shibboleth SP', 1],
                    ['SimpleSAMLphp SP', 2],
                ],
                'minitems' => 1,
                'maxitems' => 1,
            ],
            'onChange' => 'reload',
        ],
        'prefix' => [
            'exclude' => false,
            'label' => 'LLL:EXT:samlauthentication/Resources/Private/Language/locallang.xlf:serviceProvider.prefix',
            'config' => [
                'type' => 'input',
                'eval' => 'trim',
            ],
            'displayCond' => 'FIELD:type:=:1',
        ],
        'entityid' => [
            'exclude' => false,
            'label' => 'LLL:EXT:samlauthentication/Resources/Private/Language/locallang.xlf:serviceProvider.entityid',
            'config' => [
                'type' => 'input',
                'eval' => 'trim',
            ],
            'displayCond' => 'FIELD:type:=:2',
        ],
        'context' => [
            'exclude' => false,
            'label' => 'LLL:EXT:samlauthentication/Resources/Private/Language/locallang.xlf:serviceProvider.context',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'items' => [
                    ['Frontend', 'FE'],
                    ['Backend', 'BE'],
                    ['Frontend and Backend (deprecated)', 'FB'],
                ],
                'minitems' => 1,
                'maxitems' => 1,
            ],
        ],
        'tablemapping' => [
            'exclude' => false,
            'label' => 'LLL:EXT:samlauthentication/Resources/Private/Language/locallang.xlf:tableMapping',
            'config' => [
                'type' => 'inline',
                'foreign_table' => 'tx_samlauthentication_domain_model_tablemapping',
                'foreign_field' => 'serviceprovider',
                'foreign_label' => 'table',
            ],
        ],
        'hidden' => [
            'exclude' => true,
            'label' => 'LLL:EXT:lang/Resources/Private/Language/locallang_general.xlf:LGL.hidden',
            'config' => [
                'type' => 'check',
                'items' => [
                    '1' => [
                        '0' => 'LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:hidden.I.0',
                    ],
                ],
            ],
        ],
    ],
    'palettes' => [
        'hidden' => [
            'showitem' => '
                hidden;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:field.default.hidden
            ',
        ],
    ],
    'types' => [
        '0' => [
            'showitem' => '
                --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:general, 
                    title,type,identityprovider,prefix,entityid,context,tablemapping,destinationpid,
                --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:access, 
                    --palette--;;hidden,
                    ',
        ],
    ],
];
