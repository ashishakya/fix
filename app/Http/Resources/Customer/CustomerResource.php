<?php

namespace App\Http\Resources\Customer;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Arr;

class CustomerResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "id"              => $this->id,
            "type"            => $this->type,
            "company"         => $this->company,
            "first_name"      => $this->first_name,
            "last_name"       => $this->last_name,
            "email"           => $this->email,
            "phone"           => $this->phone,
            "invoice_details" => [
                "invoice_company" => Arr::get($this->invoice_details, "invoice_company"),
                "invoice_email"   => Arr::get($this->invoice_details, "invoice_email"),
                "invoice_address" => Arr::get($this->invoice_details, "invoice_address"),
                "invoice_city"    => Arr::get($this->invoice_details, "invoice_city"),
                "invoice_state"   => Arr::get($this->invoice_details, "invoice_state"),
                "invoice_zipcode" => Arr::get($this->invoice_details, "invoice_zipcode"),
                "invoice_country" => Arr::get($this->invoice_details, "invoice_country"),
            ],
            "is_login_enabled" => $this->is_login_enabled,
        ];
    }
}
