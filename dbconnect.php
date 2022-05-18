<?php


class Database {
    
    function GetConnectionObj(){
        $host = "127.0.0.1:3307";
        $username = "root";
        $password= "12345678";
        $db = "kumar50";
        $conn = mysqli_connect($host, $username, $password, $db);
        if (!$conn) {
            die("Database connection error");
        }
        return  $conn;
    }
}

