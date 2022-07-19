<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project_detail extends Model
{
    use HasFactory;

    public function projects()
    {
        return $this->belongsTo(Project::class, 'project_id', 'id');
    }
}
