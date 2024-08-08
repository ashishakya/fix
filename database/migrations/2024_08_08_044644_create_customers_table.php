<?php

use App\Constants\DbTables;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create(DbTables::CUSTOMERS, function (Blueprint $table) {
            $table->id();
            $table->string("type");
            $table->string("company")->nullable();
            $table->string("first_name");
            $table->string("last_name");
            $table->string("email");
            $table->string("phone")->nullable();
            $table->json("invoice_details")->nullable();
            $table->boolean("is_login_enabled")->default(false);
            $table->timestamp("last_date_login")->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists(DbTables::CUSTOMERS);
    }
};
