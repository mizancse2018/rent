<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('profile_status')->default('0')->comment('0=pending,1=active');
            $table->text('about')->nullable();
            $table->string('father_name')->nullable();
            $table->string('dob')->nullable();
            $table->string('marital_status')->nullable();
            $table->string('address')->nullable();
            $table->string('phone')->nullable();
            $table->string('occupation')->nullable();
            $table->string('institution')->nullable();
            $table->string('religion')->nullable();
            $table->string('education')->nullable();
            $table->string('nid')->nullable();
            $table->string('image')->nullable();
            $table->string('sign')->nullable();
            $table->string('nid_front')->nullable();
            $table->string('nid_back')->nullable();
            $table->string('ec_name')->nullable();
            $table->string('ec_relationship')->nullable();
            $table->string('ec_phone')->nullable();
            $table->string('ec_address')->nullable();
            $table->string('fm_name')->nullable();
            $table->string('fm_age')->nullable();
            $table->string('fm_occupation')->nullable();
            $table->string('fm_phone')->nullable();
            $table->string('hw_name')->nullable();
            $table->string('hw_nid')->nullable();
            $table->string('hw_phone')->nullable();
            $table->string('hw_address')->nullable();
            $table->string('d_name')->nullable();
            $table->string('d_nid')->nullable();
            $table->string('d_phone')->nullable();
            $table->string('d_address')->nullable();
            $table->string('pho_name')->nullable();
            $table->string('pho_phone')->nullable();
            $table->string('pho_address')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
