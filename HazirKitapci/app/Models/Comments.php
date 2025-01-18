<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comments extends Model
{
    use SoftDeletes;

    protected $table = "comments";

    public function book()
    {
        return $this->belongsTo(Books::class, 'book_id');
    }
}
