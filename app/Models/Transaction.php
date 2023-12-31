<?php

namespace App\Models;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Transaction extends Model
{
    use HasFactory;
    use Uuid;

    protected $table        = 'transactions';
    protected $primaryKey   = 'id';
    protected $guarded      = [];

    public function user()
    {
        return $this->belongsTo(User::class, 'users_id');
    }

    public function transactionitems()
    {
        return $this->hasMany(Transactionitem::class, 'transactions_id');
    }
}
