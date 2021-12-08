<?php

namespace App\Classes;
// session_start();

class Database
{
    public static function dbConnection() {
        $hostName = "localhost";
        $userName = "root";
        $password = "";
        $dbName = "ogani";

        $link = mysqli_connect($hostName, $userName, $password, $dbName);
        return $link;
    }







}