<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('services', function (Blueprint $table): void {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('icon')->default('sparkles');
            $table->text('description');
            $table->unsignedInteger('sort_order')->default(0);
            $table->boolean('is_featured')->default(true);
            $table->timestamps();
        });

        Schema::create('pricing_packages', function (Blueprint $table): void {
            $table->id();
            $table->foreignId('service_id')->nullable()->constrained()->nullOnDelete();
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('price');
            $table->string('billing_period')->nullable();
            $table->text('description');
            $table->json('features');
            $table->unsignedInteger('sort_order')->default(0);
            $table->boolean('is_featured')->default(false);
            $table->boolean('is_care_plan')->default(false);
            $table->timestamps();
        });

        Schema::create('portfolio_projects', function (Blueprint $table): void {
            $table->id();
            $table->string('client_name');
            $table->string('slug')->unique();
            $table->string('industry');
            $table->json('technologies');
            $table->text('overview');
            $table->string('image_url');
            $table->string('project_url')->nullable();
            $table->boolean('is_featured')->default(false);
            $table->timestamps();
        });

        Schema::create('testimonials', function (Blueprint $table): void {
            $table->id();
            $table->string('client_name');
            $table->string('company');
            $table->string('role')->nullable();
            $table->text('quote');
            $table->unsignedTinyInteger('rating')->default(5);
            $table->boolean('is_featured')->default(true);
            $table->timestamps();
        });

        Schema::create('contact_submissions', function (Blueprint $table): void {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->string('company')->nullable();
            $table->string('phone')->nullable();
            $table->text('message');
            $table->string('status')->default('new');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('contact_submissions');
        Schema::dropIfExists('testimonials');
        Schema::dropIfExists('portfolio_projects');
        Schema::dropIfExists('pricing_packages');
        Schema::dropIfExists('services');
    }
};
