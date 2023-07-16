<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;

class ListingController extends Controller
{
    /**
     * Authorize listing resource.
     */
    public function __construct()
    {
        $this->authorizeResource(Listing::class, 'listing');
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $filters = $request->only([
            'priceFrom', 'priceTo', 'beds', 'baths', 'areaFrom', 'areaTo'
        ]);

        return inertia('Listing/Index', [
            'filters' => $filters,
            'listings' => Listing::mostRecent()
                ->filter($filters)
                ->paginate(9)
                ->withQueryString()
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Listing $listing)
    {
        return inertia('Listing/Show', [
            'listing' => $listing
        ]);
    }
}
