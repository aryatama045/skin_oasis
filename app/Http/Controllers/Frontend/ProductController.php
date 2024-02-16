<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductVariationInfoResource;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductTag;
use App\Models\ProductVariation;
use App\Models\Tag;
use App\Models\Testimoni;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    # product listing
    public function index(Request $request)
    {
        $searchKey = null;
        $limit = 8;

        $products = ProductVariation::leftJoin('products as b', 'product_variations.product_id', '=', 'b.id')
                    ->leftJoin('product_variation_stocks as c', 'product_variations.id', '=', 'c.product_variation_id')
                    ->where('is_popular', 1)->limit($limit)->get();
        // dd($products);
        $tags = Tag::all();
        return getView('pages.products.index', [
            'products'      => $products,
            'tags'          => $tags,
        ]);
    }

    public function allProduct(Request $request)
    {
        $searchKey = null;
        $per_page = 9;
        $sort_by = $request->sort_by ? $request->sort_by : "new";
        $maxRange = Product::max('max_price');
        $min_value = 0;
        $max_value = formatPrice($maxRange, false, false, false, false);

        $products = Product::isPublished();

        # conditional - search by
        if ($request->search != null) {
            $products = $products->where('name', 'like', '%' . $request->search . '%');
            $searchKey = $request->search;
        }

        # pagination
        if ($request->per_page != null) {
            $per_page = $request->per_page;
        }

        # sort by
        if ($sort_by == 'new') {
            $products = $products->latest();
        } else {
            $products = $products->orderBy('total_sale_count', 'DESC');
        }

        # by price
        if ($request->min_price != null) {
            $min_value = $request->min_price;
        }
        if ($request->max_price != null) {
            $max_value = $request->max_price;
        }

        if ($request->min_price || $request->max_price) {
            $products = $products->where('min_price', '>=', priceToUsd($min_value))->where('min_price', '<=', priceToUsd($max_value));
        }

        # by category
        if ($request->category_id && $request->category_id != null) {
            $product_category_product_ids = ProductCategory::where('category_id', $request->category_id)->pluck('product_id');
            $products = $products->whereIn('id', $product_category_product_ids);
        }

        # by brand
        if ($request->brand_id && $request->brand_id != null) {
            // $product_category_product_ids = Product::where('brand_id', $request->brand_id)->get();
            // dd($request->brand_id);
            $products = $products->where('brand_id', $request->brand_id);
        }

        # by tag
        if ($request->tag_id && $request->tag_id != null) {
            $product_tag_product_ids = ProductTag::where('tag_id', $request->tag_id)->pluck('product_id');
            $products = $products->whereIn('id', $product_tag_product_ids);
        }
        # conditional

        $products = $products->paginate(paginationNumber($per_page));

        $tags = Tag::all();
        return getView('pages.products.allproduct', [
            'products'      => $products,
            'searchKey'     => $searchKey,
            'per_page'      => $per_page,
            'sort_by'       => $sort_by,
            'max_range'     => formatPrice($maxRange, false, false, false, false),
            'min_value'     => $min_value,
            'max_value'     => $max_value,
            'tags'          => $tags,
        ]);
    }

    # product show
    public function show($slug)
    {
        $product                        = Product::where('slug', $slug)->first();

        if (auth()->check() && auth()->user()->user_type == "admin") {
            // do nothing
        } else {
            if ($product->is_published == 0) {
                flash(localize('This product is not available'))->info();
                return redirect()->route('home');
            }
        }

        $productCategories              = $product->categories()->pluck('category_id');
        $productIdsWithTheseCategories  = ProductCategory::whereIn('category_id', $productCategories)->where('product_id', '!=', $product->id)->pluck('product_id');

        $relatedProducts                = Product::whereIn('id', $productIdsWithTheseCategories)->get();

        $review     = Testimoni::leftJoin('users', 'product_testimoni.customer_id', '=', 'users.id' )
                        ->where('product_testimoni.product_id', '=', $product->id)
                        ->where('product_testimoni.is_banned', '!=', '1')
                        ->select('users.name as name_user', 'product_testimoni.title', 'product_testimoni.rating', 'product_testimoni.comment', 'product_testimoni.created_at as tanggal')
                        ->get();

        $product_page_widgets = [];
        if (getSetting('product_page_widgets') != null) {
            $product_page_widgets = json_decode(getSetting('product_page_widgets'));
        }

        return getView('pages.products.show', ['review' => $review , 'product' => $product, 'relatedProducts' => $relatedProducts, 'product_page_widgets' => $product_page_widgets]);
    }

    # product info
    public function showInfo(Request $request)
    {
        $product = Product::find($request->id);
        return getView('pages.partials.products.product-view-box', ['product' => $product]);
    }

    # product variation info
    public function getVariationInfo(Request $request)
    {
        $variationKey = "";
        foreach ($request->variation_id as $variationId) {
            $fieldName      = 'variation_value_for_variation_' . $variationId;
            $variationKey  .=  $variationId . ':' . $request[$fieldName] . '/';
        }
        $productVariation = ProductVariation::where('variation_key', $variationKey)->where('product_id', $request->product_id)->first();

        return new ProductVariationInfoResource($productVariation);
    }
}
