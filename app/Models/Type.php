<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Type extends Model {
    use HasFactory;

    protected $fillable = [
        'title',
        'slug'
    ];

    //definisco la relazione con project
    public function project() {
        return $this->hasMany(Project::class);
    }
}