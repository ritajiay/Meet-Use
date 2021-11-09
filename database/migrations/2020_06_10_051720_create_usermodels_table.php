<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Usermodel;

class CreateUsermodelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usermodels', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('userid')->comment('帳號');
            $table->text('password');
            $table->text('username')->comment('姓名');
            $table->text('phone');
            $table->text('email');
            $table->text('role')->default(Usermodel::ROLE_USER)->comment('權限');
            // $table->text('remember_token');
            $table->timestamps(); //時間戳記欄位
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('usermodels');
    }
}
