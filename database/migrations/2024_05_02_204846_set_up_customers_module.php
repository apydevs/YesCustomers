<?php

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class() extends Migration {
    use SoftDeletes; // Import SoftDeletes trait

    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->date('date_of_birth')->nullable();
            $table->string('address_line1');
            $table->string('address_line2')->nullable();
            $table->string('city');
            $table->string('state');
            $table->string('country');
            $table->string('postal_code');
            $table->unsignedBigInteger('user_id'); // Foreign key to users table
            $table->string('account_reference')->unique(); // Unique Account Reference Number
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('user_id')->references('id')->on('users'); // Assuming 'users' table exists
        });
    }

    public function down()
    {
        Schema::dropIfExists('customers');
    }
};
