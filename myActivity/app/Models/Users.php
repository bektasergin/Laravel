<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Users extends Authenticatable
{
    use HasFactory;

    protected $table = 'users'; // Tablo adını belirtiyoruz

    protected $primaryKey = 'userID'; // Birincil anahtar sütunu userID

    public $incrementing = true; // Otomatik artan birincil anahtar olduğunu belirtiyoruz

    protected $keyType = 'int'; // Birincil anahtar türü int

    protected $fillable = [
        'name',
        'surname',
        'email',
        'password',
        'created_at',
        'updated_at',
    ];
}
