<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class DocumentType extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = ['type', 'variables'];

    public function documents()
    {
        return $this->hasMany(Document::class);
    }    
}
