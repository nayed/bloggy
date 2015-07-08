<?php

namespace App;

class App{

    const DB_NAME = 'blog-php';
    const DB_USER = 'root';
    const DB_PASS = '';
    const DB_HOST = 'localhost';
    private static $database;
    private static $title = "Awesome blog!";

    public static function getDB(){
        if(is_null(self::$database)){
            self::$database = new Database(self::DB_NAME, self::DB_USER, self::DB_PASS, self::DB_HOST);
        }
        return self::$database;
    }

    public static function notFound(){
        header("HTTP/1.0 404 Not Found");
        header("Location:index.php?p=404");
    }

    public static function getTitle(){
        return self::$title;
    }

    public static function setTitle($title){
        self::$title = $title;
    }
}