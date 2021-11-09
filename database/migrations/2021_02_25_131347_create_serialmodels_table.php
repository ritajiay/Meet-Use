<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSerialmodelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('serialmodels', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('serial')->comment('專案編號');
            $table->text('projectname')->comment('專案名稱');
            $table->text('c_id')->comment('客戶名稱>>關聯');
            $table->date('pro_st_time')->comment('專案開始時間');
            $table->date('pro_end_time')->comment('專案結束日期');
            $table->int('ex_work_time')->comment('預估工時');
            $table->float('total_work_time')->comment('總工時');
            $table->float('work_day')->comment('人工天');
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
        Schema::dropIfExists('serialmodels');
    }
}
