<?php

namespace App\Http\Controllers\User;

use App\Product;
use App\ProductCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ProductController extends Controller
{

    public function index(Request $request)
    {
        $products = null;

        if ($cats = $request->query('cat')) {
//            ProductCategory::whereIn('slug', ['flowerpot', 'handmade-door-mat'])
            $products = DB::table('products')
                ->join('product_product_category', 'products.id', '=', 'product_product_category.product_id')
                ->whereIn('product_category_id', $cats);
        }

        if ($attr = $request->query('attr')) {
            if ($products === null) {
                $products = DB::table('products')
                    ->join('product_attribute_value', 'products.id', '=', 'product_attribute_value.product_id')
                    ->whereIn('attribute_id', $attr);
            } else {
                $products->join('product_attribute_value', 'products.id', '=', 'product_attribute_value.product_id')
                    ->whereIn('attribute_id', $attr);
            }
        }

        if ($attr_val = $request->query('attr_val')) {
            if ($products === null) {
                $products = DB::table('products')
                    ->join('product_attribute_value', 'products.id', '=', 'product_attribute_value.product_id')
                    ->whereIn('text_value', $attr_val);

                foreach ($attr_val as $value) {
                    $products->orWhere('json_value', 'like', '%' . $value . '%');
                }

            } else {
                if ($request->query('attr')) {
                    $products->whereIn('text_value', $attr_val);
                } else {
                    $products->join('product_attribute_value', 'products.id', '=', 'product_attribute_value.product_id')
                        ->whereIn('text_value', $attr_val);
                }


                foreach ($attr_val as $value) {
                    $products->orWhere('json_value', 'like', '%' . $value . '%');
                }
            }
        }

        if ($price = $request->query('price')) {
            list($min, $max) = explode('-', $price);

            if ($products == null) {
                $temp = DB::table('products')
                    ->join('product_variants', 'products.id', '=', 'product_variants.product_id')
                    ->join('product_variant_pricing', 'product_variants.id', '=', 'product_variant_pricing.product_variant_id')
                    ->whereBetween("configuration->originalPrice", [$min, $max]);

                dd($temp->toSql());
            }

            dd($min, $max);
        }

        // query
        if ($q = $request->query('q')) {
            $products->where('name', 'like', '%' . $q . '%');
        }


//        dd($products);
//        dd(Product::find(array_unique($products->get()->pluck('product_id')->toArray())));
/*        highlight_string("<?php\n\$data =\n" . var_export($products->toArray(), true) . ";\n?>");*/
    }

    public function show(string $slug)
    {
        $product = Product::where('slug', $slug)->first();

        return view('public.single-product', compact('product'));
    }
}
