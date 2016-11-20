<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    public function user()
    {
        return $this->belongsTo("User");
    }

    public function role()
    {
        return $this->belongsTo("Bican\\Roles\\Models\\Role");
    }
}
