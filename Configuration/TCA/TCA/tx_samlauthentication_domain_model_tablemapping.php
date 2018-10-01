<?php

return array(
    'ctrl' => array(
        'title' => 'LLL:EXT:samlauthentication/Resources/Private/Language/locallang.xlf:tableMapping',
        'label' => 'table',
        'iconfile' => 'EXT:samlauthentication/Resources/Public/Icons/FontAwesome/table.svg',
        'crdate' => 'crdate',
        'cruser_id' => 'cruser_id',
        'default_sortby' => 'table ASC',
        'delete' => 'deleted',
        'enablecolumns' => array(
            'disabled' => 'hidden'
        ),
        'hideTable' => false,
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
        'table' => array(
            'exclude' => false,
            'label' => 'LLL:EXT:samlauthentication/Resources/Private/Language/locallang.xlf:tableMapping.table',
            'config' => array(
                'type' => 'select',
                'itemsProcFunc' => 'DanielPfeil\\Samlauthentication\\Utility\\BackendUtility->getTables'
            )
        ),
        'fields' => array(
            'exclude' => false,
            'label' => 'LLL:EXT:samlauthentication/Resources/Private/Language/locallang.xlf:fieldMapping',
            'config' => array(
                'type' => 'inline',
                'foreign_table' => 'tx_samlauthentication_domain_model_fieldmapping',
                'foreign_field' => 'table',
                'foreign_label' => 'field',
            )
        ),
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
                    table,fields,
                --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:access, 
                    --palette--;;hidden,
                    '
        )
    )
);