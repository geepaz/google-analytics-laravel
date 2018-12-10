<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');

            $table->enum('role', ['user', 'admin']);
            
            $table->string('fname', 100);
            $table->string('lname', 100);
            $table->string('email', 100)->unique();
            $table->string('password');
            $table->string('image', 100)->nullable();
            $table->string('token')->nullable();

            $table->integer('blocked')->default(0);
            $table->integer('active')->default(0);
            $table->rememberToken();
            
            $table->timestamps();
        });

        DB::table('users')->insert([
            'role' => 'admin',
            'fname' => 'New',
            'lname' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('123456'),
            'image' => 'avatar.png',
            'active' => '1',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
    }
    

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
