<?php

namespace App\Http\Controllers;

use App\Data\OrganizationData;
use App\Data\SearchOrganizationData;
use App\Models\Organization;
use Hybridly\Contracts\HybridResponse;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrganizationsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(SearchOrganizationData $data): HybridResponse
    {
        $user = Auth::user();
        if (is_null($user)) {
            throw new AuthenticationException();
        }
        return hybridly("organizations.index", [
            "filters" => $data,
            "organizations" => OrganizationData::collection(
                $user->account
                    ->organizations()
                    ->orderBy("name")
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
    public function store(Request $request): HybridResponse
    {
        return hybridly();
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Organization $organization): HybridResponse
    {
        return hybridly();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Organization $id): HybridResponse
    {
        return hybridly();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Organization $organization): HybridResponse
    {
        return hybridly();
    }
}
