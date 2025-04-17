<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Sale extends Model
{
    protected $table = 'sales';

    protected $fillable = [
        'member_id',
        'user_id',
        'total_price',
        'total_pay',
        'total_return',
        'poin',
        'total_poin'
    ];

    public function member(): BelongsTo{
        return $this->belongsTo(Member::class, 'member_id');
    }

    public function user(): BelongsTo{
        return $this->belongsTo(User::class, 'user_id');
    }

    public function details(): HasMany
    {
        return $this->hasMany(SaleDetail::class, 'sale_id');
    }
}
