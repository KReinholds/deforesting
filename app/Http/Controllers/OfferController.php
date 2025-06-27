<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Offer;
use App\Models\Order;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Gate;

class OfferController extends Controller
{

    use AuthorizesRequests;

    public function store(Request $request, Order $order)
    {
        $validated = $request->validate([
            'price' => 'nullable|numeric',
            'currency' => 'required|string|max:5',
            'extra_costs' => 'nullable|numeric',
            'extra_costs_info' => 'nullable|string',
            'start_date' => 'nullable|date_format:d.m.Y',
            'deadline' => 'nullable|date_format:d.m.Y|after_or_equal:start_date',
            'comments' => 'nullable|string',
            'agreed_to_terms' => 'accepted',
            'attachment' => 'nullable|file|max:5120',
        ]);

        $filePath = null;
        if ($request->hasFile('attachment')) {
            $filePath = $request->file('attachment')->store('offers', 'public');
        }

        // Convert string dates (dd.mm.yyyy) to Carbon instances
        $startDate = $validated['start_date']
            ? Carbon::createFromFormat('d.m.Y', $validated['start_date'])
            : null;

        $deadline = $validated['deadline']
            ? Carbon::createFromFormat('d.m.Y', $validated['deadline'])
            : null;

        Offer::create([
            'user_id' => auth()->id(),
            'order_id' => $order->id,
            'price' => $validated['price'],
            'currency' => $validated['currency'],
            'extra_costs' => $validated['extra_costs'],
            'extra_costs_info' => $validated['extra_costs_info'],
            'start_date' => $startDate,
            'deadline' => $deadline,
            'comments' => $validated['comments'],
            'agreed_to_terms' => true,
            'attachment' => $filePath,
        ]);

        return back()->with('success', 'Piedāvājums iesniegts veiksmīgi.');
    }

    // public function clientIndex(Request $request)
    // {
    //     $status = $request->get('status');

    //     $query = Offer::with(['order', 'order.category'])
    //         ->where('user_id', auth()->id());

    //     if ($status && in_array($status, ['pending', 'approved', 'completed', 'rejected'])) {
    //         $query->where('status', $status);
    //     }

    //     $offers = $query->latest()->paginate(2);

    //     return view('offers.client-index', compact('offers', 'status'));
    // }

    public function clientOffers(Request $request)
    {
        $user = auth()->user();

        $status = $request->input('status', 'pending'); // default to 'pending'

        $offers = Offer::with(['order.category'])
            ->where('user_id', $user->id)
            ->where('status', $status)
            ->latest()
            ->paginate(10);

        return view('offers.client-index', compact('offers', 'status'));
    }

    public function edit(Offer $offer)
    {
        $this->authorize('update', $offer); // Optional: if you use policies

        return view('offers.edit', compact('offer'));
    }

    public function update(Request $request, Offer $offer)
    {
        $this->authorize('update', $offer);

        $validated = $request->validate([
            'price' => 'nullable|numeric',
            'currency' => 'required|in:EUR,USD',
            'extra_costs' => 'nullable|numeric',
            'extra_costs_info' => 'nullable|string',
            'start_date' => 'nullable|date',
            'deadline' => 'nullable|date|after_or_equal:start_date',
            'comments' => 'nullable|string',
            'agreed_to_terms' => 'accepted',
            'status' => 'nullable|in:pending,approved,rejected,completed', // add status validation
        ]);

        $offer->update($validated);

        // ✅ Automatically mark the order as completed if this offer is completed
        if ($offer->status === 'completed') {
            $offer->order->update([
                'status' => 'completed',
            ]);
        }

        return redirect()->route('offers.client')->with('success', 'Piedāvājums atjaunināts.');
    }


    public function destroy(Offer $offer)
    {
        Gate::authorize('delete', $offer);

        $offer->delete();

        return back()->with('success', 'Piedāvājums dzēsts.');
    }

    public function changeStatus(Request $request, Offer $offer)
    {
        $this->authorize('changeStatus', $offer);

        $validated = $request->validate([
            'status' => 'required|in:pending,approved,rejected,completed',
        ]);

        $offer->status = $validated['status'];
        $offer->save();

        if ($request->input('status') === 'completed') {
            $offer->order->update(['status' => 'completed']);
        }

        return back()->with('success', 'Piedāvājuma statuss atjaunināts.');
    }
}
