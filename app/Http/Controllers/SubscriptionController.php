<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Services\MakeCommerceService;

class SubscriptionController extends Controller
{
    public function activate($plan)
    {
        $user = auth()->user();

        $expiresAt = match ($plan) {
            '30d' => now()->addDays(30),
            '6m'  => now()->addMonths(6),
            '1y'  => now()->addYear(),
            default => now()->addDays(30), // fallback
        };

        $user->is_subscribed = true;
        $user->subscription_plan = $plan;
        $user->subscribed_at = now();
        $user->subscription_expires_at = $expiresAt;

        $user->save();

        return redirect()->route('client.subscription')->with('success', 'Abonements aktivizēts veiksmīgi!');
    }

    public function confirm(string $plan)
    {
        $validPlans = ['30d', '6m', '1y'];

        if (!in_array($plan, $validPlans)) {
            abort(404);
        }

        return view('subscription.confirm', compact('plan'));
    }

    public function choose()
    {
        return view('subscription.choose');
    }

    public function clientCard()
    {
        $user = auth()->user();

        $planLabels = [
            '30d' => '30 dienu abonements',
            '6m' => '6 mēnešu abonements',
            '1y' => '12 mēnešu abonements',
        ];

        $userPlanLabel = $user->subscription_plan ? ($planLabels[$user->subscription_plan] ?? $user->subscription_plan) : null;

        return view('subscription.client', compact('user', 'userPlanLabel'));
    }

    public function delete(Request $request)
    {
        $user = $request->user();

        $user->update([
            'is_subscribed' => false,
            'subscription_plan' => null,
            'subscribed_at' => null,
            'subscription_expires_at' => null,
        ]);


        return back()->with('success', 'Abonements ir dzēsts.');
    }
}
