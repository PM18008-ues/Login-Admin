<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
    use HasFactory;
    protected $table = 'discounts';
    protected $fillable = [
        'userId',
        'amount'
    ];

    public function user()
    {
        return $this->hasMany(User::class, 'id', 'userId');
    }
}
