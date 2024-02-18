<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Technology extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'technology',
        'color',
    ];

    public function projects()
    {
        return $this->belongsToMany(Project::class);
    }
}