<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use App\Models\User;
use App\Models\Role;
use App\Models\Client;
use App\Models\Bill;

/**
 * Class AccountantController
 * @package App\Http\Controllers
 */
class AccountantController extends Controller
{
    /**
     * @param User $user
     * @return View
     */
    public function index(User $user): View
    {
        return view('accountant.clients', [
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
    public function clientShow(string $id, User $userModel, Client $clientModel): View
    {
        $client = $userModel->where('username', '=', $id)->with('client')->first();

        abort_if(!$client, 404, 'User Not Found');

        return view('accountant.client', [
            'client' => $client,
            'bills' => $clientModel->where('id', '=', $client?->client?->id)->with('bills')->first()
        ]);
    }

    /**
     * @param string $clientId
     * @param string $billId
     * @param Client $clientModel
     * @param Bill $billModel
     * @return View
     */
    public function billShow(string $clientId, string $billId, Client $clientModel, Bill $billModel): View
    {
        $client = $clientModel->where('id', '=', $clientId)
            ->with('user')?->first();
        $bill = $billModel->where('id', '=', $billId)->with('products')?->first();

        abort_if(!$client && !$bill, 404, 'Records Not Found');

        return view('accountant.bill', [
            'client' => $client,
            'bill' => $bill
        ]);
    }
}
