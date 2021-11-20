-- DROP SCHEMA blog;

CREATE SCHEMA blog AUTHORIZATION "postgres";

-- DROP TYPE blog."e_gender_method";

CREATE TYPE blog."e_gender_method" AS ENUM (
	'M',
	'F',
	'Autre');

-- DROP SEQUENCE blog.comment_id_seq;

CREATE SEQUENCE blog.comment_id_seq
	INCREMENT BY 1
	MINVALUE 1
	MAXVALUE 2147483647
	START 1
	CACHE 1
	NO CYCLE;
-- DROP SEQUENCE blog.comment_id_seq1;

CREATE SEQUENCE blog.comment_id_seq1
	INCREMENT BY 1
	MINVALUE 1
	MAXVALUE 2147483647
	START 1
	CACHE 1
	NO CYCLE;
-- DROP SEQUENCE blog.member_id_seq;

CREATE SEQUENCE blog.member_id_seq
	INCREMENT BY 1
	MINVALUE 1
	MAXVALUE 2147483647
	START 1
	CACHE 1
	NO CYCLE;
-- DROP SEQUENCE blog.member_id_seq1;

CREATE SEQUENCE blog.member_id_seq1
	INCREMENT BY 1
	MINVALUE 1
	MAXVALUE 2147483647
	START 1
	CACHE 1
	NO CYCLE;
-- DROP SEQUENCE blog.news_id_seq;

CREATE SEQUENCE blog.news_id_seq
	INCREMENT BY 1
	MINVALUE 1
	MAXVALUE 2147483647
	START 1
	CACHE 1
	NO CYCLE;
-- DROP SEQUENCE blog.news_id_seq1;

CREATE SEQUENCE blog.news_id_seq1
	INCREMENT BY 1
	MINVALUE 1
	MAXVALUE 2147483647
	START 1
	CACHE 1
	NO CYCLE;
-- DROP SEQUENCE blog.news_to_tag_id_seq;

CREATE SEQUENCE blog.news_to_tag_id_seq
	INCREMENT BY 1
	MINVALUE 1
	MAXVALUE 2147483647
	START 1
	CACHE 1
	NO CYCLE;
-- DROP SEQUENCE blog.newsletter_id_seq;

CREATE SEQUENCE blog.newsletter_id_seq
	INCREMENT BY 1
	MINVALUE 1
	MAXVALUE 2147483647
	START 1
	CACHE 1
	NO CYCLE;
-- DROP SEQUENCE blog.newsletter_id_seq1;

CREATE SEQUENCE blog.newsletter_id_seq1
	INCREMENT BY 1
	MINVALUE 1
	MAXVALUE 2147483647
	START 1
	CACHE 1
	NO CYCLE;
-- DROP SEQUENCE blog.tag_id_seq;

CREATE SEQUENCE blog.tag_id_seq
	INCREMENT BY 1
	MINVALUE 1
	MAXVALUE 2147483647
	START 1
	CACHE 1
	NO CYCLE;-- blog."member" definition

-- Drop table

-- DROP TABLE blog."member";

CREATE TABLE blog."member" (
	id serial4 NOT NULL,
	member_pseudonym text NOT NULL,
	member_email_address text NOT NULL,
	member_firstname text NOT NULL,
	member_lastname text NOT NULL,
	member_profile_picture_path text NOT NULL DEFAULT 'default-profile.png'::text,
	member_home_address text NULL,
	member_zip_code int4 NULL,
	member_city_name_fr_fr text NULL,
	member_country_name_fr_fr text NULL,
	member_bio_fr_fr text NULL,
	member_date_of_birth timestamp NULL,
	member_phone_number int8 NULL,
	member_facebook_page_url text NULL,
	member_instagram_page_url text NULL,
	member_youtube_page_url text NULL,
	member_gender blog."e_gender_method" NOT NULL DEFAULT 'M'::blog.e_gender_method,
	member_password varchar NOT NULL,
	member_admin bool NOT NULL DEFAULT false,
	member_registration_date timestamp NOT NULL DEFAULT now(),
	CONSTRAINT check_member_bio_fr_fr CHECK (((char_length(member_bio_fr_fr) >= 500) AND (char_length(member_bio_fr_fr) <= 1250))),
	CONSTRAINT check_member_city_name_fr_fr CHECK (((char_length(member_city_name_fr_fr) >= 2) AND (char_length(member_city_name_fr_fr) <= 50))),
	CONSTRAINT check_member_country_name_fr_fr CHECK (((char_length(member_country_name_fr_fr) >= 3) AND (char_length(member_country_name_fr_fr) <= 50))),
	CONSTRAINT check_member_email_address CHECK (((char_length(member_email_address) >= 6) AND (char_length(member_email_address) <= 100))),
	CONSTRAINT check_member_facebook_page_url CHECK (((char_length(member_facebook_page_url) >= 25) AND (char_length(member_facebook_page_url) <= 255))),
	CONSTRAINT check_member_firstname CHECK (((char_length(member_firstname) >= 2) AND (char_length(member_firstname) <= 30))),
	CONSTRAINT check_member_home_address CHECK (((char_length(member_home_address) >= 5) AND (char_length(member_home_address) <= 100))),
	CONSTRAINT check_member_instagram_page_url CHECK (((char_length(member_instagram_page_url) >= 25) AND (char_length(member_instagram_page_url) <= 255))),
	CONSTRAINT check_member_lastname CHECK (((char_length(member_lastname) >= 2) AND (char_length(member_lastname) <= 50))),
	CONSTRAINT check_member_password CHECK (((char_length((member_password)::text) >= 1) AND (char_length((member_password)::text) <= 255))),
	CONSTRAINT check_member_profile_picture_path CHECK (((char_length(member_profile_picture_path) >= 5) AND (char_length(member_profile_picture_path) <= 255))),
	CONSTRAINT check_member_pseudonym CHECK (((char_length(member_pseudonym) >= 3) AND (char_length(member_pseudonym) <= 50))),
	CONSTRAINT check_member_youtube_page_url CHECK (((char_length(member_youtube_page_url) >= 25) AND (char_length(member_youtube_page_url) <= 255))),
	CONSTRAINT member_pkey PRIMARY KEY (id)
);


-- blog.newsletter definition

-- Drop table

-- DROP TABLE blog.newsletter;

CREATE TABLE blog.newsletter (
	id serial4 NOT NULL,
	email varchar(255) NOT NULL,
	date_inscription timestamp NOT NULL DEFAULT now(),
	CONSTRAINT newsletter_pkey PRIMARY KEY (id),
	CONSTRAINT newsletter_un UNIQUE (email)
);


-- blog.tag definition

-- Drop table

-- DROP TABLE blog.tag;

CREATE TABLE blog.tag (
	id serial4 NOT NULL,
	tag_label text NOT NULL,
	CONSTRAINT tag_label CHECK (((char_length('tag_label'::text) >= 2) AND (char_length('tag_label'::text) <= 30))),
	CONSTRAINT tag_pkey PRIMARY KEY (id)
);


-- blog.news definition

-- Drop table

-- DROP TABLE blog.news;

CREATE TABLE blog.news (
	id serial4 NOT NULL,
	news_author_id int2 NOT NULL,
	news_title text NOT NULL,
	news_lead_paragraph text NOT NULL,
	news_content text NOT NULL,
	news_added_date timestamp NOT NULL DEFAULT now(),
	news_update_date timestamp NOT NULL DEFAULT now(),
	news_category text NOT NULL,
	news_cover text NOT NULL DEFAULT 'default-news-cover.jpg'::text,
	news_archive bool NOT NULL DEFAULT false,
	CONSTRAINT check_news_author CHECK (((char_length('news_author'::text) >= 2) AND (char_length('news_author'::text) <= 30))),
	CONSTRAINT check_news_category CHECK (((char_length(news_category) >= 3) AND (char_length(news_category) <= 255))),
	CONSTRAINT check_news_content CHECK (((char_length('news_content'::text) >= 5) AND (char_length('news_content'::text) <= 50000))),
	CONSTRAINT check_news_cover CHECK (((char_length(news_cover) >= 5) AND (char_length(news_cover) <= 255))),
	CONSTRAINT check_news_lead_paragraph CHECK (((char_length(news_lead_paragraph) >= 30) AND (char_length(news_lead_paragraph) <= 1000))),
	CONSTRAINT check_news_title CHECK (((char_length('news_title'::text) >= 3) AND (char_length('news_title'::text) <= 100))),
	CONSTRAINT news_pkey PRIMARY KEY (id),
	CONSTRAINT news_author_id_fk FOREIGN KEY (news_author_id) REFERENCES blog."member"(id)
);


-- blog.news_to_tag definition

-- Drop table

-- DROP TABLE blog.news_to_tag;

CREATE TABLE blog.news_to_tag (
	id serial4 NOT NULL,
	ntt_news_id int2 NOT NULL,
	ntt_tag_id int2 NOT NULL,
	CONSTRAINT news_to_tag_pkey PRIMARY KEY (id),
	CONSTRAINT fk_news_to_tag FOREIGN KEY (ntt_news_id) REFERENCES blog.news(id) ON DELETE CASCADE ON UPDATE RESTRICT,
	CONSTRAINT fk_news_to_tag_1 FOREIGN KEY (ntt_tag_id) REFERENCES blog.tag(id) ON DELETE CASCADE ON UPDATE RESTRICT
);


-- blog."comment" definition

-- Drop table

-- DROP TABLE blog."comment";

CREATE TABLE blog."comment" (
	id serial4 NOT NULL,
	comment_news_id int2 NOT NULL,
	comment_news_author_id int2 NOT NULL,
	comment_content text NOT NULL,
	comment_date timestamp NOT NULL DEFAULT now(),
	comment_status bool NOT NULL DEFAULT false,
	CONSTRAINT check_comment_content CHECK (((char_length('content'::text) >= 5) AND (char_length('content'::text) <= 5000))),
	CONSTRAINT comment_pkey PRIMARY KEY (id),
	CONSTRAINT comment_news_author_id_fk FOREIGN KEY (comment_news_author_id) REFERENCES blog."member"(id),
	CONSTRAINT comment_news_id_fk FOREIGN KEY (comment_news_id) REFERENCES blog.news(id)
);