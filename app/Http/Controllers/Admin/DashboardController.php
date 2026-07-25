<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactSubmission;
use App\Models\PortfolioProject;
use App\Models\PricingPackage;
use App\Models\Service;
use App\Models\Testimonial;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function __invoke(): View
    {
        return view('admin.dashboard', [
            'counts' => [
                'leads' => ContactSubmission::count(),
                'projects' => PortfolioProject::count(),
                'services' => Service::count(),
                'packages' => PricingPackage::count(),
                'testimonials' => Testimonial::count(),
            ],
            'submissions' => ContactSubmission::query()->latest()->take(8)->get(),
        ]);
    }
}
