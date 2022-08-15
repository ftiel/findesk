<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubCategoryDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub_category_details', function (Blueprint $table) {
            $table->id();
            $table->string('SubCategoryDetails');
            $table->Integer('SubCategoryID');
            $table->string('PriorityID')->nullable();
            $table->string('RequestType');
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
        Schema::dropIfExists('sub_category_details');
    }
}
