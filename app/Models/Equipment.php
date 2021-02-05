<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipment extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'thumbnail', 'name', 'slug', 'description', 'is_published'];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function projects(){
        return $this->belongsToMany(Project::class, 'equipment_projects');
    }

    public function galleries(){
        return $this->belongsToMany(Gallery::class, 'equipment_galleries');
    }
}
