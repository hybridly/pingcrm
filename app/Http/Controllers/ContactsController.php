<?php

namespace App\Http\Controllers;

use App\Data\ContactData;
use App\Data\OrganizationData;
use App\Data\SearchData;
use App\Data\StoreContactData;
use App\Models\Contact;
use App\Models\User;
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
        $user = Auth::user();
        if (is_null($user)) {
            throw new AuthenticationException();
        }
        return hybridly("contacts.create", [
            "organizations" => OrganizationData::collection(
                $user->account->organizations->toArray(),
            ),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreContactData $data): RedirectResponse
    {
        $user = Auth::user();
        if (is_null($user)) {
            throw new AuthenticationException();
        }

        $user->account->contacts()->create($data->toArray());
        return to_route("contacts.index")->with(
            "success",
            __("contacts.create.successFlash"),
        );
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
