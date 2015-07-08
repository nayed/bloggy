<?php

namespace App\Table;

use App\App;

class Article extends Table{

    protected static $table = 'articles';

    public static function find($id){
        return self::query("
            SELECT articles.id, articles.title, articles.content, categories.title as categories 
            FROM articles 
            LEFT JOIN categories 
                on categorie_id = categories.id
            WHERE articles.id = ?",
            [$id], true
        );
    }

    public static function getLast(){
        return self::query("
            SELECT articles.id, articles.title, articles.content, categories.title as categories 
            FROM articles 
            LEFT JOIN categories 
                on categorie_id = categories.id
            ORDER BY articles.date DESC"
        );
    }

    public static function lastByCategorie($categorie_id){
        return self::query("
            SELECT articles.id, articles.title, articles.content, categories.title as categories 
            FROM articles 
            LEFT JOIN categories 
                on categorie_id = categories.id
            WHERE categorie_id = ?
            ORDER BY articles.date DESC", 
            [$categorie_id]);
    }

    public function __get($key){
        $method = 'get' . ucfirst($key);
        $this->$key = $this->$method();
        return $this->$key;
    }

    public function getUrl(){
        return 'index.php?p=article&id=' . $this->id;
    }
    
    public function getPreview(){
        $html = '<p>' . substr($this->content, 0, 150) . '...</p>';
        $html .= '<p><a href="' . $this->getURL() . ' ">See the rest...</a></p>';
        return $html;
    }
}