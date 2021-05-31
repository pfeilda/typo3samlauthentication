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
        'title' => 'LLL:EXT:samlauthentication/Resources/Private/Language/locallang.xlf:fieldMapping',
        'label' => 'field',
        'iconfile' => 'EXT:samlauthentication/Exticon.svg',
        'crdate' => 'crdate',
        'cruser_id' => 'cruser_id',
        'default_sortby' => 'table ASC',
        'delete' => 'deleted',
        'enablecolumns' => [
            'disabled' => 'hidden',
        ],
    ],
    'columns' => [
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
        'field' => [
            'exclude' => false,
            'label' => 'LLL:EXT:samlauthentication/Resources/Private/Language/locallang.xlf:fieldMapping.field',
            'config' => [
                'type' => 'select',
                'itemsProcFunc' => 'DanielPfeil\\Samlauthentication\\Utility\\BackendUtility->getFields',
                'renderType' => 'selectSingle',
            ],
        ],
        'foreignfield' => [
            'exclude' => false,
            'label' => 'LLL:EXT:samlauthentication/Resources/Private/Language/locallang.xlf:fieldMapping.foreignfield',
            'config' => [
                'type' => 'input',
                'eval' => 'trim',
            ],
            'displayCond' => 'FIELD:noforeignfield:!=:1',
        ],
        'identifier' => [
            'exclude' => false,
            'label' => 'Identifier',
            'config' => [
                'type' => 'check',
                'items' => [
                    '1' => [
                        '0' => 'Identifier',
                    ],
                ],
            ],
            'displayCond' => 'FIELD:noforeignfield:!=:1',
        ],
        'noforeignfield' => [
            'exclude' => false,
            'label' => 'No foreign field',
            'config' => [
                'type' => 'check',
                'items' => [
                    '1' => [
                        '0' => 'No foreign field',
                    ],
                ],
            ],
            'onChange' => 'reload',
        ],
        //stupid name but mysql doesnt accept default
        'fallback' => [
            'exclude' => true,
            'label' => 'Default',
            'config' => [
                'type' => 'check',
                'items' => [
                    '1' => [
                        '0' => 'Use default value',
                    ],
                ],
            ],
            'displayCond' => 'FIELD:noforeignfield:!=:1',
            'onChange' => 'reload',
        ],
        'defaultvalue' => [
            'exclude' => false,
            'label' => 'Default Wert',
            'config' => [
                'type' => 'input',
            ],
            'displayCond' => [
                'OR' => [
                    'FIELD:fallback:=:1',
                    'FIELD:noforeignfield:=:1'
                ]
            ]
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
                    field,noforeignfield,foreignfield,identifier,fallback,defaultvalue,
                --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:access, 
                    --palette--;;hidden,
                    ',
        ],
    ],
];
