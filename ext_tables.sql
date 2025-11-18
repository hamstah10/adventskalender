CREATE TABLE tx_adventskalender_domain_model_door (
    uid int(11) NOT NULL auto_increment,
    pid int(11) DEFAULT '0' NOT NULL,

    day int(11) DEFAULT '0' NOT NULL,
    title varchar(255) DEFAULT '' NOT NULL,
    description text,
    image int(11) unsigned DEFAULT '0' NOT NULL,
    content text,
    video int(11) unsigned DEFAULT '0' NOT NULL,
    audio int(11) unsigned DEFAULT '0' NOT NULL,
    link varchar(1024) DEFAULT '' NOT NULL,
    is_active tinyint(4) DEFAULT '0' NOT NULL,

    tstamp int(11) unsigned DEFAULT '0' NOT NULL,
    crdate int(11) unsigned DEFAULT '0' NOT NULL,
    deleted tinyint(4) unsigned DEFAULT '0' NOT NULL,
    hidden tinyint(4) unsigned DEFAULT '0' NOT NULL,

    sorting int(11) DEFAULT '0' NOT NULL,
    
    sys_language_uid int(11) DEFAULT '0' NOT NULL,
    l10n_parent int(11) DEFAULT '0' NOT NULL,
    l10n_diffsource mediumblob,
    l10n_source int(11) DEFAULT '0' NOT NULL,
    
    voucher int(11) unsigned DEFAULT '0' NOT NULL,
    custom_style tinyint(4) DEFAULT '0' NOT NULL,
    custom_color_start varchar(7) DEFAULT '' NOT NULL,
    custom_color_end varchar(7) DEFAULT '' NOT NULL,
    custom_border_color varchar(7) DEFAULT '' NOT NULL,
    custom_border_width int(11) DEFAULT '0' NOT NULL,

    PRIMARY KEY (uid),
    KEY parent (pid),
    KEY day (day)
);

CREATE TABLE tx_adventskalender_domain_model_voucher (
    uid int(11) NOT NULL auto_increment,
    pid int(11) DEFAULT '0' NOT NULL,

    headline varchar(255) DEFAULT '' NOT NULL,
    for_name varchar(255) DEFAULT '' NOT NULL,
    description text,
    from_name varchar(255) DEFAULT '' NOT NULL,
    design varchar(50) DEFAULT 'classic' NOT NULL,

    tstamp int(11) unsigned DEFAULT '0' NOT NULL,
    crdate int(11) unsigned DEFAULT '0' NOT NULL,
    deleted tinyint(4) unsigned DEFAULT '0' NOT NULL,
    hidden tinyint(4) unsigned DEFAULT '0' NOT NULL,

    sys_language_uid int(11) DEFAULT '0' NOT NULL,
    l10n_parent int(11) DEFAULT '0' NOT NULL,
    l10n_diffsource mediumblob,
    l10n_source int(11) DEFAULT '0' NOT NULL,

    PRIMARY KEY (uid),
    KEY parent (pid)
);
