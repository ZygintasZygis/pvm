<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\RedirectResponse;

/**
 * Class UserController
 * @package App\Http\Controllers\Admin
 */
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param User $user
     * @return View
     */
    public function index(User $user): View
    {
        return view('admin.user.index', [
            'users' => $user->select()->with('roles')->get()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param string $id
     * @param User $user
     * @return View
     */
    public function edit(string $id, User $user): View
    {
        $record = $user->where('username', '=', $id)->with('roles')->first();

        abort_if(!$record, 404, 'User Not Found');

        return view('admin.user.edit', [
            'user' => $record
        ]);
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param string $id
     * @param User $userModel
     * @return RedirectResponse
     * @throws ValidationException
     */
    public function update(Request $request, string $id, User $userModel): RedirectResponse
    {
        $post = $request->post();
        $this->validator($post)->validate();
        $user = $userModel->where('username', '=', $id)->first();

        abort_if(!$user, 500);

        $user->roles()->sync(array_map('intval', $post['roles']));

        $request->session()->flash('success', trans('app.admin.user.updated_success'));
        return redirect()->route('admin.user.index');
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
            'roles' => ['required', 'array']
        ]);
    }
}
