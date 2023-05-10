<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Import extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('nhapxuatkho', function (Blueprint $table) {
            $table->id();
            $table->string('code')->nullable()->comment('code');
            $table->integer('type')->comment('1 là nhập, 2 là xuất');
            $table->integer('id_product');
            $table->string('content')->nullable()->comment('Thông tin nhà cung cấp');
            $table->integer('amount')->nullable();
            $table->integer('price')->nullable();
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
        Schema::drop('nhapkho');
    }
}
