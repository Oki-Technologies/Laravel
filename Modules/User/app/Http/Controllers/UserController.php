<?php

namespace Modules\User\app\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\User\app\Models\User;

class UserController extends Controller
{
    public $data = [];

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(['permission:user.list'])->only('index');
        $this->middleware(['permission:user.show'])->only('show');
        $this->middleware(['permission:user.create'])->only('create', 'store');
        $this->middleware(['permission:user.edit'])->only('edit', 'update');
        $this->middleware(['permission:user.delete'])->only('destroy');
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {
        $this->data['head']['title'] = '';

        return response(view('user::index', $this->data));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Response
    {
        $this->data['head']['title'] = '';

        return response(view('user::create', $this->data));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        //
        session()->flash('status', 'Record created successfully.');

        return redirect(route('dashboard'));
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user): Response
    {
        $this->data['head']['title'] = '';

        return response(view('user::show', $this->data));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user): Response
    {
        $this->data['head']['title'] = '';

        return response(view('user::edit', $this->data));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user): RedirectResponse
    {
        //
        session()->flash('status', 'Record updated successfully.');

        return redirect(route('dashboard'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user): RedirectResponse
    {
        //
        session()->flash('status', 'Record deleted successfully.');

        return redirect(route('dashboard'));
    }
}
