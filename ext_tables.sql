# additional Table structure for table 'tt_content'
# TYPO3 V11, GNU 2.0
# change the field type for layout in tt_content to allow for non-numeric, named layout values
#
CREATE TABLE tt_content (
	ce_width varchar(32) DEFAULT '' NOT NULL,
	ce_width varchar(32) DEFAULT 'normal' NOT NULL,
	layout varchar(255) DEFAULT '' NOT NULL
);

CREATE TABLE pages (
  infotext_header varchar(255) DEFAULT '' NOT NULL,
	infotext mediumtext
);
