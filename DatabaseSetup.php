<?php

    // Note that these are for the local Docker container
    $env = parse_ini_file('pixelpets/.env');
    $db = [
        "host" => $env["HOST"],
        "port" => $env["PORT"],
        "user" => $env["USER"],
        "pass" => $env["PASSWORD"],
        "database" => $env["DATABASE"]
    ];

    $host = $db["host"];
    $user = $db["user"];
    $database = $db["database"];
    $password = $db["pass"];
    $port = $db["port"];

    $dbHandle = pg_connect("host=$host port=$port dbname=$database user=$user password=$password");

    if ($dbHandle) {
        echo "Success connecting to database";
    } else {
        echo "An error occurred connecting to the database";
    }

    // Drop tables and sequences
    $res  = pg_query($dbHandle, "drop sequence if exists pet_seq;");
    $res  = pg_query($dbHandle, "drop sequence if exists user_seq;");
    $res  = pg_query($dbHandle, "drop sequence if exists frequest_seq;");
    $res  = pg_query($dbHandle, "drop table if exists pets;");
    $res  = pg_query($dbHandle, "drop table if exists users;");
    $res  = pg_query($dbHandle, "drop table if exists frequests;");

    // Create sequences
    $res  = pg_query($dbHandle, "create sequence pet_seq;");
    $res  = pg_query($dbHandle, "create sequence user_seq;");
    $res  = pg_query($dbHandle, "create sequence frequest_seq;");
    
    // Create tablse
    $res  = pg_query($dbHandle, "create table pets (
            id  int primary key default nextval('pet_seq'),
            name text,
            owneremail text,
            json text
    );");
    $res  = pg_query($dbHandle, "create table users (
            id  int primary key default nextval('user_seq'),
            email text,
            password text,
            username text,
            friends text
        );");
    $res  = pg_query($dbHandle, "create table frequests (
            id  int primary key default nextval('frequest_seq'),
            requester text,
            requestee text
    );");
    echo "and Successfully reset Database";

    // Read json and insert the trivia questions into the database
    // Note: the URL is updated due to changes on the CS web server
    