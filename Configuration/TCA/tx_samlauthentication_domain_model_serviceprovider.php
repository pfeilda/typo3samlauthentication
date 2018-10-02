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
        'title' => 'LLL:EXT:samlauthentication/Resources/Private/Language/locallang.xlf:serviceProvider',
        'label' => 'title',
        'iconfile' => '',
        'crdate' => 'crdate',
        'cruser_id' => 'cruser_id',
        'default_sortby' => 'title ASC',
        'delete' => 'deleted',
        'enablecolumns' => array(
            'disabled' => 'hidden'
        ),
        'hideTable' => false
    ),
    'columns' => array(
        'title' => array(
            'exclude' => false,
            'label' => 'LLL:EXT:samlauthentication/Resources/Private/Language/locallang.xlf:serviceProvider.title',
            'config' => array(
                'type' => 'input',
                'eval' => 'trim,required,alphanum'
            )
        ),
        'identityprovider' => array(
            'exclude' => false,
            'label' => 'LLL:EXT:samlauthentication/Resources/Private/Language/locallang.xlf:serviceProvider.identityprovider',
            'config' => array(
                'type' => 'input',
                'eval' => 'trim,required'
            )
        ),
        'destinationpid' => array(
            'label' => 'LLL:EXT:samlauthentication/Resources/Private/Language/locallang.xlf:serviceProvider.destinationpid',
            'config' => array(
                'type' => 'group',
                'internal_type' => 'db',
                'allowed' => 'pages',
                'size' => '1',
                'maxitems' => '1',
                'minitems' => '0',
                'show_thumbs' => '1',
                'wizards' => array(
                    'suggest' => array(
                        'type' => 'suggest'
                    )
                )
            ),
        ),
        'type' => array(
            'exclude' => false,
            'label' => 'LLL:EXT:samlauthentication/Resources/Private/Language/locallang.xlf:serviceProvider.type',
            'config' => array(
                'type' => 'select',
                'renderType' => 'selectSingle',
                'items' => [
                    ['Apache2 Shibboleth SP', 1],
                    ['OpenSAML', 2]
                ],
                'minitems' => 1,
                'maxitems' => 1
            ),
            'onChange' => 'reload'
        ),
        'prefix' => array(
            'exclude' => false,
            'label' => 'LLL:EXT:samlauthentication/Resources/Private/Language/locallang.xlf:serviceProvider.prefix',
            'config' => array(
                'type' => 'input',
                'eval' => 'trim',
            ),
            'displayCond' => 'FIELD:type:=:1'
        ),
        'context' => array(
            'exclude' => false,
            'label' => 'LLL:EXT:samlauthentication/Resources/Private/Language/locallang.xlf:serviceProvider.context',
            'config' => array(
                'type' => 'select',
                'renderType' => 'selectSingle',
                'items' => [
                    ['Frontend', 'FE'],
                    ['Backend', 'BE'],
                    ['Frontend and Backend', 'FB']
                ],
                'minitems' => 1,
                'maxitems' => 1
            )
        ),
        'tablemapping' => array(
            'exclude' => false,
            'label' => 'LLL:EXT:samlauthentication/Resources/Private/Language/locallang.xlf:tableMapping',
            'config' => array(
                'type' => 'inline',
                'foreign_table' => 'tx_samlauthentication_domain_model_tablemapping',
                'foreign_field' => 'serviceprovider',
                'foreign_label' => 'table',
            )
        ),
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
                    title,type,identityprovider,prefix,context,tablemapping,destinationpid,
                --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:access, 
                    --palette--;;hidden,
                    '
        )
    )
);