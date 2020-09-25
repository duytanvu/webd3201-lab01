-- Duy Tan Vu - 100750366
-- September 16 2020
-- WEBD3201

-- Add extension for password encrypting
CREATE EXTENSION IF NOT EXISTS pgcrypto;

DROP SEQUENCE IF EXISTS users_id_seq CASCADE;
CREATE SEQUENCE users_id_seq START 1000;

DROP TABLE IF EXISTS users;
CREATE TABLE users (
    Id INT PRIMARY KEY DEFAULT nextval('users_id_seq'),
    EmailAddress VARCHAR(255) UNIQUE,
    Password VARCHAR(255) NOT NULL,
    FirstName VARCHAR(128),
    LastName VARCHAR(128), 
    LastAccess TIMESTAMP,
    EnrolDate TIMESTAMP,
    Enabled BOOLEAN, 
    Type VARCHAR(2)
);

INSERT INTO Users (EmailAddress, Password, FirstName, LastName, LastAccess, EnrolDate, Enabled, Type) VALUES (
    'jdoe@dcmail.ca',
    crypt('some_password', gen_salt('bf')), --bf stands for blowfish
    'John',
    'Doe',
    '2020-06-22 19:10:25',
    '2020-08-22 11:11:11',
    true,
    's'
);

INSERT INTO Users (EmailAddress, Password, FirstName, LastName, LastAccess, EnrolDate, Enabled, Type) VALUES (
    'john.paul@gmail.com',
    crypt('john_paul_123', gen_salt('bf')), --bf stands for blowfish
    'John',
    'Paul',
    '2020-06-22 19:10:25',
    '2020-08-22 11:11:11',
    true,
    's'
);

INSERT INTO Users (EmailAddress, Password, FirstName, LastName, LastAccess, EnrolDate, Enabled, Type) VALUES (
    'nick.william@gmail.com',
    crypt('nick_william_123', gen_salt('bf')), --bf stands for blowfish
    'Nick',
    'William',
    '2020-06-22 19:10:25',
    '2020-08-22 11:11:11',
    true,
    's'
);

INSERT INTO Users (EmailAddress, Password, FirstName, LastName, LastAccess, EnrolDate, Enabled, Type) VALUES (
    'jackson.mason@gmail.com',
    crypt('jackson_mason_123', gen_salt('bf')), --bf stands for blowfish
    'Jackson',
    'Mason',
    '2020-06-22 19:10:25',
    '2020-08-22 11:11:11',
    true,
    's'
);