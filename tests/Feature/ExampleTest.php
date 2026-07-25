<?php

namespace Tests\Feature;

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
