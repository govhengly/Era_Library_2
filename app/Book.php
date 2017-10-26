<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    public function borrow(){

        return $this->hasMany(Book::class);
    }

    protected $table='books';
}
