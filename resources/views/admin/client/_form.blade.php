<div class="row">
    <div class="col-md-12 mb-2">
        <label for="address" class="form-label">{{ trans('app.admin.client.address') }}</label>
        <input type="text" class="form-control" id="address" name="address"
               placeholder="{{ trans('app.admin.client.address_placeholder') }}"
               value="{{ old('address', $client->address) }}">
        @error('address')
        <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="col-md-12 mb-2">
        <label for="company-code" class="form-label">{{ trans('app.admin.client.company_code') }}</label>
        <input type="text" class="form-control" id="company-code" name="company_code"
               placeholder="{{ trans('app.admin.client.company_code_placeholder') }}"
               value="{{ old('company_code', $client->company_code) }}">
        @error('company_code')
        <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="col-md-12 mb-2">
        <label for="vat-nr" class="form-label">{{ trans('app.admin.client.vat_nr') }}</label>
        <input type="text" class="form-control" id="vat-nr" name="vat_nr"
               placeholder="{{ trans('app.admin.client.vat_nr_placeholder') }}"
               value="{{ old('vat_nr', $client->vat_nr) }}">
        @error('vat_nr')
        <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
</div>
