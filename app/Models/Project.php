<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'thumbnail', 'title', 'slug', 'sub_title', 'details', 'post_type', 'is_published'];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function equipments(){
        return $this->belongsToMany(Equipment::class, 'equipment_projects');
    }

    public function galleries(){
        return $this->belongsToMany(Gallery::class, 'project_galleries');
    }
}
