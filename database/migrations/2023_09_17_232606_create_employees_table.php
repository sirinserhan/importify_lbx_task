<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('employee_id')->unsigned()->comment('Employee ID');
            $table->string('user_name', 50)->collation('utf8mb4_unicode_ci')->comment('Employee User Name');
            $table->string('name_prefix', 10)->nullable()->collation('utf8mb4_unicode_ci')->comment('Employee Name Prefix');
            $table->string('first_name', 50)->nullable()->collation('utf8mb4_unicode_ci')->comment('Employee First Name');
            $table->string('middle_initial', 10)->nullable()->collation('utf8mb4_unicode_ci')->comment('Employee M.I.');
            $table->string('last_name', 50)->nullable()->collation('utf8mb4_unicode_ci')->comment('Employee Last Name');
            $table->enum('gender', ['M', 'F'])->nullable()->collation('utf8mb4_unicode_ci')->comment('Employee Gender');
            $table->string('date_of_birth', 50)->nullable()->collation('utf8mb4_unicode_ci')->comment('Employee Date of Birth');
            $table->string('time_of_birth', 50)->nullable()->collation('utf8mb4_unicode_ci')->comment('Employee Time of Birth');
            $table->decimal('age_in_years', 5, 2)->nullable()->comment('Employee Age');
            $table->string('date_of_joining', 50)->nullable()->collation('utf8mb4_unicode_ci')->comment('Employee Date of Joining');
            $table->decimal('age_in_company_years', 5, 2)->nullable()->comment('Employee Age in Company (Years)');
            $table->string('phone_number', 20)->nullable()->collation('utf8mb4_unicode_ci')->comment('Employee Phone N.');
            $table->string('place_name', 50)->nullable()->collation('utf8mb4_unicode_ci')->comment('Employee Place Name');
            $table->string('country', 50)->nullable()->collation('utf8mb4_unicode_ci')->comment('Employee Country');
            $table->string('city', 50)->nullable()->collation('utf8mb4_unicode_ci')->comment('Employee City');
            $table->string('zip', 20)->nullable()->collation('utf8mb4_unicode_ci')->comment('Employee Zip Code');
            $table->string('region', 50)->nullable()->collation('utf8mb4_unicode_ci')->comment('Employee Region');
            $table->string('email', 255)->collation('utf8mb4_unicode_ci')->unique();
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employees');
    }
};
