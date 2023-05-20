<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'picture', 'title', 'price', 'description'
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        // add other columns that should be treated as dates here
    ];

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function setCreatedAtAttribute($value)
    {
        $this->attributes['created_at'] = $value;
        $this->attributes['updated_at'] = $value;
    }
}

