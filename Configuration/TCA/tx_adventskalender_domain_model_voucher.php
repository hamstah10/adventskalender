<?php

return [
    'ctrl' => [
        'title' => 'LLL:EXT:adventskalender/Resources/Private/Language/locallang_db.xlf:tx_adventskalender_domain_model_voucher',
        'label' => 'for_name',
        'label_alt' => 'from_name',
        'label_alt_force' => true,
        'tstamp' => 'tstamp',
        'crdate' => 'crdate',
        'delete' => 'deleted',
        'enablecolumns' => [
            'disabled' => 'hidden',
        ],
        'searchFields' => 'for_name,description,from_name',
        'iconfile' => 'EXT:adventskalender/Resources/Public/Icons/voucher.svg',
        'languageField' => 'sys_language_uid',
        'transOrigPointerField' => 'l10n_parent',
        'transOrigDiffSourceField' => 'l10n_diffsource',
        'translationSource' => 'l10n_source',
    ],
    'types' => [
        '1' => [
            'showitem' => '
                --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:general,
                    headline, for_name, description, from_name, design, voucher_code,
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
                'foreign_table' => 'tx_adventskalender_domain_model_voucher',
                'foreign_table_where' => 'AND {#tx_adventskalender_domain_model_voucher}.{#pid}=###CURRENT_PID### AND {#tx_adventskalender_domain_model_voucher}.{#sys_language_uid} IN (-1,0)',
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
        'headline' => [
            'exclude' => false,
            'label' => 'LLL:EXT:adventskalender/Resources/Private/Language/locallang_db.xlf:tx_adventskalender_domain_model_voucher.headline',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'max' => 255,
                'eval' => 'trim',
                'default' => 'Geschenkgutschein',
                'required' => true,
            ],
        ],
        'for_name' => [
            'exclude' => false,
            'label' => 'LLL:EXT:adventskalender/Resources/Private/Language/locallang_db.xlf:tx_adventskalender_domain_model_voucher.for_name',
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
            'label' => 'LLL:EXT:adventskalender/Resources/Private/Language/locallang_db.xlf:tx_adventskalender_domain_model_voucher.description',
            'config' => [
                'type' => 'text',
                'cols' => 40,
                'rows' => 5,
                'eval' => 'trim',
                'required' => true,
            ],
        ],
        'from_name' => [
            'exclude' => false,
            'label' => 'LLL:EXT:adventskalender/Resources/Private/Language/locallang_db.xlf:tx_adventskalender_domain_model_voucher.from_name',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'max' => 255,
                'eval' => 'trim',
                'required' => true,
            ],
        ],
        'design' => [
            'exclude' => false,
            'label' => 'LLL:EXT:adventskalender/Resources/Private/Language/locallang_db.xlf:tx_adventskalender_domain_model_voucher.design',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'items' => [
                    ['label' => 'LLL:EXT:adventskalender/Resources/Private/Language/locallang_db.xlf:tx_adventskalender_domain_model_voucher.design.classic', 'value' => 'classic'],
                    ['label' => 'LLL:EXT:adventskalender/Resources/Private/Language/locallang_db.xlf:tx_adventskalender_domain_model_voucher.design.santa', 'value' => 'santa'],
                ],
                'default' => 'classic',
            ],
        ],
        'voucher_code' => [
            'exclude' => false,
            'label' => 'LLL:EXT:adventskalender/Resources/Private/Language/locallang_db.xlf:tx_adventskalender_domain_model_voucher.voucher_code',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'max' => 255,
                'eval' => 'trim',
                'placeholder' => 'z.B. XMAS-2025-001',
            ],
        ],
        'door' => [
            'config' => [
                'type' => 'passthrough',
            ],
        ],
    ],
];
