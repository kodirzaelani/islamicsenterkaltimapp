<?php

namespace App\Models;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Transactionitem extends Model
{
    use HasFactory;
    use Uuid;

    protected $table        = 'transactionitems';
    protected $primaryKey   = 'id';
    protected $guarded      = [];

    public function product()
    {
        return $this->belongsTo(Product::class, 'products_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'users_id');
    }
    public function transaction()
    {
        return $this->belongsTo(Transaction::class, 'transactions_id');
    }
}
