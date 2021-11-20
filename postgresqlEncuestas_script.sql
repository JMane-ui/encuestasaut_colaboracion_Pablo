CREATE EXTENSION IF NOT EXISTS "uuid-ossp";
create sequence users_seq;

create table if not exists users(
    id int primary key default nextval ('users_seq'),
    name varchar(50) not null,
    email varchar(50) unique not null,
    password varchar(255) not null,
    user_img varchar(255) default 'iconuser.png',
    created_at timestamp(0) default now()
);

-- SQLINES LICENSE FOR EVALUATION USE ONLY
create sequence question_forms_seq;

create table if not exists question_forms(
	id int primary key default nextval ('question_forms_seq'),
    title varchar(50),
    slug varchar(50),
    description text,
    objective varchar(100),
    user_id int not null,
    created_at timestamp(0) default now(),
    uuid uuid unique default uuid_generate_v4() ,
    survey_img varchar(255) default 'notimage.png',
    constraint fk_user_question_form foreign key (user_id) references users(id) on delete cascade
);

-- SQLINES LICENSE FOR EVALUATION USE ONLY
create sequence answer_forms_seq;

create table if not exists answer_forms(
	id int primary key default nextval ('answer_forms_seq'),
	question_form_id int not null,
    created_at timestamp(0) default now(),
    seen smallint default 0,
    country varchar(255),
    city varchar(255),
    lat double precision,
    lon double precision,
    constraint fk_question_form_answer_form foreign key (question_form_id) references question_forms(id) on delete cascade
);

-- SQLINES LICENSE FOR EVALUATION USE ONLY
create sequence questions_seq;

create table if not exists questions(
	id int primary key default nextval ('questions_seq'),
	type varchar(20) not null,
    required smallint not null,
    body varchar(255) not null,
    question_form_id int not null,
    constraint fk_question_form_question foreign key (question_form_id) references question_forms(id) on delete cascade
);

-- SQLINES LICENSE FOR EVALUATION USE ONLY
create sequence propositions_seq;

create table if not exists propositions(
	id int primary key default nextval ('propositions_seq'),
    body varchar(255) not null,
    question_id int not null,
    constraint fk_question_propositions foreign key (question_id) references questions(id) on delete cascade
);

-- SQLINES LICENSE FOR EVALUATION USE ONLY
create sequence answers_seq;

create table if not exists answers(
	id int primary key default nextval ('answers_seq'),
    answer_form_id int not null,
    question_id int not null,
    constraint fk_answer_form_answer foreign key (answer_form_id) references answer_forms(id) on delete cascade,
	constraint fk_question_answer foreign key(question_id) references questions(id) on delete cascade
);

-- SQLINES LICENSE FOR EVALUATION USE ONLY
create table if not exists mcq(
    id int primary key,
    body varchar(255)
);

-- SQLINES LICENSE FOR EVALUATION USE ONLY
create table if not exists open(
    id int primary key,
    body text
);
-- SQLINES LICENSE FOR EVALUATION USE ONLY
create table if not exists date(
    id int primary key,
    body date
);
-- SQLINES LICENSE FOR EVALUATION USE ONLY
create table if not exists time(
    id int primary key,
    body time(0)
);
-- SQLINES LICENSE FOR EVALUATION USE ONLY
create table if not exists minmax(
    id int primary key,
    minimum int,
    maximum int
);
