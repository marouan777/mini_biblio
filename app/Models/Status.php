<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Status extends Model
{
    protected $table = 'status';
    protected $fillable = ['name']; // Ou tout autre champ que tu veux permettre

    public function statusable(): MorphTo
    {
        return $this->morphTo();
    }
}
