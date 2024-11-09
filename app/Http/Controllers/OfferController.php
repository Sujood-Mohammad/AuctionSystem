<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Offer;
use App\Models\Product;
use Illuminate\Http\Request;

class OfferController extends Controller
{
    public function store(Request $request, Product $product)
    {
        $request->validate([
            'offer_price' => 'required|numeric|min:1',
        ]);

        $offer = Offer::create([
            'user_id' => Auth::id(),
            'product_id' => $product->id,
            'offer_price' => $request->offer_price,
        ]);

        return response()->json(['message' => 'Offer submitted successfully.', 'offer' => $offer], 201);
    }

    public function showOffers(Product $product)
{
    $offers = $product->offers()->with('buyer:id,name')->get(['user_id', 'offer_price']);
    $offersData = $offers->map(function ($offer) use ($product) {
        return [
            'user_name' => $offer->buyer ? $offer->buyer->name : 'Unknown Buyer',
            'offer_price' => $offer->offer_price,
            'product_name' => $product->name,
        ];
    });

    return response()->json($offersData);
}


    public function show(Offer $offer)
    {
        //
    }

    public function edit(Offer $offer)
    {
        //
    }

    public function update(Request $request, Offer $offer)
    {
        //
    }

    public function destroy(Offer $offer)
    {
        //
    }
}
