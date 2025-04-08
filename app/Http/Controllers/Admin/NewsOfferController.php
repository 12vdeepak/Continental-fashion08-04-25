<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\NewsOfferRequest;
use App\Models\NewsOffer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class NewsOfferController extends Controller
{
    public function index()
    {
        $newsOffers = NewsOffer::all();
        return view('admin.news-offers.index', compact('newsOffers'));
    }

    public function create()
    {
        return view('admin.news-offers.create');
    }

    public function store(NewsOfferRequest $request)
    {
        // Create a new NewsOffer instance
        $newsOffer = new NewsOffer();
        $newsOffer->title = $request->input('title');
        $newsOffer->description = $request->input('description');
        $newsOffer->status = 1; // Default status to active

        // Handle image upload
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('news_offers_images', 'public'); // Store the image
            $newsOffer->image = $imagePath; // Save the file path
        }

        // Save the instance to the database
        $newsOffer->save();

        return redirect()->route('news-offers.index')->with('message', 'News/Offer created successfully.');
    }

    public function edit($id)
    {
        $newsOffer = NewsOffer::findOrFail($id);
        return view('admin.news-offers.edit', compact('newsOffer'));
    }

    public function update(NewsOfferRequest $request, $id)
    {
        $newsOffer = NewsOffer::findOrFail($id);

        // Update title & description
        $newsOffer->title = $request->input('title');
        $newsOffer->description = $request->input('description');

        if ($request->hasFile('image')) {
            // Delete old image if it exists
            if ($newsOffer->image) {
                Storage::disk('public')->delete($newsOffer->image);
            }

            // Upload new image
            $imagePath = $request->file('image')->store('news_offers_images', 'public');
            $newsOffer->image = $imagePath;
        }

        // Save updated instance
        $newsOffer->save();

        return redirect()->route('news-offers.index')->with('message', 'News/Offer updated successfully.');
    }

    public function destroy($id)
    {
        $newsOffer = NewsOffer::findOrFail($id);

        // Delete image if exists
        if ($newsOffer->image) {
            Storage::disk('public')->delete($newsOffer->image);
        }

        $newsOffer->delete();
        return redirect()->route('news-offers.index')->with('message', 'News/Offer deleted successfully.');
    }

    public function toggleStatus(NewsOffer $newsOffer)
    {
        // Toggle status (0 = inactive, 1 = active)
        $newsOffer->status = $newsOffer->status == 0 ? 1 : 0;
        $newsOffer->save();

        return redirect()->route('news-offers.index')->with('message', 'News/Offer status updated successfully!');
    }
}
