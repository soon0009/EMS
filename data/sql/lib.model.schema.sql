
-----------------------------------------------------------------------------
-- event
-----------------------------------------------------------------------------

DROP TABLE event CASCADE;

DROP SEQUENCE event_seq;

CREATE SEQUENCE event_seq;


CREATE TABLE event
(
	id INTEGER  NOT NULL,
	title VARCHAR(255)  NOT NULL,
	slug VARCHAR(255),
	status_id INTEGER,
	category_id INTEGER,
	published BOOLEAN default 'f' NOT NULL,
	media_potential BOOLEAN default 'f' NOT NULL,
	description TEXT,
	notes TEXT,
	image_url VARCHAR(255),
	organiser TEXT,
	interested_parties TEXT,
	updated_at TIMESTAMP,
	PRIMARY KEY (id),
	CONSTRAINT unique_slug UNIQUE (slug)
);

COMMENT ON TABLE event IS '';


SET search_path TO public;
ALTER TABLE event ADD CONSTRAINT event_FK_1 FOREIGN KEY (status_id) REFERENCES status (id);

ALTER TABLE event ADD CONSTRAINT event_FK_2 FOREIGN KEY (category_id) REFERENCES category (id);

-----------------------------------------------------------------------------
-- status
-----------------------------------------------------------------------------

DROP TABLE status CASCADE;

DROP SEQUENCE status_seq;

CREATE SEQUENCE status_seq;


CREATE TABLE status
(
	id INTEGER  NOT NULL,
	status VARCHAR(16),
	PRIMARY KEY (id)
);

COMMENT ON TABLE status IS '';


SET search_path TO public;
-----------------------------------------------------------------------------
-- category
-----------------------------------------------------------------------------

DROP TABLE category CASCADE;

DROP SEQUENCE category_seq;

CREATE SEQUENCE category_seq;


CREATE TABLE category
(
	id INTEGER  NOT NULL,
	name VARCHAR(32),
	PRIMARY KEY (id)
);

COMMENT ON TABLE category IS '';


SET search_path TO public;
-----------------------------------------------------------------------------
-- etime
-----------------------------------------------------------------------------

DROP TABLE etime CASCADE;

DROP SEQUENCE etime_seq;

CREATE SEQUENCE etime_seq;


CREATE TABLE etime
(
	id INTEGER  NOT NULL,
	event_id INTEGER  NOT NULL,
	title VARCHAR(255),
	start_date TIMESTAMP  NOT NULL,
	end_date TIMESTAMP  NOT NULL,
	all_day BOOLEAN default 'f' NOT NULL,
	location TEXT,
	description TEXT,
	notes TEXT,
	capacity INTEGER,
	additional_guests INTEGER default 0 NOT NULL,
	has_fee BOOLEAN default 'f' NOT NULL,
	audio_visual_support BOOLEAN default 'f' NOT NULL,
	organiser TEXT,
	interested_parties TEXT,
	updated_at TIMESTAMP,
	PRIMARY KEY (id)
);

COMMENT ON TABLE etime IS '';


SET search_path TO public;
ALTER TABLE etime ADD CONSTRAINT etime_FK_1 FOREIGN KEY (event_id) REFERENCES event (id) ON DELETE CASCADE;

-----------------------------------------------------------------------------
-- audience
-----------------------------------------------------------------------------

DROP TABLE audience CASCADE;

DROP SEQUENCE audience_seq;

CREATE SEQUENCE audience_seq;


CREATE TABLE audience
(
	id INTEGER  NOT NULL,
	name VARCHAR(50),
	PRIMARY KEY (id)
);

COMMENT ON TABLE audience IS '';


SET search_path TO public;
-----------------------------------------------------------------------------
-- etime_audience_key
-----------------------------------------------------------------------------

DROP TABLE etime_audience_key CASCADE;


CREATE TABLE etime_audience_key
(
	etime_id INTEGER  NOT NULL,
	audience_id INTEGER  NOT NULL,
	PRIMARY KEY (etime_id,audience_id)
);

COMMENT ON TABLE etime_audience_key IS '';


SET search_path TO public;
ALTER TABLE etime_audience_key ADD CONSTRAINT etime_audience_key_FK_1 FOREIGN KEY (etime_id) REFERENCES etime (id) ON DELETE CASCADE;

ALTER TABLE etime_audience_key ADD CONSTRAINT etime_audience_key_FK_2 FOREIGN KEY (audience_id) REFERENCES audience (id);

-----------------------------------------------------------------------------
-- rsvp
-----------------------------------------------------------------------------

DROP TABLE rsvp CASCADE;

DROP SEQUENCE rsvp_seq;

CREATE SEQUENCE rsvp_seq;


CREATE TABLE rsvp
(
	id INTEGER  NOT NULL,
	name VARCHAR(50),
	PRIMARY KEY (id)
);

COMMENT ON TABLE rsvp IS '';


SET search_path TO public;
-----------------------------------------------------------------------------
-- etime_rsvp_key
-----------------------------------------------------------------------------

DROP TABLE etime_rsvp_key CASCADE;


CREATE TABLE etime_rsvp_key
(
	etime_id INTEGER  NOT NULL,
	rsvp_id INTEGER  NOT NULL,
	PRIMARY KEY (etime_id,rsvp_id)
);

COMMENT ON TABLE etime_rsvp_key IS '';


SET search_path TO public;
ALTER TABLE etime_rsvp_key ADD CONSTRAINT etime_rsvp_key_FK_1 FOREIGN KEY (etime_id) REFERENCES etime (id) ON DELETE CASCADE;

ALTER TABLE etime_rsvp_key ADD CONSTRAINT etime_rsvp_key_FK_2 FOREIGN KEY (rsvp_id) REFERENCES rsvp (id);

-----------------------------------------------------------------------------
-- tag
-----------------------------------------------------------------------------

DROP TABLE tag CASCADE;

DROP SEQUENCE tag_seq;

CREATE SEQUENCE tag_seq;


CREATE TABLE tag
(
	id INTEGER  NOT NULL,
	tag VARCHAR(100)  NOT NULL,
	normalized_tag VARCHAR(100),
	created_at TIMESTAMP,
	PRIMARY KEY (id),
	CONSTRAINT unique_normalized_tag UNIQUE (normalized_tag)
);

COMMENT ON TABLE tag IS '';


SET search_path TO public;
CREATE INDEX tag_normalized_tag_index ON tag (normalized_tag);

-----------------------------------------------------------------------------
-- event_tag
-----------------------------------------------------------------------------

DROP TABLE event_tag CASCADE;


CREATE TABLE event_tag
(
	event_id INTEGER  NOT NULL,
	tag_id INTEGER  NOT NULL,
	PRIMARY KEY (event_id,tag_id)
);

COMMENT ON TABLE event_tag IS '';


SET search_path TO public;
ALTER TABLE event_tag ADD CONSTRAINT event_tag_FK_1 FOREIGN KEY (event_id) REFERENCES event (id) ON DELETE CASCADE;

ALTER TABLE event_tag ADD CONSTRAINT event_tag_FK_2 FOREIGN KEY (tag_id) REFERENCES tag (id) ON DELETE CASCADE;

-----------------------------------------------------------------------------
-- etime_tag
-----------------------------------------------------------------------------

DROP TABLE etime_tag CASCADE;


CREATE TABLE etime_tag
(
	etime_id INTEGER  NOT NULL,
	tag_id INTEGER  NOT NULL,
	PRIMARY KEY (etime_id,tag_id)
);

COMMENT ON TABLE etime_tag IS '';


SET search_path TO public;
ALTER TABLE etime_tag ADD CONSTRAINT etime_tag_FK_1 FOREIGN KEY (etime_id) REFERENCES etime (id) ON DELETE CASCADE;

ALTER TABLE etime_tag ADD CONSTRAINT etime_tag_FK_2 FOREIGN KEY (tag_id) REFERENCES tag (id) ON DELETE CASCADE;

-----------------------------------------------------------------------------
-- guest
-----------------------------------------------------------------------------

DROP TABLE guest CASCADE;

DROP SEQUENCE guest_seq;

CREATE SEQUENCE guest_seq;


CREATE TABLE guest
(
	etime_id INTEGER,
	id INTEGER  NOT NULL,
	PRIMARY KEY (id)
);

COMMENT ON TABLE guest IS '';


SET search_path TO public;
ALTER TABLE guest ADD CONSTRAINT guest_FK_1 FOREIGN KEY (etime_id) REFERENCES etime (id) ON DELETE CASCADE;

-----------------------------------------------------------------------------
-- reg_field
-----------------------------------------------------------------------------

DROP TABLE reg_field CASCADE;

DROP SEQUENCE reg_field_seq;

CREATE SEQUENCE reg_field_seq;


CREATE TABLE reg_field
(
	name VARCHAR(50)  NOT NULL,
	label VARCHAR(50)  NOT NULL,
	type VARCHAR(50)  NOT NULL,
	id INTEGER  NOT NULL,
	PRIMARY KEY (id)
);

COMMENT ON TABLE reg_field IS '';


SET search_path TO public;
-----------------------------------------------------------------------------
-- reg_form
-----------------------------------------------------------------------------

DROP TABLE reg_form CASCADE;


CREATE TABLE reg_form
(
	event_id INTEGER  NOT NULL,
	reg_field_id INTEGER  NOT NULL,
	field_order INTEGER,
	PRIMARY KEY (event_id,reg_field_id)
);

COMMENT ON TABLE reg_form IS '';


SET search_path TO public;
ALTER TABLE reg_form ADD CONSTRAINT reg_form_FK_1 FOREIGN KEY (event_id) REFERENCES event (id) ON DELETE CASCADE;

ALTER TABLE reg_form ADD CONSTRAINT reg_form_FK_2 FOREIGN KEY (reg_field_id) REFERENCES reg_field (id) ON DELETE CASCADE;

-----------------------------------------------------------------------------
-- guest_reg
-----------------------------------------------------------------------------

DROP TABLE guest_reg CASCADE;


CREATE TABLE guest_reg
(
	guest_id INTEGER  NOT NULL,
	reg_field_id INTEGER  NOT NULL,
	value TEXT,
	PRIMARY KEY (guest_id,reg_field_id)
);

COMMENT ON TABLE guest_reg IS '';


SET search_path TO public;
ALTER TABLE guest_reg ADD CONSTRAINT guest_reg_FK_1 FOREIGN KEY (guest_id) REFERENCES guest (id) ON DELETE CASCADE;

ALTER TABLE guest_reg ADD CONSTRAINT guest_reg_FK_2 FOREIGN KEY (reg_field_id) REFERENCES reg_field (id) ON DELETE CASCADE;

-----------------------------------------------------------------------------
-- additional_guest
-----------------------------------------------------------------------------

DROP TABLE additional_guest CASCADE;


CREATE TABLE additional_guest
(
	parent_guest_id INTEGER  NOT NULL,
	child_guest_id INTEGER  NOT NULL,
	PRIMARY KEY (parent_guest_id,child_guest_id)
);

COMMENT ON TABLE additional_guest IS '';


SET search_path TO public;
ALTER TABLE additional_guest ADD CONSTRAINT additional_guest_FK_1 FOREIGN KEY (parent_guest_id) REFERENCES guest (id) ON DELETE CASCADE;

ALTER TABLE additional_guest ADD CONSTRAINT additional_guest_FK_2 FOREIGN KEY (child_guest_id) REFERENCES guest (id) ON DELETE CASCADE;
