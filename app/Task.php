<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{

    protected $fillable = ['name', 'role_id', 'status'];

    public function user()
    {
        return $this->belongsTo("User");
    }

    public function role()
    {
        return $this->belongsTo("Bican\\Roles\\Models\\Role");
    }

    public static function getStatusDefinitionArray()
    {
        return [
            0 => "İşleme Alınmadı",
            1 => "İşleme Alındı",
            2 => "Tamamlandı"
        ];
    }
}
