<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class InvoiceItemResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "description" => $this->item->item_description,
            'unit_price' => $this->item->unit_price,
            'subtotal' => $this->subtotal,
            'quantity' => $this->quantity,
        ];
    }
}
