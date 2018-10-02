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

return array(
    'ctrl' => array(
        'title' => 'LLL:EXT:samlauthentication/Resources/Private/Language/locallang.xlf:fieldMapping',
        'label' => 'field',
        'iconfile' => 'EXT:samlauthentication/Resources/Public/Icons/FontAwesome/columns.svg',
        'crdate' => 'crdate',
        'cruser_id' => 'cruser_id',
        'default_sortby' => 'table ASC',
        'delete' => 'deleted',
        'enablecolumns' => array(
            'disabled' => 'hidden'
        ),
        'hideTable' => false
    ),
    'columns' => array(
        'hidden' => array(
            'exclude' => true,
            'label' => 'LLL:EXT:lang/Resources/Private/Language/locallang_general.xlf:LGL.hidden',
            'config' => array(
                'type' => 'check',
                'items' => array(
                    '1' => array(
                        '0' => 'LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:hidden.I.0'
                    )
                )
            )
        ),
        'field' => array(
            'exclude' => false,
            'label' => 'LLL:EXT:samlauthentication/Resources/Private/Language/locallang.xlf:fieldMapping.field',
            'config' => array(
                'type' => 'select',
                'itemsProcFunc' => 'DanielPfeil\\Samlauthentication\\Utility\\BackendUtility->getFields'
            )
        ),
        'foreignfield' => array(
            'exclude' => false,
            'label' => 'LLL:EXT:samlauthentication/Resources/Private/Language/locallang.xlf:fieldMapping.foreignfield',
            'config' => array(
                'type' => 'input',
                'eval' => 'trim,required'
            )
        ),
        'identifier' => array(
            'exclude' => false,
            'label' => 'Identifier',
            'config' => array(
                'type' => 'check',
                'items' => array(
                    '1' => array(
                        '0' => 'Identifier'
                    )
                )
            )
        )
    ),
    'palettes' => array(
        'hidden' => array(
            'showitem' => '
                hidden;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:field.default.hidden
            ',
        ),
    ),
    'types' => array(
        '0' => array(
            'showitem' => '
                --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:general, 
                    field,foreignfield,identifier,
                --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:access, 
                    --palette--;;hidden,
                    '
        )
    )
);