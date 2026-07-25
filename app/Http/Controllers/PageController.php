<?php

namespace App\Http\Controllers;

use App\Models\PortfolioProject;
use App\Models\PricingPackage;
use App\Models\Service;
use App\Models\Testimonial;
use Illuminate\Contracts\View\View;

class PageController extends Controller
{
    public function home(): View
    {
        return view('pages.home', [
            'services' => Service::query()->where('is_featured', true)->orderBy('sort_order')->take(6)->get(),
            'projects' => PortfolioProject::query()->where('is_featured', true)->latest()->take(3)->get(),
            'testimonials' => Testimonial::query()->where('is_featured', true)->latest()->take(3)->get(),
        ]);
    }

    public function about(): View
    {
        return view('pages.about');
    }

    public function services(): View
    {
        return view('pages.services', [
            'services' => Service::query()->orderBy('sort_order')->get(),
        ]);
    }

    public function pricing(): View
    {
        return view('pages.pricing', [
            'packages' => PricingPackage::query()->where('is_care_plan', false)->orderBy('sort_order')->get(),
            'carePlans' => PricingPackage::query()->where('is_care_plan', true)->orderBy('sort_order')->get(),
        ]);
    }

    public function portfolio(): View
    {
        return view('pages.portfolio', [
            'projects' => PortfolioProject::query()->latest()->paginate(9),
        ]);
    }

    public function contact(): View
    {
        return view('pages.contact');
    }
}
