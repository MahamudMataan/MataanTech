<?php

namespace Database\Seeders;

use App\Models\PortfolioProject;
use App\Models\PricingPackage;
use App\Models\Service;
use App\Models\Testimonial;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@example.com'],
            [
                'name' => 'MataanTech Admin',
                'password' => 'password',
            ],
        );

        $services = [
            ['Custom Website Development', 'custom-website-development', 'code', 'Bespoke Laravel and WordPress-ready websites designed around your offer, customers, and growth goals.'],
            ['Website Redesigns', 'website-redesigns', 'layout', 'Modern redesigns that improve trust, clarity, speed, and conversion without losing what already works.'],
            ['AI Integrations', 'ai-integrations', 'sparkles', 'AI chatbots, internal assistants, lead qualification, and automations that save your team time.'],
            ['Website Optimisation', 'website-optimisation', 'zap', 'Performance improvements, technical clean-up, and UX refinements that make your site feel faster and sharper.'],
            ['SEO Improvements', 'seo-improvements', 'search', 'Technical SEO, metadata, content structure, and local visibility improvements built into the site.'],
            ['Website Maintenance', 'website-maintenance', 'shield', 'Reliable updates, monitoring, backups, and ongoing support after launch.'],
        ];

        foreach ($services as $index => [$title, $slug, $icon, $description]) {
            Service::updateOrCreate(
                ['slug' => $slug],
                compact('title', 'slug', 'icon', 'description') + ['sort_order' => $index + 1],
            );
        }

        $packages = [
            ['Starter', 'starter', 'Starting from EUR 750', null, 'Perfect for new and small businesses looking to establish a professional online presence.', ['Up to 5 custom pages', 'Responsive design', 'Contact form', 'Google Maps integration', 'Basic SEO setup', 'Fast loading website', '30 days of support'], 1, false, false],
            ['Growth', 'growth', 'Starting from EUR 1,750', null, 'Designed for growing businesses that want a website focused on generating leads.', ['Everything in Starter', 'Up to 10 pages', 'Custom design', 'Booking or quotation system', 'Advanced forms', 'Google Analytics', 'Speed optimisation', 'Enhanced SEO', '60 days of support'], 2, true, false],
            ['Scale', 'scale', 'Starting from EUR 3,500', null, 'A complete custom solution for established businesses that need advanced functionality.', ['Everything in Growth', 'Fully custom development', 'AI chatbot integration', 'CRM integration', 'Business automations', 'Custom dashboards', 'Advanced functionality', 'Priority support', '90 days of support'], 3, false, false],
            ['Essential Care', 'essential-care', 'EUR 49', '/month', 'Keep your finished website secure, backed up, and monitored.', ['Security updates', 'Website backups', 'Plugin updates', 'Uptime monitoring', 'Small technical fixes'], 4, false, true],
            ['Growth Care', 'growth-care', 'EUR 149', '/month', 'A proactive support plan for teams that want steady improvements.', ['Everything in Essential', 'Monthly website updates', 'Performance optimisation', 'SEO improvements', 'Analytics report', 'Priority support'], 5, true, true],
            ['Digital Partner', 'digital-partner', 'Custom Pricing', null, 'Ongoing product, website, AI, and growth support for ambitious businesses.', ['Everything in Growth Care', 'Ongoing website improvements', 'Landing pages', 'AI maintenance', 'Automation updates', 'Monthly strategy sessions', 'Dedicated support'], 6, false, true],
        ];

        foreach ($packages as [$name, $slug, $price, $billingPeriod, $description, $features, $sortOrder, $featured, $carePlan]) {
            PricingPackage::updateOrCreate(
                ['slug' => $slug],
                [
                    'name' => $name,
                    'price' => $price,
                    'billing_period' => $billingPeriod,
                    'description' => $description,
                    'features' => $features,
                    'sort_order' => $sortOrder,
                    'is_featured' => $featured,
                    'is_care_plan' => $carePlan,
                ],
            );
        }

        PortfolioProject::query()->delete();

        $projects = [
            [
                'client_name' => 'Taxi Husso',
                'slug' => 'taxi-husso',
                'industry' => 'Taxi and Local Transport',
                'technologies' => ['Responsive website', 'Lead capture', 'Local SEO', 'Performance optimisation'],
                'overview' => 'A live business website for a taxi service, built to make the company easier to find, understand, and contact from mobile devices.',
                'image_url' => 'https://images.unsplash.com/photo-1500530855697-b586d89ba3ee?auto=format&fit=crop&w=1200&q=80',
                'project_url' => 'https://taxi.husso.nl',
                'is_featured' => true,
            ],
        ];

        foreach ($projects as $project) {
            PortfolioProject::updateOrCreate(['slug' => $project['slug']], $project);
        }

        $testimonials = [
            ['client_name' => 'Emma Clarke', 'company' => 'Northline Studio', 'role' => 'Founder', 'quote' => 'The new site finally reflects the level of work we deliver. Enquiries are clearer, better qualified, and easier to manage.', 'rating' => 5, 'is_featured' => true],
            ['client_name' => 'Daniel Weber', 'company' => 'Atlas Trade Co.', 'role' => 'Director', 'quote' => 'They turned a vague growth problem into a website and automation system that saves our team hours every week.', 'rating' => 5, 'is_featured' => true],
            ['client_name' => 'Sofia Martin', 'company' => 'Luma Clinics', 'role' => 'Operations Lead', 'quote' => 'Our mobile experience is faster, cleaner, and much easier for patients to use. The process was calm and professional.', 'rating' => 5, 'is_featured' => true],
        ];

        foreach ($testimonials as $testimonial) {
            Testimonial::updateOrCreate(
                ['client_name' => $testimonial['client_name'], 'company' => $testimonial['company']],
                $testimonial,
            );
        }
    }
}
