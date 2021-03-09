<?php
namespace App\Config;

class Database
{
    public static $databases = [
        "dev" => [
            "dsn"      => "mysql:host=localhost;port=3307;dbname=miams;charset=utf8mb4",
            "username" => "root",
            "password" => ""
        ]
    ];
}