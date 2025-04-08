<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\BannerRequest;
use App\Models\Banner;
use Illuminate\Support\Facades\Storage;

class BannerController extends Controller
{
    public function index()
    {
        $banners = Banner::all();
        return view('admin.banner.index', compact('banners'));
    }

    public function create()
    {
        return view('admin.banner.create');
    }

    public function store(BannerRequest $request)
    {
        // Create a new banner instance
        $banner = new Banner();
        $banner->title = $request->input('title');
        $banner->description = $request->input('description');
        // Handle image upload
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('banner_images', 'public'); // Store the image in the storage folder
            $banner->image = $imagePath; // Save the file path to the image attribute
        }

        // Save the Banner instance to the database
        $banner->save();

        // Redirect back to the banners index page
        return redirect()->route('banners.index')->with('message', 'Banner created successfully.');
    }

    public function edit($id)
    {
        $banner = Banner::findOrFail($id);
        return view('admin.banner.edit', compact('banner'));
    }

    public function update(BannerRequest $request, $id)
    {
        $banner = Banner::findOrFail($id);

        // Handle the description update
        $banner->title = $request->input('title');
        $banner->description = $request->input('description');

        if ($request->hasFile('image')) {
            // Delete the old image if it exists
            if ($banner->image) {
                Storage::disk('public')->delete($banner->image);
            }

            // Handle image upload
            $imagePath = $request->file('image')->store('banner_images', 'public');
            $banner->image = $imagePath;
        }

        // Save the updated Banner instance to the database
        $banner->save();

        return redirect()->route('banners.index')->with('message', 'Banner updated successfully.');
    }
    public function destroy($id)
    {
        $banner = Banner::findOrFail($id);

        // Delete the image if it exists
        if ($banner->image) {
            Storage::disk('public')->delete($banner->image);
        }

        $banner->delete();
        return redirect()->route('banners.index')->with('message', 'Banner deleted successfully.');
    }

    public function toggleStatus(Banner $banner)
{
    // Toggle the status (0 = inactive, 1 = active)
    $banner->status = $banner->status == 0 ? 1 : 0;
    $banner->save();

    return redirect()->route('banners.index')->with('message', 'Banner status updated successfully!');
}

}
