
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
	status_id INTEGER,
	published BOOLEAN default 'f' NOT NULL,
	description TEXT,
	notes TEXT,
	image_url VARCHAR(255),
	organiser TEXT,
	interested_parties TEXT,
	created_at TIMESTAMP,
	PRIMARY KEY (id)
);

COMMENT ON TABLE event IS '';


SET search_path TO public;
ALTER TABLE event ADD CONSTRAINT event_FK_1 FOREIGN KEY (status_id) REFERENCES status (id);

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