<?php
return array(
    'ctrl' => array(
        'title' => 'LLL:EXT:samlauthentication/Resources/Private/Language/locallang.xlf:fieldMapping',
        'label' => 'field',
        'iconfile' => '',
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
                    field,foreignfield,
                --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:access, 
                    --palette--;;hidden,
                    '
        )
    )
);