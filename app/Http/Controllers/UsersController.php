<?php

namespace App\Http\Controllers;

use App\Data\EditUserData;
use App\Data\StoreUserData;
use App\Data\UserData;
use App\Data\UserSearchData;
use App\Enums\RoleOption;
use App\Models\User;
use Hybridly\Contracts\HybridResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(UserSearchData $data): HybridResponse
    {
        /** @var \App\Models\User */
        $user = Auth::authenticate();

        return hybridly('users.index', [
            'filters' => $data,
            'users' => UserData::collection(
                $user->account
                    ->users()
                    ->orderByName()
                    ->filter($data)
                    ->paginate(10)
                    ->withQueryString()
            ),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): HybridResponse
    {
        return hybridly('users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserData $data): RedirectResponse
    {
        /** @var \App\Models\User */
        $user = Auth::authenticate();

        $user->account->users()->create([
            'first_name' => $data->first_name,
            'last_name' => $data->last_name,
            'email' => $data->email,
            'password' => $data->password,
            'owner' => $data->role === RoleOption::OWNER,
            'photo_path' => $data->photo_file?->store('users'),
        ]);

        return to_route('users.index')->with(
            'success',
            __('users.create.successFlash'),
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user): HybridResponse
    {
        return hybridly('users.edit', [
            'user' => EditUserData::from($user),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreUserData $data, User $user): RedirectResponse
    {
        $user->update([
            'first_name' => $data->first_name,
            'last_name' => $data->last_name,
            'email' => $data->email,
            'owner' => $data->role === RoleOption::OWNER,
        ]);

        if ($data->password) {
            $user->update(['password' => $data->password]);
        }

        if ($data->photo_file) {
            $user->update(['photo_path' => $data->photo_file->store('users')]);
        }

        return to_route('users.index')->with(
            'success',
            __('users.edit.successFlash'),
        );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user): RedirectResponse
    {
        $user->delete();

        return to_route('users.index')->with(
            'success',
            __('users.delete.successFlash'),
        );
    }

    /**
     * Restore the specified resource.
     */
    public function restore(User $user): RedirectResponse
    {
        $user->restore();

        return to_route('users.index')->with(
            'success',
            __('users.restore.successFlash'),
        );
    }
}
