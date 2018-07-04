CREATE TABLE 'tx_samlauthentication_domain_model_serviceprovider' (
  uid              INT(11) UNSIGNED                NOT NULL AUTO_INCREMENT,
  pid              INT(11) DEFAULT '0'             NOT NULL,
  crdate           INT(11) UNSIGNED DEFAULT '0'    NOT NULL,
  tstamp           INT(11) UNSIGNED DEFAULT '0'    NOT NULL,
  deleted          TINYINT(4) UNSIGNED DEFAULT '0' NOT NULL,
  hidden           TINYINT(4) UNSIGNED DEFAULT '0' NOT NULL,
  cruser_id        INT(11) UNSIGNED DEFAULT '0'    NOT NULL,

  title            VARCHAR(255) DEFAULT ''         NOT NULL,
  destinationpid   INT(11),
  type             INT(11) UNSIGNED DEFAULT 1      NOT NULL,
  prefix           VARCHAR(255),
  identityprovider VARCHAR(255) DEFAULT ''         NOT NULL,
  context          CHAR (2) UNSIGNED DEFAULT "FE"  NOT NULL,
  tablemapping     INT(11) DEFAULT 0               NOT NULL,

  PRIMARY KEY (uid),
  KEY parent (pid)
);

CREATE TABLE 'tx_samlauthentication_domain_model_tablemapping' (
  uid             INT(11) UNSIGNED                NOT NULL AUTO_INCREMENT,
  pid             INT(11) DEFAULT '0'             NOT NULL,
  crdate          INT(11) UNSIGNED DEFAULT '0'    NOT NULL,
  tstamp          INT(11) UNSIGNED DEFAULT '0'    NOT NULL,
  deleted         TINYINT(4) UNSIGNED DEFAULT '0' NOT NULL,
  hidden          TINYINT(4) UNSIGNED DEFAULT '0' NOT NULL,
  cruser_id       INT(11) UNSIGNED DEFAULT '0'    NOT NULL,

  serviceprovider INT(11) DEFAULT 0               NOT NULL,
  table           VARCHAR(255) DEFAULT ''         NOT NULL,
  fields          INT(11) DEFAULT 0               NOT NULL,

  PRIMARY KEY (uid),
  KEY parent (pid)
);

CREATE TABLE 'tx_samlauthentication_domain_model_fieldmapping' (
  uid          INT(11) UNSIGNED                NOT NULL AUTO_INCREMENT,
  pid          INT(11) DEFAULT '0'             NOT NULL,
  crdate       INT(11) UNSIGNED DEFAULT '0'    NOT NULL,
  tstamp       INT(11) UNSIGNED DEFAULT '0'    NOT NULL,
  deleted      TINYINT(4) UNSIGNED DEFAULT '0' NOT NULL,
  hidden       TINYINT(4) UNSIGNED DEFAULT '0' NOT NULL,
  cruser_id    INT(11) UNSIGNED DEFAULT '0'    NOT NULL,

  table        INT(11) DEFAULT 0               NOT NULL,
  field        VARCHAR(255) DEFAULT ''         NOT NULL,
  foreignfield VARCHAR(255) DEFAULT ''         NOT NULL,

  PRIMARY KEY (uid),
  KEY parent (pid)
);