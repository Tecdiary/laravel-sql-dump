-- Generating SQL dump file from Laravel migrations --

-- migration: create_users_table --
create table "users" (
  "id" integer not null primary key autoincrement, 
  "name" varchar not null, "email" varchar not null, 
  "password" varchar not null
);
create unique index "users_email_unique" on "users" ("email");

-- insert data -- 
insert into "users" ("name", "email", "password") 
values 
  (
    'Test User', 'test@test.com', 'testing'
  );
