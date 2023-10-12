<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model {
    use HasFactory;

    protected $casts = [
        "published_at" => "datetime",
    ];

    protected $fillable = [
        'title',
        'description',
        'image',
        'slug',
        'link',
        'type_id',
    ];

    // definisco la relazione con type
    public function type() {
        return $this->belongsTo(Type::class);
    }
}
