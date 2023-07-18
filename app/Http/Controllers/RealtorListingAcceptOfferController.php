<?php

namespace App\Http\Controllers;

use App\Models\Offer;
use App\Notifications\OfferAccepted;
use App\Notifications\OfferRejected;
use Illuminate\Support\Facades\Notification;

class RealtorListingAcceptOfferController extends Controller
{
    // Single action controller
    public function __invoke(Offer $offer)
    {
        $listing = $offer->listing;
        $offer_id = $offer->id;
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
        $offer->bidder->notify(new OfferAccepted($offer));
        foreach ($offer->listing->offers()->except($offer)->get() as $offer) {
            $offer->bidder->notify(new OfferRejected($offer));
        }

        return redirect()->back()->with('success', "Offer #{$offer_id} accepted, other offers rejected!");
    }
}
