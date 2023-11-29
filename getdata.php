<?php

$db = new Database();
echo "HELLO";
// print_r($db);
$res = $db->query("select * from pets where owneremail = $1 and name = $2;", $_GET["email"], $_GET["name"]);
if(!empty($res))
    // print_r($res[0]);
    // echo $res[0]["json"];
    echo(($res[0]["json"]));