<?php

namespace App\Models;

class Listing{
    public static function all(){
        return [
            [
                'id' => 1,
                'title' => 'Listing One',
                'description' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Iste, labore doloremque est rerum voluptatibus odit repellat repellendus id error asperiores nisi veniam, nemo doloribus atque et quia eveniet similique eum.'
            ],
            [
                'id' => 2,
                'title' => 'Listing Two',
                'description' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Iste, labore doloremque est rerum voluptatibus odit repellat repellendus id error asperiores nisi veniam, nemo doloribus atque et quia eveniet similique eum.'
            ]
            ];
    }
    public static function find($id){
        $listings = self::all();

        foreach($listings as $listing){
            if($listing['id'] == $id){
                return $listing;
            }
        }
    }
}