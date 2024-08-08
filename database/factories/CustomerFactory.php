<?php

namespace Database\Factories;

use App\Models\Customer;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Customer>
 */
class CustomerFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $companyType = $this->faker->randomElement(Customer::VALID_TYPES);

        return [
            "type"            => $companyType,
            "company"         => $companyType === Customer::BUSINESS_TYPE ? $this->faker->company() : null,
            "first_name"      => $this->faker->firstName(),
            "last_name"       => $this->faker->lastName(),
            "email"           => $companyType === Customer::BUSINESS_TYPE ? $this->faker->companyEmail() : $this->faker->safeEmail(),
            "phone"           => $this->faker->phoneNumber(),
            "invoice_details" => [
                "invoice_company" => $this->faker->company(),
                "invoice_email"   => $this->faker->companyEmail(),
                "invoice_address" => $this->faker->address(),
                "invoice_city"    => $this->faker->city(),
                "invoice_state"   => $this->faker->streetAddress,
                "invoice_zipcode" => $this->faker->postcode(),
                "invoice_country" => $this->faker->country(),
            ],
            "is_login_enabled" => false,
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
