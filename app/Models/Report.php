<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'endpoint',
        'file',
        'format',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
