<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    protected $fillable  = [
        "title",
        "content",
        "url",
        "type_id",
        "project_id",
        "technology_id",
        "image",
    ];
    
    public function type(){
        return $this->belongsTo(Type::class);
    }
    
    public function technologies(){
        return $this->belongsToMany(Technology::class);
    }
}
