<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->string('TicketType');
            $table->text('TicketID');
            $table->string('ClientUsername');
            $table->string('Department');
            $table->string('Category');
            $table->string('SubCategory');
            $table->string('SubCategoryDetails');
            $table->string('Status');
            $table->string('isClosed')->nullable();
            $table->string('onBehalfOf')->nullable();
            $table->string('Priority');
            $table->string('PC_IP')->nullable();
            $table->dateTime('TransactionDate');
            $table->string('AssignedTo')->nullable();
            $table->string('ApprovalStatus')->nullable();
            $table->string('Approver')->nullable();
            $table->longText('DetailedDescription');
            $table->string('Attachment')->nullable();
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
        Schema::dropIfExists('tickets');
    }
}
