<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectlistpersonalmodelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projectlistpersonalmodels', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('username')->comment('姓名');
            $table->date('time')->comment('日期');
            $table->text('client')->comment('客戶名稱');
            $table->text('serial')->comment('專案編號');
            $table->text('projectlistpersonal')->comment('工作類別');
            $table->text('penetration')->comment('工作項目');
            $table->dateTime('starttime')->comment('開始時間');
            $table->dateTime('endtime')->comment('結束時間');
            $table->text('totaltime')->comment('總時數');
            $table->text('summary')->comment('摘要');
            $table->text('remarks')->comment('備註');
            $table->Float('time_change')->comment('工時換算');
            $table->text('status_id')->comment('專案狀態');
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
        Schema::dropIfExists('projectlistpersonalmodels');
    }
}
