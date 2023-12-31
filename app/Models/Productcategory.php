<?php

namespace App\Models;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Productcategory extends Model
{
    use HasFactory;
    use SoftDeletes;
    use Uuid;

    protected $table        = 'productcategories';
    protected $primaryKey   = 'id';
    protected $guarded      = [];

    public function scopeSearch($query, $term)
    {
        $term = "%$term%";
        $query->where(function ($query) use ($term) {
            $query->where('title', 'like', $term);
        });
    }

    public function products()
    {
        return $this->hasMany(Product::class, 'productcategory_id');
    }

    public function getImageUrlAttribute($value)
    {
        $imageUrl = "";

        if (!is_null($this->image)) {
            $directory = config('cms.image.directoryProductcategory');
            $imagePath = public_path() . "/{$directory}" . $this->image;
            if (file_exists($imagePath)) $imageUrl = asset("/{$directory}" . $this->image);
        }

        return $imageUrl;
    }

    public function getImageThumbUrlAttribute($value)
    {
        $imageThumbUrl = "";

        if (!is_null($this->image)) {
            $directory = config('cms.image.directoryProductcategory');
            $imagePath = public_path() . "/{$directory}/images_thumb/" . $this->image;
            if (file_exists($imagePath)) $imageThumbUrl = asset("/$directory" . $this->image);
        }

        return $imageThumbUrl;
    }
}
