<?php

namespace App\Models;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Productgalery extends Model
{
    use HasFactory;
    use Uuid;

    protected $table        = 'productgaleries';
    protected $primaryKey   = 'id';
    protected $guarded      = [];


    public function getImageUrlAttribute($value)
    {
        $imageUrl = "";

        if (!is_null($this->image)) {
            $directory = config('cms.image.directoryProduct');
            $imagePath = public_path() . "/{$directory}" . $this->image;
            if (file_exists($imagePath)) $imageUrl = asset("/{$directory}" . $this->image);
        }

        return $imageUrl;
    }

    public function getImageThumbUrlAttribute($value)
    {
        $imageThumbUrl = "";

        if (!is_null($this->image)) {
            $directory = config('cms.image.directoryProduct');
            $imagePath = public_path() . "/{$directory}/images_thumb/" . $this->image;
            if (file_exists($imagePath)) $imageThumbUrl = asset("/$directory" . $this->image);
        }

        return $imageThumbUrl;
    }
}
