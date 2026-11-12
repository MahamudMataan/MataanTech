<?php

namespace Database\Seeders;

use App\Models\PricingPackage;
use Illuminate\Database\Seeder;

class GrowthPricingSeeder extends Seeder
{
    public function run(): void
    {
        $package = PricingPackage::firstOrNew(['slug' => 'growth'], [
            'sort_order' => 2,
            'is_care_plan' => false,
        ]);

        $package->fill([
            'name' => 'Growth',
            'price' => 'From €1,149.99 one-time',
            'billing_period' => '€49.99/month when hosted by Mataan Tech',
            'description' => 'A website with up to 5 pages. Prices exclude 21% VAT. Monthly service is paid in advance.',
            'features' => [
                'Contact form and a clear call to action',
                'Basic SEO setup',
                'Google Search Console setup',
                'WhatsApp button',
                '2 design revision rounds',
                '15 minutes of minor edits per month with monthly service',
                'Google Maps available as an add-on',
            ],
            'is_featured' => true,
        ])->save();
    }
}
