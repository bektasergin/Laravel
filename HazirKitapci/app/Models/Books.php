<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Books extends Model
{
    use SoftDeletes;

    protected $table = 'books';

    public function category(){
        return $this->belongsTo(Categories::class, 'category_id', 'id');
    }

    protected static function boot(){
        parent::boot();
        static::creating(function($book){
            $book->uuid = (string) \Str::uuid();
        });
    }

    public function comments()
    {
        return $this->hasMany(Comments::class, 'book_id');
    }
}
