<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MemoTag extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'memo_id',
        'tag_id',
    ];

    public $timestamps = false;
}
