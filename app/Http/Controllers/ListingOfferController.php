<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use App\Models\Offer;
use Illuminate\Http\Request;

class ListingOfferController extends Controller
{
    public function store(Listing $listing, Request $request)
    {
        $this->authorize('view', $listing);
        $listing->offers()->save(
            Offer::make(
                $request->validate([
                    'amount' => 'required|integer|min:1'
                ])
            )->bidder()->associate($request->user())
        );

        return redirect()->back()->with([
            'success' => 'Your offer has been submitted!',
        ]);
    }
}
