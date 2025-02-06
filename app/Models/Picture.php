<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Picture extends Model
{
    use HasFactory;

    protected $fillable = [
        'filename'
    ];

    public function getImageUrl(): string
    {
        return Storage::disk('public')->url($this->filename);
    }
}
