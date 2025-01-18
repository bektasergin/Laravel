<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Oyuncak extends Model
{

    use HasFactory;

    protected $table = "oyuncak";

    public $timestamps = false;
}
