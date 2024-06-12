<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserDetail extends Model
{
    use HasFactory;
    protected $table = 'user_details';
    protected $primaryKey = 'user_id';
    protected $fillable = [
        'username', 'first_name', 'last_name', 'gender', 'password', 'status'
    ];
    public $timestamps = false;
}
