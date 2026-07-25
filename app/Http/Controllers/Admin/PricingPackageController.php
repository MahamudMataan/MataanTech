<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PricingPackage;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\View\View;

class PricingPackageController extends Controller
{
    public function index(): View
    {
        return view('admin.packages.index', ['items' => PricingPackage::query()->orderBy('is_care_plan')->orderBy('sort_order')->get()]);
    }

    public function create(): View
    {
        return view('admin.packages.form', ['item' => new PricingPackage()]);
    }

    public function store(Request $request): RedirectResponse
    {
        PricingPackage::create($this->validated($request));

        return redirect()->route('admin.packages.index')->with('success', 'Package created.');
    }

    public function edit(PricingPackage $package): View
    {
        return view('admin.packages.form', ['item' => $package]);
    }

    public function update(Request $request, PricingPackage $package): RedirectResponse
    {
        $package->update($this->validated($request, $package->id));

        return redirect()->route('admin.packages.index')->with('success', 'Package updated.');
    }

    public function destroy(PricingPackage $package): RedirectResponse
    {
        $package->delete();

        return redirect()->route('admin.packages.index')->with('success', 'Package deleted.');
    }

    private function validated(Request $request, ?int $id = null): array
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:120'],
            'slug' => ['nullable', 'string', 'max:160', 'unique:pricing_packages,slug,'.$id],
            'price' => ['required', 'string', 'max:80'],
            'billing_period' => ['nullable', 'string', 'max:80'],
            'description' => ['required', 'string', 'max:1000'],
            'features' => ['required', 'string', 'max:2500'],
            'sort_order' => ['required', 'integer', 'min:0'],
            'is_featured' => ['nullable', 'boolean'],
            'is_care_plan' => ['nullable', 'boolean'],
        ]);

        $validated['slug'] = $validated['slug'] ?: Str::slug($validated['name']);
        $validated['features'] = collect(preg_split('/\r\n|\r|\n/', $validated['features']))->map(fn ($item) => trim($item))->filter()->values()->all();
        $validated['is_featured'] = $request->boolean('is_featured');
        $validated['is_care_plan'] = $request->boolean('is_care_plan');

        return $validated;
    }
}
