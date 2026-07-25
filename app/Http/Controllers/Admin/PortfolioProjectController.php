<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PortfolioProject;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\View\View;

class PortfolioProjectController extends Controller
{
    public function index(): View
    {
        return view('admin.projects.index', ['items' => PortfolioProject::query()->latest()->get()]);
    }

    public function create(): View
    {
        return view('admin.projects.form', ['item' => new PortfolioProject()]);
    }

    public function store(Request $request): RedirectResponse
    {
        PortfolioProject::create($this->validated($request));

        return redirect()->route('admin.projects.index')->with('success', 'Project created.');
    }

    public function edit(PortfolioProject $project): View
    {
        return view('admin.projects.form', ['item' => $project]);
    }

    public function update(Request $request, PortfolioProject $project): RedirectResponse
    {
        $project->update($this->validated($request, $project->id));

        return redirect()->route('admin.projects.index')->with('success', 'Project updated.');
    }

    public function destroy(PortfolioProject $project): RedirectResponse
    {
        $project->delete();

        return redirect()->route('admin.projects.index')->with('success', 'Project deleted.');
    }

    private function validated(Request $request, ?int $id = null): array
    {
        $validated = $request->validate([
            'client_name' => ['required', 'string', 'max:180'],
            'slug' => ['nullable', 'string', 'max:180', 'unique:portfolio_projects,slug,'.$id],
            'industry' => ['required', 'string', 'max:120'],
            'technologies' => ['required', 'string', 'max:500'],
            'overview' => ['required', 'string', 'max:1600'],
            'image_url' => ['required', 'url', 'max:500'],
            'project_url' => ['nullable', 'url', 'max:500'],
            'is_featured' => ['nullable', 'boolean'],
        ]);

        $validated['slug'] = $validated['slug'] ?: Str::slug($validated['client_name']);
        $validated['technologies'] = collect(explode(',', $validated['technologies']))->map(fn ($item) => trim($item))->filter()->values()->all();
        $validated['is_featured'] = $request->boolean('is_featured');

        return $validated;
    }
}
