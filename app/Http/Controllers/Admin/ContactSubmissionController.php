<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactSubmission;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ContactSubmissionController extends Controller
{
    public function index(): View
    {
        return view('admin.submissions.index', ['items' => ContactSubmission::query()->latest()->paginate(20)]);
    }

    public function show(ContactSubmission $submission): View
    {
        return view('admin.submissions.show', ['item' => $submission]);
    }

    public function update(Request $request, ContactSubmission $submission): RedirectResponse
    {
        $validated = $request->validate([
            'status' => ['required', 'in:new,contacted,won,closed'],
        ]);

        $submission->update($validated);

        return back()->with('success', 'Lead updated.');
    }

    public function destroy(ContactSubmission $submission): RedirectResponse
    {
        $submission->delete();

        return redirect()->route('admin.submissions.index')->with('success', 'Lead deleted.');
    }
}
