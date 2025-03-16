<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\RoleEnum;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->isAdmin();
        $users = User::paginate(10);
        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->isAdmin();

        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
        $this->isAdmin();

        User::create($request->validated());
        return redirect()->route('users.index')->with('message', 'User created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        $this->isAdmin();

        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
    */
    public function update(UpdateUserRequest $request, User $user)
    {
        $this->isAdmin();

        $user->update($request->validated());
        return redirect()->route('users.index')->with('message', 'User updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $this->isAdmin();

        $user->delete();
        return redirect()->route('users.index')->with('message', 'User updated successfully');
    }

    private function isAdmin()
    {
        if (!auth()->user()->hasRole(RoleEnum::ADMIN->value)) {
            abort(403, 'Unauthorized action.'); // Abort with a 403 Forbidden status if not an admin
        }
    }
}
