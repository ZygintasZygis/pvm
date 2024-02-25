@php
    $productId = is_array($product) ? $key : $product?->id;
    $id = $productId ?: random_int(100, 999999) . '-new';
    $name = is_array($product) ? $product['name'] : $product?->name;
    $amount = is_array($product) ? $product['amount'] : $product?->amount;
    $price = is_array($product) ? $product['price'] : $product?->price;
@endphp
<div class="row mt-2 product-item">
    <input type="hidden" name="bill_id" value="{{ $bill?->id ?? $billId }}">
    <div class="col-md-4">
        <label for="{{ "product-$id-name" }}" class="form-label">{{ trans('app.admin.bill.name') }}</label>
        <input type="text" class="form-control" id="{{ "product-$id-name" }}" name="{{ "products[$id][name]" }}"
               placeholder="{{ trans('app.admin.bill.name_placeholder') }}"
               value="{{ $name ?? '' }}"
            {{ $bill?->paid ? 'disabled' : '' }}>
        @error("products.$id.name")
        <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="col-md-3">
        <label for="{{ "product-$id-amount" }}" class="form-label">{{ trans('app.admin.bill.amount') }}</label>
        <input type="number" class="form-control" id="{{ "product-$id-amount" }}" name="{{ "products[$id][amount]" }}"
               placeholder="{{ trans('app.admin.bill.amount_placeholder') }}"
               value="{{ $amount ?? '' }}"
            {{ $bill?->paid ? 'disabled' : '' }}>
        @error("products.$id.amount")
        <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="col-md-3">
        <label for="{{ "product-$id-price" }}" class="form-label">{{ trans('app.admin.bill.price') }}</label>
        <input type="number" step="0.01" class="form-control" id="{{ "product-$id-price" }}"
               name="{{ "products[$id][price]" }}"
               placeholder="{{ trans('app.admin.bill.price_placeholder') }}"
               value="{{ $price ?? '' }}"
            {{ $bill?->paid ? 'disabled' : '' }}>
        @error("products.$id.price")
        <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    @if(!$bill?->paid)
        <div class="col-md-2 my-auto text-end">
            <button class="btn btn-danger btn-sm product-delete">{{ trans('app.admin.bill.delete_product') }}</button>
        </div>
    @endif
    <hr class="w-50 mt-4 mx-auto">
</div>
