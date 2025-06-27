<?php

namespace App\Services;

use Maksekeskus\Maksekeskus;

class MakeCommerceService
{
    private Maksekeskus $client;

    public function __construct()
    {
        $this->client = new Maksekeskus(
            config('services.makecommerce.shop_id'),
            config('services.makecommerce.public_key'),
            config('services.makecommerce.secret_key'),
            config('services.makecommerce.test_mode')
        );
    }

    public function createPayment(string $plan): array
    {
        $prices = [
            '30d' => 9990,
            '6m'  => 59940,
            '1y'  => 109900,
        ];
        $amount = $prices[$plan] ?? $prices['30d'];

        $payload = [
            'transaction' => [
                'shop_id'            => config('services.makecommerce.shop_id'),
                'amount'             => $amount,
                'currency'           => 'EUR',
                'reference'          => 'sub_' . uniqid(),
                'merchant_reference' => "sub-$plan_" . uniqid(),
                'return_url'         => route('subscription.callback', $plan),
                'cancel_url'         => route('subscription.choose'),
                'notification_url'   => route('subscription.notification', $plan),
                'description'        => "Subscription ($plan)",
            ],
            'customer' => [
                'email' => auth()->user()->email,
            ],
        ];

        return $this->client->createPayment($payload, []);
    }

    public function getPayment(string $trxId): array
    {
        return $this->client->getPayment($trxId);
    }
}
