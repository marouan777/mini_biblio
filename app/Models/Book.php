<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Status;

class Book extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'author',
        'published_year',
        'category',
        'status',
    ];

    public function borrowings()
    {
        return $this->hasMany(Borrowing::class);
    }
    public function status()
    {
        return $this->morphOne(Status::class, 'statusable');
    }
}

