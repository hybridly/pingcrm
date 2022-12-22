<?php

namespace App\Http\Controllers;

use App\Data\ContactData;
use App\Data\SearchData;
use App\Models\Contact;
use Hybridly\Contracts\HybridResponse;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContactsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(SearchData $data): HybridResponse
    {
        $user = Auth::user();
        if (is_null($user)) {
            throw new AuthenticationException();
        }
        return hybridly("contacts.index", [
            "filters" => $data,
            "contacts" => ContactData::collection(
                $user->account
                    ->contacts()
                    ->with("organization")
                    ->orderByName()
                    ->filter($data)
                    ->paginate(10)
                    ->withQueryString(),
            ),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): HybridResponse
    {
        return hybridly();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        return back();
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Contact $contact): HybridResponse
    {
        return hybridly();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Contact $contact): RedirectResponse
    {
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Contact $contact): RedirectResponse
    {
        return back();
    }

    /**
     * Restore the specified resource.
     */
    public function restore(Contact $organization): RedirectResponse
    {
        return back();
    }
}
