<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class nqtQuanTri extends Model
{
    use HasFactory;
    protected $table = 'NQT_QUAN_TRI';
    protected $fillable = [
        // ... các trường hiện có
        'remember_token',
    ];
}
