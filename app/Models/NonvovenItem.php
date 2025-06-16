<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NonVovenItem extends Model
{
    use HasFactory;

    protected $table = 'non_woven';

    protected $fillable = [
        'item_code',
        'non_size',
        'non_color',
        'non_gsm',
    ];

    public function category()
    {
        return $this->belongsTo(NonVovenCategory::class, 'non_color', 'category_value');
    }
}
