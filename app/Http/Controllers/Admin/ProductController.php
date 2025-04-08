<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProductRequest;
use App\Models\Article;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Color;
use App\Models\Country;
use App\Models\Fabric;
use App\Models\Material;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\Promotional;
use App\Models\Size;
use App\Models\SubCategory;
use App\Models\Wear;
use App\Models\Weight;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        return view('admin.product.index', compact('products'));
    }

    public function create()
    {
        // Fetch categories from the database
        $categories = Category::all();
        $sub_categories = SubCategory::all();
        $materials = Material::all();
        $weights = Weight::all();
        $promotions = Promotional::all();
        $wears = Wear::all();
        $articles = Article::all();
        $sizes = Size::all();
        $colors = Color::all();
        $fabrics = Fabric::all();
        $countries = Country::all();
        $brands = Brand::all();

        return view('admin.product.create', compact('categories', 'sub_categories', 'materials', 'weights', 'promotions', 'wears', 'articles', 'sizes', 'colors', 'fabrics', 'countries', 'brands'));
    }


    // public function store(ProductRequest $request)
    // {
    //     try {
    //         DB::beginTransaction();

    //         // Create product
    //         $product = Product::create([
    //             'category_id' => $request->category_id,
    //             'sub_category_id' => $request->sub_category_id,
    //             'product_name' => $request->product_name,
    //             'product_details' => $request->product_details,
    //             'material_id' => $request->material_id,
    //             'weight_id' => $request->weight_id,
    //             'article_id' => $request->article_id,
    //             'fabric_id' => $request->fabric_id,
    //             'pack_poly' => $request->pack_poly,
    //             'country_id' => $request->country_id,
    //             'manufacturer_name' => $request->manufacturer_name,
    //             'add_stoke' => $request->add_stoke,
    //             'category_1_price' => $request->category_1_price,
    //             'category_2_price' => $request->category_2_price,
    //             'category_3_price' => $request->category_3_price,
    //             'category_4_price' => $request->category_4_price,
    //             'actual_product_price' => $request->actual_product_price,
    //             'sale' => $request->sale,
    //             'sale_percentage' => $request->sale_percentage,
    //             'promotion_id' => $request->promotion_id,
    //             'wear_id' => $request->wear_id,
    //             'remarks' => $request->remarks,
    //         ]);

    //         // Attach sizes, colors, and brands
    //         $product->sizes()->attach($request->size_ids);
    //         $product->colors()->attach($request->color_ids);
    //         $product->brands()->attach($request->brand_ids);

    //         // Handle product images
    //         if ($request->hasFile('product_images')) {
    //             $images = $request->file('product_images');
    //             foreach ($images as $index => $image) {
    //                 $path = $image->store('product_images', 'public');

    //                 ProductImage::create([
    //                     'product_id' => $product->id,
    //                     'image_path' => $path,
    //                     'is_primary' => $index === 0 // First image is primary
    //                 ]);
    //             }
    //         }

    //         DB::commit();

    //         return redirect()->route('products.index')
    //             ->with('message', 'Product created successfully.');
    //     } catch (\Exception $e) {
    //         DB::rollBack();
    //         return back()->with('error', 'An error occurred: ' . $e->getMessage())->withInput();
    //     }
    // }

    public function store(ProductRequest $request)
    {
        try {
            DB::beginTransaction();

            // Step 1: Create Product
            $product = Product::create($request->only([
                'category_id',
                'sub_category_id',
                'product_name',
                'product_details',
                'qty_per_carton',
                'material_id',
                'weight_id',
                'article_id',
                'fabric_id',
                'pack_poly',
                'country_id',
                'manufacturer_name',
                'category_1_price',
                'category_2_price',
                'category_3_price',
                'category_4_price',
                'actual_product_price',
                'sale',
                'sale_percentage',
                'promotion_id',
                'wear_id',
                'remarks'
            ]));

            // Step 2: Attach Related Data
            $product->sizes()->attach($request->size_ids);
            $product->colors()->attach($request->color_ids);
            $product->brands()->attach($request->brand_ids);

            // Step 3: Handle Product Images
            if ($request->hasFile('product_images')) {
                $images = $request->file('product_images');
                $imageIds = $request->input('image_ids', []);
                $colorImages = $request->input('color_specific_images', []);
                $sizeImages = $request->input('size_specific_images', []);

                foreach ($images as $index => $image) {
                    $path = $image->store('product_images', 'public');

                    // Get the unique image ID
                    $imageId = $imageIds[$index] ?? null;

                    // Get assigned color
                    $colorId = isset($colorImages[$imageId]) && $colorImages[$imageId] != "" ? $colorImages[$imageId] : null;

                    // Step 4: Save Product Image
                    $productImage = ProductImage::create([
                        'product_id' => $product->id,
                        'image_path' => $path,
                        'is_primary' => $index === 0,
                        'color_id' => $colorId
                    ]);

                    // Step 5: Attach Sizes and Quantities to Image
                    if (isset($sizeImages[$imageId])) {
                        foreach ($sizeImages[$imageId]['sizes'] ?? [] as $sizeId) {
                            $quantity = $sizeImages[$imageId]['quantities'][$sizeId] ?? 0;

                            // Attach size and quantity to pivot table
                            $productImage->sizes()->attach($sizeId, ['quantity' => $quantity]);
                        }
                    }
                }
            }

            DB::commit();
            return redirect()->route('products.index')->with('message', 'Product created successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'An error occurred: ' . $e->getMessage())->withInput();
        }
    }









    public function edit($id)
    {
        $categories = Category::all();
        $sub_categories = SubCategory::all();
        $materials = Material::all();
        $weights = Weight::all();
        $promotions = Promotional::all();
        $wears = Wear::all();
        $articles = Article::all();
        $sizes = Size::all();
        $colors = Color::all();
        $fabrics = Fabric::all();
        $countries = Country::all();
        $brands = Brand::all();

        $product = Product::with('imageColors')->findOrFail($id);

        return view('admin.product.edit', compact(
            'product',
            'categories',
            'sub_categories',
            'materials',
            'weights',
            'promotions',
            'wears',
            'articles',
            'sizes',
            'colors',
            'fabrics',
            'countries',
            'brands'
        ));
    }


    // public function update(ProductRequest $request, $id)
    // {
    //     try {
    //         DB::beginTransaction();

    //         $product = Product::findOrFail($id);

    //         // Step 1: Update Product Details
    //         $product->update($request->only([
    //             'category_id',
    //             'sub_category_id',
    //             'product_name',
    //             'product_details',
    //             'material_id',
    //             'weight_id',
    //             'article_id',
    //             'fabric_id',
    //             'pack_poly',
    //             'country_id',
    //             'manufacturer_name',
    //             'add_stoke',
    //             'category_1_price',
    //             'category_2_price',
    //             'category_3_price',
    //             'category_4_price',
    //             'actual_product_price',
    //             'sale',
    //             'sale_percentage',
    //             'promotion_id',
    //             'wear_id',
    //             'remarks'
    //         ]));

    //         // Step 2: Sync Relationships (Sizes, Colors, Brands)
    //         $product->sizes()->sync($request->size_ids ?? []);
    //         $product->colors()->sync($request->color_ids ?? []);
    //         $product->brands()->sync($request->brand_ids ?? []);

    //         // Step 3: Handle New Image Uploads
    //         if ($request->hasFile('product_images')) {
    //             $images = $request->file('product_images');
    //             $colorImages = array_values($request->input('color_specific_images', []));

    //             foreach ($images as $index => $image) {
    //                 $path = $image->store('product_images', 'public');
    //                 $colorId = isset($colorImages[$index]) && $colorImages[$index] !== "" ? $colorImages[$index] : null;

    //                 $newImage = ProductImage::create([
    //                     'product_id' => $product->id,
    //                     'image_path' => $path,
    //                     'is_primary' => $index === 0,
    //                     'color_id' => $colorId
    //                 ]);

    //                 // Assign sizes & quantities to newly uploaded images (if any selected)
    //                 if ($request->has('size_ids')) {
    //                     $sizeData = [];
    //                     foreach ($request->size_ids as $sizeId) {
    //                         $sizeData[$sizeId] = ['quantity' => $request->input("size_quantities.$sizeId", 0)];
    //                     }
    //                     $newImage->sizes()->sync($sizeData);
    //                 }
    //             }
    //         }

    //         // Step 4: Handle Existing Image Updates
    //         if ($request->has('updated_images')) {
    //             foreach ($request->updated_images as $imageId => $updatedImage) {
    //                 if ($updatedImage) {
    //                     $existingImage = ProductImage::find($imageId);
    //                     if ($existingImage) {
    //                         // Delete old image
    //                         Storage::disk('public')->delete($existingImage->image_path);

    //                         // Upload new image
    //                         $path = $updatedImage->store('product_images', 'public');
    //                         $existingImage->update(['image_path' => $path]);
    //                     }
    //                 }
    //             }
    //         }

    //         // Step 5: Handle Image Color Updates
    //         if ($request->has('existing_image_colors')) {
    //             foreach ($request->existing_image_colors as $imageId => $colorId) {
    //                 $existingImage = ProductImage::find($imageId);
    //                 if ($existingImage) {
    //                     $existingImage->update(['color_id' => $colorId]);
    //                 }
    //             }
    //         }

    //         // Step 6: Handle Image Size & Quantity Updates (NEW)
    //         if ($request->has('existing_image_sizes')) {
    //             foreach ($request->existing_image_sizes as $imageId => $sizeIds) {
    //                 $sizeQuantities = $request->input("existing_image_quantities.$imageId", []);

    //                 $sizeData = [];
    //                 foreach ($sizeIds as $sizeId) {
    //                     $sizeData[$sizeId] = ['quantity' => $sizeQuantities[$sizeId] ?? 0];
    //                 }

    //                 $existingImage = ProductImage::find($imageId);
    //                 if ($existingImage) {
    //                     $existingImage->sizes()->sync($sizeData);
    //                 }
    //             }
    //         }

    //         DB::commit();
    //         return redirect()->route('products.index')->with('message', 'Product updated successfully.');
    //     } catch (\Exception $e) {
    //         DB::rollBack();
    //         return back()->with('error', 'An error occurred: ' . $e->getMessage())->withInput();
    //     }
    // }



    public function update(ProductRequest $request, $id)
    {
        try {
            DB::beginTransaction();

            $product = Product::findOrFail($id);

            // Step 1: Update Product Details
            $product->update($request->only([
                'category_id',
                'sub_category_id',
                'product_name',
                'product_details',
                'qty_per_carton',
                'material_id',
                'weight_id',
                'article_id',
                'fabric_id',
                'pack_poly',
                'country_id',
                'manufacturer_name',
                'category_1_price',
                'category_2_price',
                'category_3_price',
                'category_4_price',
                'actual_product_price',
                'sale',
                'sale_percentage',
                'promotion_id',
                'wear_id',
                'remarks'
            ]));

            // Step 2: Sync Relationships (Sizes, Colors, Brands)
            $product->sizes()->sync($request->size_ids ?? []);
            $product->colors()->sync($request->color_ids ?? []);
            $product->brands()->sync($request->brand_ids ?? []);

            // Step 3: Handle New Image Uploads
            if ($request->hasFile('product_images')) {
                $images = $request->file('product_images');

                // Get all the image IDs that were generated in the frontend
                $imageIds = $request->input('image_ids', []);

                foreach ($imageIds as $index => $imageId) {
                    if (isset($images[$index])) {
                        $image = $images[$index];
                        $path = $image->store('product_images', 'public');

                        // Get color ID for this specific image
                        $colorId = $request->input("color_specific_images.$imageId", null);

                        $newImage = ProductImage::create([
                            'product_id' => $product->id,
                            'image_path' => $path,
                            'is_primary' => $index === 0,
                            'color_id' => $colorId
                        ]);

                        // Process sizes and quantities for this specific image
                        if ($request->has("size_specific_images.$imageId.sizes")) {
                            $selectedSizes = $request->input("size_specific_images.$imageId.sizes", []);
                            $sizeQuantities = $request->input("size_specific_images.$imageId.quantities", []);

                            $sizeData = [];
                            foreach ($selectedSizes as $sizeId) {
                                $quantity = $sizeQuantities[$sizeId] ?? 0;
                                $sizeData[$sizeId] = ['quantity' => $quantity];
                            }

                            $newImage->sizes()->sync($sizeData);
                        }
                    }
                }
            }

            // Step 4: Handle Existing Image Updates
            if ($request->has('updated_images')) {
                foreach ($request->updated_images as $imageId => $updatedImage) {
                    if ($updatedImage) {
                        $existingImage = ProductImage::find($imageId);
                        if ($existingImage) {
                            // Delete old image
                            Storage::disk('public')->delete($existingImage->image_path);

                            // Upload new image
                            $path = $updatedImage->store('product_images', 'public');
                            $existingImage->update(['image_path' => $path]);
                        }
                    }
                }
            }

            // Step 5: Handle Image Color Updates
            if ($request->has('existing_image_colors')) {
                foreach ($request->existing_image_colors as $imageId => $colorId) {
                    $existingImage = ProductImage::find($imageId);
                    if ($existingImage) {
                        $existingImage->update(['color_id' => $colorId]);
                    }
                }
            }

            // Step 6: Handle Image Size & Quantity Updates
            if ($request->has('existing_image_sizes')) {
                foreach ($request->existing_image_sizes as $imageId => $sizeIds) {
                    $sizeQuantities = $request->input("existing_image_quantities.$imageId", []);

                    $sizeData = [];
                    foreach ($sizeIds as $sizeId) {
                        $sizeData[$sizeId] = ['quantity' => $sizeQuantities[$sizeId] ?? 0];
                    }

                    $existingImage = ProductImage::find($imageId);
                    if ($existingImage) {
                        $existingImage->sizes()->sync($sizeData);
                    }
                }
            }

            DB::commit();
            return redirect()->route('products.index')->with('message', 'Product updated successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'An error occurred: ' . $e->getMessage())->withInput();
        }
    }




    public function show($id)
    {
        $product = Product::with(['category', 'subCategory', 'material', 'weight', 'brands', 'colors'])
            ->findOrFail($id);

        return view('admin.product.show', compact('product'));
    }





    public function destroy($id)
    {
        $product = Product::findOrFail($id);

        // Delete images
        if ($product->product_images) {
            $images = json_decode($product->product_images, true);
            foreach ($images as $image) {
                Storage::disk('public')->delete($image);
            }
        }

        $product->delete();
        return redirect()->route('products.index')->with('message', 'Product deleted successfully.');
    }
}
