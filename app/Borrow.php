<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Borrow extends Model
{
    protected $table = 'borrows';
    public function book()
        {
            return $this->belongsTo(Book::class, 'book_id');
        }
    public $timestamps=true;
}
