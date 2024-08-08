<?php

namespace App\Http\Requests\Backend\Customer;

use App\Constants\DbTables;
use App\Models\Customer;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CustomerUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "type" => [
                "required",
                Rule::in(Customer::VALID_TYPES),
            ],
            "company"                         => sprintf("required_if:type,%s", Customer::BUSINESS_TYPE),
            "first_name"                      => ["required", "string", "max:255"],
            "last_name"                       => ["required", "string", "max:255"],
            "email"                           => ["required", "email", "max:255", Rule::unique(DbTables::CUSTOMERS, "email")->ignoreModel($this->customer)],
            "phone"                           => ["nullable"],
            "invoice_details"                 => ["array", "required"],
            "invoice_details.invoice_company" => ["nullable", "string", "max:255"],
            "invoice_details.invoice_email"   => ["nullable", "email", "max:255"],
            "invoice_details.invoice_address" => ["nullable", "string", "max:255"],
            "invoice_details.invoice_city"    => ["nullable", "string", "max:255"],
            "invoice_details.invoice_state"   => ["nullable", "string", "max:255"],
            "invoice_details.invoice_zipcode" => ["nullable", "string", "max:255"],
            "invoice_details.invoice_country" => ["nullable", "string", "max:255"],
            "is_login_enabled"                => ["boolean", "required"],
        ];
    }
}
