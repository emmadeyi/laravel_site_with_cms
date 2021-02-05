<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'image_url'];
    
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function projects(){
        return $this->belongsToMany(Project::class, 'project_galleries');
    }

    public function equipments(){
        return $this->belongsToMany(Equipment::class, 'equipment_galleries');
    }
}
