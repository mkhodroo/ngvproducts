<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Access extends Model
{
    use HasFactory;
    public $table = "access";
    protected $fillable = [
        'method_id', 'role_id', 'access'
    ];
}
