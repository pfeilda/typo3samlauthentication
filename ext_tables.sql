CREATE TABLE 'tx_samlauthentication_domain_model_serviceprovider' (
  uid              INT(11) UNSIGNED                NOT NULL AUTO_INCREMENT,
  pid              INT(11) DEFAULT '0'             NOT NULL,
  crdate           INT(11) UNSIGNED DEFAULT '0'    NOT NULL,
  tstamp           INT(11) UNSIGNED DEFAULT '0'    NOT NULL,
  deleted          TINYINT(4) UNSIGNED DEFAULT '0' NOT NULL,
  hidden           TINYINT(4) UNSIGNED DEFAULT '0' NOT NULL,
  cruser_id        INT(11) UNSIGNED DEFAULT '0'    NOT NULL,

  title            VARCHAR(255)                    NOT NULL,
  type             INT(11) UNSIGNED                NOT NULL,
  prefix           VARCHAR(255),
  identityprovider VARCHAR(255)                    NOT NULL,
  context          INT(11) UNSIGNED                NOT NULL,
  mapping          INT(11)                         NOT NULL,

  PRIMARY KEY (uid),
  KEY parent (pid)
);

CREATE TABLE 'tx_samlauthentication_domain_model_tablemapping' (
  uid       INT(11) UNSIGNED                NOT NULL AUTO_INCREMENT,
  pid       INT(11) DEFAULT '0'             NOT NULL,
  crdate    INT(11) UNSIGNED DEFAULT '0'    NOT NULL,
  tstamp    INT(11) UNSIGNED DEFAULT '0'    NOT NULL,
  deleted   TINYINT(4) UNSIGNED DEFAULT '0' NOT NULL,
  hidden    TINYINT(4) UNSIGNED DEFAULT '0' NOT NULL,
  cruser_id INT(11) UNSIGNED DEFAULT '0'    NOT NULL,

  table     VARCHAR(255)                    NOT NULL,
  fields    INT(11)                         NOT NULL,

  PRIMARY KEY (uid),
  KEY parent (pid)
);