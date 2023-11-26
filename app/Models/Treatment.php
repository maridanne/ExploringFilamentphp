<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Casts\MoneyCast;
use Illuminate\Database\Eloquent\Model;

class Treatment extends Model
{
    use HasFactory;
    public function patient(): BelongsTo
    {
        return $this->belongsTo(Patient::class);
    }
    protected $fillable = ['description','notes', 'price'];
    protected $casts = [
        'price' => MoneyCast::class,
    ];
}
