<?php

namespace Tests\Feature;

use App\Models\PricingPackage;
use Database\Seeders\GrowthPricingSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic test example.
     */
    public function test_the_application_returns_a_successful_response(): void
    {
        $this->seed();

        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_public_marketing_pages_render_successfully(): void
    {
        $this->seed();

        foreach (['/', '/about', '/services', '/pricing', '/portfolio', '/contact'] as $path) {
            $this->get($path)->assertOk();
        }
    }

    public function test_growth_pricing_updates_the_existing_package_and_renders_both_fees(): void
    {
        $this->seed();

        $growth = PricingPackage::where('slug', 'growth')->firstOrFail();
        $growth->update(['price' => 'Starting from EUR 1,750', 'billing_period' => null, 'sort_order' => 10]);

        $this->seed(GrowthPricingSeeder::class);
        $this->seed(GrowthPricingSeeder::class);

        $this->assertDatabaseCount('pricing_packages', 6);
        $this->assertDatabaseHas('pricing_packages', [
            'id' => $growth->id,
            'sort_order' => 10,
            'price' => 'From €1,149.99 one-time',
            'billing_period' => '€49.99/month when hosted by Mataan Tech',
        ]);
        $this->get('/pricing')->assertOk()->assertSeeTextInOrder([
            'Starting from EUR 750',
            'Starting from EUR 3,500',
            'From €1,149.99 one-time',
            '€49.99/month when hosted by Mataan Tech',
            'up to 5 pages',
            'exclude 21% VAT',
            'Google Search Console setup',
        ])->assertDontSeeText('Starting from EUR 1,750');
    }

    public function test_contact_form_stores_a_quote_request(): void
    {
        $response = $this->post('/contact', [
            'name' => 'Example Client',
            'email' => 'client@example.com',
            'company' => 'Example Ltd',
            'phone' => '+353 123 456',
            'message' => 'We need a new website with AI lead qualification and better SEO performance.',
        ]);

        $response->assertSessionHas('success');
        $this->assertDatabaseHas('contact_submissions', [
            'email' => 'client@example.com',
            'status' => 'new',
        ]);
    }
}
