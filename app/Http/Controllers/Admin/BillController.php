<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\Bill;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use App\Models\Product;

/**
 * Class BillController
 * @package App\Http\Controllers\Admin
 */
class BillController extends Controller
{
    /**
     * Show the form for creating a new resource.
     * @param string $id
     * @param Client $clientModel
     * @return View
     */
    public function create(string $id, Client $clientModel): View
    {
        $client = $clientModel->where('id', '=', $id)->with('user')?->first();

        return view('admin.bill.create', [
            'client' => $client,
            'bill' => null
        ]);
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @param Bill $billModel
     * @param Product $productModel
     * @return RedirectResponse
     * @throws ValidationException
     */
    public function store(Request $request, Bill $billModel, Product $productModel): RedirectResponse
    {
        $post = $request->post();
        $this->validator($post)->validate();
        $bill = $billModel->create($post);

        if (isset($post['products'])) {
            foreach ($post['products'] as $product) {
                $product['bill_id'] = $bill->id;
                $productModel->create($product);
            }
        }

        $request->session()->flash('success', trans('app.admin.bill.created_success'));

        return redirect()->route('admin.client.profile', ['id' => $post['username']]);
    }

    /**
     * Show the form for editing the specified resource.
     * @param string $clientId
     * @param string $billId
     * @param Client $clientModel
     * @param Bill $billModel
     * @return View
     */
    public function edit(string $clientId, string $billId, Client $clientModel, Bill $billModel): View
    {
        $client = $clientModel->where('id', '=', $clientId)
            ->with('user')?->first();
        $bill = $billModel->where('id', '=', $billId)->with('products')?->first();

        abort_if(!$client && !$bill, 404, 'Records Not Found');

        return view('admin.bill.edit', [
            'client' => $client,
            'bill' => $bill
        ]);
    }

    /**
     * Update the specified resource in storage.
     * @throws ValidationException
     */
    public function update(Request $request, string $billId, Bill $billModel, Product $product): RedirectResponse
    {
        $post = $request->post();
        $this->validator($post)->validate();
        $bill = $billModel->where('id', '=', $billId)?->first();

        abort_if(!$bill, 404, 'Record Not Found');

        if ($bill->paid) {
            $request->session()->flash('error', trans('app.admin.bill.update_error'));
        } else {
            $product->updateProducts($billId, $post['products'] ?? []);
            $bill->fill($post);
            $bill->save();
            $request->session()->flash('success', trans('app.admin.bill.updated_success'));
        }

        return redirect()->route('admin.client.profile', ['id' => $post['username']]);
    }

    /**
     * Remove the specified resource from storage.
     * @param Request $request
     * @param string $id
     * @return RedirectResponse
     */
    public function destroy(Request $request, string $id): RedirectResponse
    {
        $bill = (new Bill())->findOrFail($id);

        if ($bill->paid) {
            $request->session()->flash('error', trans('app.admin.bill.delete_error'));
        } else {
            $request->session()->flash('success', trans('app.admin.bill.deleted_success'));
            $bill->delete();
        }


        return redirect()->back();
    }

    /**
     * Get a validator for an incoming update request.
     *
     * @param array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data): \Illuminate\Contracts\Validation\Validator
    {
        return Validator::make($data, [
            'client_id' => ['required'],
            'bill_date' => ['required', 'date'],
            'invoice_nr' => ['required'],
            'bank_acc_nr' => ['required'],
            'payment_purpose' => ['required'],
            'products.*.name' => ['required'],
            'products.*.amount' => ['required', 'int'],
            'products.*.price' => ['required'],
        ]);
    }

    /**
     * @param string|null $bill
     * @return View
     */
    public function productItem(?string $billId = null): View
    {
        return view('admin.bill._product', ['product' => null, 'billId' => $billId, 'bill' => null]);
    }
}
