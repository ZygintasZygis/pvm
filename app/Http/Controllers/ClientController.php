<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use App\Models\Client;
use App\Models\Bill;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

/**
 * Class ClientController
 * @package App\Http\Controllers
 */
class ClientController extends Controller
{
    /**
     * @param Client $client
     * @return View
     */
    public function index(Client $client): View
    {
        return view('client.bills', [
            'bills' => $client->where('user_id', '=', auth()->user()->id)->with('bills')->first()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param string $billId
     * @param Client $clientModel
     * @param Bill $billModel
     * @return View
     */
    public function billShow(string $billId, Client $clientModel, Bill $billModel): View
    {
        $bill = $billModel->where('id', '=', $billId)->with('products')?->first();

        abort_if(!$bill, 404, 'Records Not Found');

        return view('client.bill', [
            'bill' => $bill
        ]);
    }

    /**
     * Pay bill.
     *
     * @param Request $request
     * @param string $billId
     * @param Bill $billModel
     * @return RedirectResponse
     */
    public function billPay(Request $request, string $billId, Bill $billModel): RedirectResponse
    {
        $bill = $billModel->where('id', '=', $billId)->first();
        abort_if(!$bill, 404, 'Record Not Found');

        if ($bill->paid) {
            $request->session()->flash('error', trans('app.client.bill.error_already_paid'));
        } else {
            $bill->paid = true;
            $bill->save();
            $request->session()->flash('success', trans('app.client.bill.success_paid'));
        }

        return redirect()->back()->withInput();
    }
}
