<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Builder;

/**
 * Class Product
 * @package App\Models
 * @mixin Builder
 */
class Product extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'bill_id',
        'name',
        'amount',
        'price',
    ];

    /**
     * @return BelongsTo
     */
    public function bill(): BelongsTo
    {
        return $this->belongsTo(Bill::class, 'bill_id');
    }

    /**
     *
     *
     * @param string $billId
     * @param mixed $products
     * @return void
     */
    public function updateProducts(string $billId, array $products): void
    {
        $this->deleteProducts($billId, $products);

        if ($products) {
            foreach ($products as $id => $product) {
                $product['bill_id'] = $billId;

                if (!str_contains($id, 'new')) {
                    $productModel = $this->where('id', '=', $id)->first();

                    abort_if(!$productModel, 500, 'Record Not Found');

                    $productModel->fill($product);
                    $productModel->save();
                } else {
                    $this->create($product);
                }
            }
        }
    }

    /**
     * @param string $billId
     * @param mixed $products
     * @return void
     */
    private function deleteProducts(string $billId, mixed $products): void
    {
        $existingProductIds = $this->where('bill_id', '=', $billId)->get()->pluck('id');
        $editedProductIds = array_keys($products);

        foreach ($existingProductIds as $id) {
            if (!in_array($id, $editedProductIds, true)) {
                $product = $this->findOrFail($id);
                $product->delete();
            }
        }
    }
}
