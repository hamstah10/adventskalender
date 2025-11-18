<?php

return [
    'ctrl' => [
        'title' => 'LLL:EXT:adventskalender/Resources/Private/Language/locallang_db.xlf:tx_adventskalender_domain_model_door',
        'label' => 'title',
        'label_alt' => 'day',
        'label_alt_force' => true,
        'sortby' => 'sorting',
        'tstamp' => 'tstamp',
        'crdate' => 'crdate',
        'delete' => 'deleted',
        'enablecolumns' => [
            'disabled' => 'hidden',
        ],
        'searchFields' => 'title,description,content',
        'iconfile' => 'EXT:adventskalender/Resources/Public/Icons/door.svg',
        'languageField' => 'sys_language_uid',
        'transOrigPointerField' => 'l10n_parent',
        'transOrigDiffSourceField' => 'l10n_diffsource',
        'translationSource' => 'l10n_source',
    ],
    'types' => [
        '1' => [
            'showitem' => '
                --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:general,
                    day, title, description, content, is_active,
                --div--;Media,
                    image, video, audio, link,
                --div--;Gutschein,
                    voucher,
                --div--;Design,
                    custom_style, custom_color_start, custom_color_end, custom_border_color, custom_border_width,
                --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:language,
                    sys_language_uid, l10n_parent, l10n_diffsource,
                --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:access,
                    hidden,
            ',
        ],
    ],
    'columns' => [
        'sys_language_uid' => [
            'exclude' => true,
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.language',
            'config' => [
                'type' => 'language',
            ],
        ],
        'l10n_parent' => [
            'displayCond' => 'FIELD:sys_language_uid:>:0',
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.l18n_parent',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'items' => [
                    ['label' => '', 'value' => 0],
                ],
                'foreign_table' => 'tx_adventskalender_domain_model_door',
                'foreign_table_where' => 'AND {#tx_adventskalender_domain_model_door}.{#pid}=###CURRENT_PID### AND {#tx_adventskalender_domain_model_door}.{#sys_language_uid} IN (-1,0)',
                'default' => 0,
            ],
        ],
        'l10n_diffsource' => [
            'config' => [
                'type' => 'passthrough',
            ],
        ],
        'l10n_source' => [
            'config' => [
                'type' => 'passthrough',
            ],
        ],
        'hidden' => [
            'exclude' => true,
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.enabled',
            'config' => [
                'type' => 'check',
                'renderType' => 'checkboxToggle',
                'items' => [
                    [
                        'label' => '',
                        'invertStateDisplay' => true,
                    ],
                ],
            ],
        ],
        'day' => [
            'exclude' => false,
            'label' => 'LLL:EXT:adventskalender/Resources/Private/Language/locallang_db.xlf:tx_adventskalender_domain_model_door.day',
            'config' => [
                'type' => 'number',
                'size' => 5,
                'range' => [
                    'lower' => 1,
                    'upper' => 24,
                ],
                'default' => 1,
                'required' => true,
            ],
        ],
        'title' => [
            'exclude' => false,
            'label' => 'LLL:EXT:adventskalender/Resources/Private/Language/locallang_db.xlf:tx_adventskalender_domain_model_door.title',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'max' => 255,
                'eval' => 'trim',
                'required' => true,
            ],
        ],
        'description' => [
            'exclude' => false,
            'label' => 'LLL:EXT:adventskalender/Resources/Private/Language/locallang_db.xlf:tx_adventskalender_domain_model_door.description',
            'config' => [
                'type' => 'text',
                'cols' => 40,
                'rows' => 5,
                'eval' => 'trim',
            ],
        ],
        'image' => [
            'exclude' => false,
            'label' => 'LLL:EXT:adventskalender/Resources/Private/Language/locallang_db.xlf:tx_adventskalender_domain_model_door.image',
            'config' => [
                'type' => 'file',
                'maxitems' => 1,
                'allowed' => 'common-image-types',
            ],
        ],
        'content' => [
            'exclude' => false,
            'label' => 'LLL:EXT:adventskalender/Resources/Private/Language/locallang_db.xlf:tx_adventskalender_domain_model_door.content',
            'config' => [
                'type' => 'text',
                'enableRichtext' => true,
                'cols' => 40,
                'rows' => 15,
            ],
        ],
        'is_active' => [
            'exclude' => false,
            'label' => 'LLL:EXT:adventskalender/Resources/Private/Language/locallang_db.xlf:tx_adventskalender_domain_model_door.is_active',
            'config' => [
                'type' => 'check',
                'renderType' => 'checkboxToggle',
                'default' => 1,
            ],
        ],
        'video' => [
            'exclude' => false,
            'label' => 'LLL:EXT:adventskalender/Resources/Private/Language/locallang_db.xlf:tx_adventskalender_domain_model_door.video',
            'config' => [
                'type' => 'file',
                'maxitems' => 1,
                'allowed' => 'common-media-types',
            ],
        ],
        'audio' => [
            'exclude' => false,
            'label' => 'LLL:EXT:adventskalender/Resources/Private/Language/locallang_db.xlf:tx_adventskalender_domain_model_door.audio',
            'config' => [
                'type' => 'file',
                'maxitems' => 1,
                'allowed' => 'common-media-types',
            ],
        ],
        'link' => [
            'exclude' => false,
            'label' => 'LLL:EXT:adventskalender/Resources/Private/Language/locallang_db.xlf:tx_adventskalender_domain_model_door.link',
            'config' => [
                'type' => 'link',
                'size' => 50,
                'appearance' => [
                    'browserTitle' => 'Link',
                ],
            ],
        ],
        'voucher' => [
            'exclude' => false,
            'label' => 'LLL:EXT:adventskalender/Resources/Private/Language/locallang_db.xlf:tx_adventskalender_domain_model_door.voucher',
            'config' => [
                'type' => 'inline',
                'foreign_table' => 'tx_adventskalender_domain_model_voucher',
                'maxitems' => 1,
                'appearance' => [
                    'collapseAll' => true,
                    'levelLinksPosition' => 'top',
                    'showSynchronizationLink' => true,
                    'showPossibleLocalizationRecords' => true,
                    'showAllLocalizationLink' => true,
                ],
            ],
        ],
        'custom_style' => [
            'exclude' => false,
            'label' => 'LLL:EXT:adventskalender/Resources/Private/Language/locallang_db.xlf:tx_adventskalender_domain_model_door.custom_style',
            'config' => [
                'type' => 'check',
                'renderType' => 'checkboxToggle',
                'default' => 0,
            ],
        ],
        'custom_color_start' => [
            'exclude' => false,
            'label' => 'LLL:EXT:adventskalender/Resources/Private/Language/locallang_db.xlf:tx_adventskalender_domain_model_door.custom_color_start',
            'displayCond' => 'FIELD:custom_style:REQ:true',
            'config' => [
                'type' => 'color',
                'size' => 10,
            ],
        ],
        'custom_color_end' => [
            'exclude' => false,
            'label' => 'LLL:EXT:adventskalender/Resources/Private/Language/locallang_db.xlf:tx_adventskalender_domain_model_door.custom_color_end',
            'displayCond' => 'FIELD:custom_style:REQ:true',
            'config' => [
                'type' => 'color',
                'size' => 10,
            ],
        ],
        'custom_border_color' => [
            'exclude' => false,
            'label' => 'LLL:EXT:adventskalender/Resources/Private/Language/locallang_db.xlf:tx_adventskalender_domain_model_door.custom_border_color',
            'displayCond' => 'FIELD:custom_style:REQ:true',
            'config' => [
                'type' => 'color',
                'size' => 10,
            ],
        ],
        'custom_border_width' => [
            'exclude' => false,
            'label' => 'LLL:EXT:adventskalender/Resources/Private/Language/locallang_db.xlf:tx_adventskalender_domain_model_door.custom_border_width',
            'displayCond' => 'FIELD:custom_style:REQ:true',
            'config' => [
                'type' => 'number',
                'size' => 5,
                'range' => [
                    'lower' => 0,
                    'upper' => 10,
                ],
                'default' => 0,
            ],
        ],
    ],
];
