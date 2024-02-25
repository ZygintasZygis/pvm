<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Validator;
use App\Models\Role;
use App\Models\Client;

/**
 * Class ClientController
 * @package App\Http\Controllers\Admin
 */
class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param User $user
     * @return View
     */
    public function index(User $user): View
    {
        return view('admin.client.index', [
            'clients' => $user->select()->with('roles')->whereHas('roles', function ($q) {
                $q->where('role', '=', Role::CLIENT_ROLE);
            })->get()
        ]);
    }

    /**
     * @param string $id
     * @param User $userModel
     * @param Client $clientModel
     * @return View
     */
    public function profile(string $id, User $userModel, Client $clientModel): View
    {
        $client = $userModel->where('username', '=', $id)->with('client')->first();

        abort_if(!$client, 404, 'User Not Found');

        return view('admin.client.profile', [
            'client' => $client,
            'bills' => $clientModel->where('id', '=', $client?->client?->id)->with('bills')->first()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param string $id
     * @param Client $client
     * @return View
     */
    public function edit(string $id, Client $client): View
    {
        $record = $client->where('id', '=', $id)->with('user')?->first();

        abort_if(!$record, 404, 'Client Not Found');

        return view('admin.client.edit', [
            'client' => $record
        ]);
    }

    /**
     * Show the form for creating the specified resource.
     *
     * @param string $userId
     * @param User $userModel
     * @return View
     */
    public function create(string $userId, User $userModel): View
    {
        $user = $userModel->where('username', '=', $userId)?->first();

        abort_if(!$user, 404, 'User Not Found');

        return view('admin.client.create', [
            'client' => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param string $id
     * @param Client $clientModel
     * @return RedirectResponse
     * @throws ValidationException
     */
    public function update(Request $request, string $id, Client $clientModel): RedirectResponse
    {
        $post = $request->post();
        $this->validator($post)->validate();
        $client = $clientModel->findOrFail($id)?->first();
        $client->fill($post);
        $client->save();

        $request->session()->flash('success', trans('app.admin.client.updated_success'));

        return redirect()->route('admin.client.profile', ['id' => $post['username']]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @param string $id
     * @param Client $clientModel
     * @return RedirectResponse
     * @throws ValidationException
     */
    public function store(Request $request, string $id, Client $clientModel): RedirectResponse
    {
        $post = $request->post();
        $this->validator($post)->validate();
        $clientModel->create($post);

        $request->session()->flash('success', trans('app.admin.client.created_success'));

        return redirect()->route('admin.client.profile', ['id' => $post['username']]);
    }

    /**
     * Get a validator for an incoming update request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data): \Illuminate\Contracts\Validation\Validator
    {
        return Validator::make($data, [
            'user_id' => ['required', 'int'],
            'address' => ['required'],
            'company_code' => ['required'],
            'vat_nr' => ['required'],
        ]);
    }
}
