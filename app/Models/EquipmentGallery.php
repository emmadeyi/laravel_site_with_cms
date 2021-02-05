<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EquipmentGallery extends Model
{
    use HasFactory;
    protected $fillable = ['equipment_id', 'gallery_id'];
}
