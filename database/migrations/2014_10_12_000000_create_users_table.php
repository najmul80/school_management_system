<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->enum('usertype',['Admin','User','Student']);
            $table->string('name');
            $table->string('email')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('nid')->nullable();
            $table->string('mobile')->nullable();
            $table->string('blood_group')->nullable();
            $table->string('gender')->nullable();
            $table->string('fname')->nullable();
            $table->string('mname')->nullable();
            $table->string('religion')->nullable();
            $table->string('id_no')->nullable();
            $table->date('dob')->nullable();
            $table->text('address')->nullable();
            $table->string('code')->nullable();
            $table->string('role')->nullable()->comment('admin=head of software, operator, computer operation, user=employee');
            $table->date('join_date')->nullable();
            $table->integer('designation_id')->nullable();
            $table->double('salary')->nullable();
            $table->rememberToken();
            $table->foreignId('current_team_id')->nullable();
            $table->text('image', 2048)->nullable();
            $table->tinyInteger('status')->default(1)->comment('0=inactive, 1=active');
            $table->string('profile_photo_path', 2048)->nullable();
            $table->timestamps(); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
