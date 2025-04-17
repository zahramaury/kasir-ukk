<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Member extends Model
{
    protected $table = 'members';

    protected $fillable = [
        'name',
        'phone_number',
        'poin_member'
    ];

    public function sale(): HasMany
    {
        return $this->hasMany(Sale::class, 'member_id');
    }

}
