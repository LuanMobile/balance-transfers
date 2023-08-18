<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Saldos extends Model
{
    use HasFactory;

    protected $fillable = ['amount', 'currency'];

    public function User() {
        return $this->belongsTo(User::class, 'user_id');
    }
}
