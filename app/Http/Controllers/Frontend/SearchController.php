<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $categories = Category::with('subcategories')->get();
        $query = $request->input('query'); // Get search query

        if ($query) {
            // Normalize the query by removing extra spaces and converting to lowercase
            $normalizedQuery = preg_replace('/\s+/', ' ', trim(strtolower($query)));

            $results = Product::where(function ($q) use ($normalizedQuery) {
                // Split the query into individual words
                $queryWords = explode(' ', $normalizedQuery);

                // Search for products where ALL query words are present in product name or category
                $q->where(function ($productQuery) use ($queryWords, $normalizedQuery) {
                    foreach ($queryWords as $word) {
                        $productQuery->whereRaw('LOWER(product_name) LIKE ?', ['%' . $word . '%']);
                    }

                    // Additional check to include full query matches
                    $productQuery->orWhereRaw('LOWER(product_name) LIKE ?', ['%' . $normalizedQuery . '%']);
                })->orWhere(function ($categoryQuery) use ($queryWords, $normalizedQuery) {
                    foreach ($queryWords as $word) {
                        $categoryQuery->whereHas('category', function ($subQuery) use ($word) {
                            $subQuery->whereRaw('LOWER(category_name) LIKE ?', ['%' . $word . '%']);
                        });
                    }

                    // Additional check to include categories with the full search query
                    $categoryQuery->orWhereHas('category', function ($subQuery) use ($normalizedQuery) {
                        $subQuery->whereRaw('LOWER(category_name) LIKE ?', ['%' . $normalizedQuery . '%']);
                    });
                })->orWhere(function ($brandQuery) use ($queryWords, $normalizedQuery) {
                    // Search in brands
                    foreach ($queryWords as $word) {
                        $brandQuery->whereHas('brands', function ($subQuery) use ($word) {
                            $subQuery->whereRaw('LOWER(brand_name) LIKE ?', ['%' . $word . '%']);
                        });
                    }

                    // Additional check to include full brand name matches
                    $brandQuery->orWhereHas('brands', function ($subQuery) use ($normalizedQuery) {
                        $subQuery->whereRaw('LOWER(brand_name) LIKE ?', ['%' . $normalizedQuery . '%']);
                    });
                });
            })->with('brands', 'images', 'category')->get();

            return view('frontend.product.search_results', compact('results', 'query', 'categories'));
        }

        $subcategory = SubCategory::findOrFail($request->input('subcategory_id'));
        $products = $subcategory->products()->with('images')->paginate(9);

        return view('frontend.product.index', compact('subcategory', 'categories', 'products'));
    }
}