<?php

namespace App\Http\Controllers;

use App\Models\Offer;

class RealtorListingAcceptOfferController extends Controller
{
    // Single action controller
    public function __invoke(Offer $offer)
    {
        $listing = $offer->listing;
        $this->authorize('update', $listing);

        $offer->update([
            'accepted_at' => now(),
        ]);
        $listing->offers()->except($offer)->update([
            'rejected_at' => now(),
        ]);
        $listing->update([
            'sold_at' => now(),
        ]);

        return redirect()->back()
            ->with(
                'success',
                "Offer #{$offer->id} accepted, other offers rejected!"
            );
    }
}
