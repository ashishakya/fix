<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customer extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        "type",
        "company",
        "first_name",
        "last_name",
        "email",
        "phone",
        "invoice_details",
        "is_login_enabled",
        "last_date_login",
    ];

    protected $casts = [
        "is_login_enabled" => "boolean",
        "invoice_details"  => "array",
        "last_date_login"  => "date",
    ];

    const BUSINESS_TYPE = "business";
    const CONSUMER_TYPE = "consumer";

    const VALID_TYPES = [
        self::BUSINESS_TYPE,
        self::CONSUMER_TYPE,
    ];
}
