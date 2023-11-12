<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class InvoiceItem extends Model
{
    use HasFactory, HasUlids;

    protected $fillable = [
        'invoice_id',
        'item_id',
        'quantity',
        'subtotal',
    ];

    protected $with  = [
        // 'invoice',
        'item'
    ];

    // public function invoice(): BelongsTo
    // {
    //     return  $this->belongsTo(Invoice::class,'id','invoice_id');
    // }

    public function item(): HasOne
    { 
        return $this->hasOne(Item::class,'item_id','item_id');
    }
}
