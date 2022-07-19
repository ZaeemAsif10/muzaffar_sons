<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasFactory;

    protected $fillable = ['block_id','images'];

    public function block()
    {
        return $this->belongsTo(Block::class, 'block_id', 'id');
    }
}
