<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



class Task extends Model {
    protected $fillable = ['project_id', 'title', 'description', 'status', 'priority', 'assigned_to'];

    public function project() {
        return $this->belongsTo(Project::class);
    }

    public function assignedUser() {
        return $this->belongsTo(User::class, 'assigned_to');
    }
}
