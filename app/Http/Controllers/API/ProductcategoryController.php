<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Models\Productcategory;
use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;

class ProductcategoryController extends Controller
{
    public function all(Request $request)
    {
        $id = $request->input('id');
        $limit = $request->input('limit', 6);
        $title = $request->input('title');
        $show_product = $request->input('show_product');

        if ($id) {
            $category = Productcategory::with(['products'])->find($id);

            if ($category)
                return ResponseFormatter::success(
                    $category,
                    'Data produk berhasil diambil'
                );
            else
                return ResponseFormatter::error(
                    null,
                    'Data kategori produk tidak ada',
                    404
                );
        }

        $category = ProductCategory::query();

        if ($title)
            $category->where('title', 'like', '%' . $title . '%');

        if ($show_product)
            $category->with('products');

        return ResponseFormatter::success(
            $category->paginate($limit),
            'Data list kategori produk berhasil diambil'
        );
    }
}
