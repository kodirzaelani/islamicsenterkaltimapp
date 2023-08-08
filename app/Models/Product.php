<?php

namespace App\Models;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;
    use Uuid;

    protected $table        = 'products';
    protected $primaryKey   = 'id';
    protected $guarded      = [];


    public function scopeSearch($query, $term)
    {
        $term = "%$term%";
        $query->where(function ($query) use ($term) {
            $query->where('title', 'like', $term);
        });
    }

    public function productcategory()
    {
        return $this->belongsTo(Productcategory::class, 'productcategory_id');
    }

    public function productgaleries()
    {
        return $this->hasMany(Productgalery::class, 'product_id');
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class, 'product_id');
    }


    // fungsi scope untuk manampilkan yang status publish
    public function scopePublished($query)
    {
        return $query->where("status", "=", 1);
    }
}
