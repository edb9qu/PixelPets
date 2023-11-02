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
    $res  = pg_query($dbHandle, "drop sequence if exists question_seq;");
    $res  = pg_query($dbHandle, "drop sequence if exists user_seq;");
    $res  = pg_query($dbHandle, "drop sequence if exists userquestion_seq;");
    $res  = pg_query($dbHandle, "drop table if exists questions;");
    $res  = pg_query($dbHandle, "drop table if exists users;");

    // Create sequences
    $res  = pg_query($dbHandle, "create sequence question_seq;");
    $res  = pg_query($dbHandle, "create sequence user_seq;");
    $res  = pg_query($dbHandle, "create sequence userquestion_seq;");

    // Create tablse
    $res  = pg_query($dbHandle, "create table questions (
            id  int primary key default nextval('question_seq'),
            question    text,
            answer      text
    );");
    $res  = pg_query($dbHandle, "create table users (
            id  int primary key default nextval('user_seq'),
            email text,
            password text,
            username text);");
    echo "and Successfully reset Database";

    // Read json and insert the trivia questions into the database
    // Note: the URL is updated due to changes on the CS web server
    