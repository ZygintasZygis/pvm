<div class="row">
    <input type="hidden" name="client_id" value="{{ $client->id }}">
    <input type="hidden" name="username" value="{{ $client->user->username }}">
    <div class="col-md-12 mb-2">
        <label for="bill-date" lass="form-label">{{ trans('app.admin.bill.bill_date') }}</label>
        <input type="date" class="form-control" id="bill-date" name="bill_date"
               placeholder="{{ trans('app.admin.bill.bill_date_placeholder') }}"
               value="{{ old('bill_date', $bill?->bill_date) }}" {{ $bill->paid ? 'disabled' : '' }}>
        @error('bill_date')
        <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="col-md-12 mb-2">
        <label for="invoice-nr" class="form-label">{{ trans('app.admin.bill.invoice_nr') }}</label>
        <input type="text" class="form-control" id="invoice-nr" name="invoice_nr"
               placeholder="{{ trans('app.admin.bill.invoice_nr_placeholder') }}"
               value="{{ old('invoice_nr', $bill?->invoice_nr) }}" {{ $bill->paid ? 'disabled' : '' }}>
        @error('invoice_nr')
        <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="col-md-12 mb-2">
        <label for="bank-acc-nr" class="form-label">{{ trans('app.admin.bill.bank_acc_nr') }}</label>
        <input type="text" class="form-control" id="bank-acc-nr" name="bank_acc_nr"
               placeholder="{{ trans('app.admin.bill.bank_acc_nr_placeholder') }}"
               value="{{ old('bank_acc_nr', $bill?->bank_acc_nr) }}" {{ $bill->paid ? 'disabled' : '' }}>
        @error('bank_acc_nr')
        <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="col-md-12 mb-2">
        <label for="payment-purpose" class="form-label">{{ trans('app.admin.bill.payment_purpose') }}</label>
        <input type="text" class="form-control" id="payment-purpose" name="payment_purpose"
               placeholder="{{ trans('app.admin.bill.payment_purpose_placeholder') }}"
               value="{{ old('payment_purpose', $bill?->payment_purpose) }}" {{ $bill->paid ? 'disabled' : '' }}>
        @error('payment_purpose')
        <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="col-md-12 mb-2 mt-4">
        <label class="form-label">{{ trans('app.admin.bill.products') }}</label>
        <div class="product-wrapper">
            @if(old('products') || ($bill?->products !== null && $bill?->products->toArray()))
                @php($products = old('products') ?: $bill?->products)
                @foreach($products as $key => $product)
                    @include('admin.bill._product', ['product' => $product, 'key' => $key])
                @endforeach
            @endif
        </div>
        <div
            class="alert alert-info mb-0 product-list-empty {{ $bill?->products !== null && $bill?->products->toArray() ? 'd-none' : '' }}"
            role="alert">
            {{ trans('app.admin.bill.empty_products') }}
        </div>
        @error('products')
        <span class="text-danger">{{ $message }}</span>
        @enderror

        @if(!$bill->paid)
            <br>
            <button class="btn btn-primary btn-sm add-products"
                    data-url="{{ route('admin.product-item', ['bill' => $bill?->id]) }}">{{ trans('app.admin.bill.add_product') }}</button>
        @endif
    </div>
</div>
