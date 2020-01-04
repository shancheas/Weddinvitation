<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWeddinvitationScheme extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invitations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('user_id');
            $table->bigInteger('template_id');
            $table->text('content');        
            $table->timestamps();        
        });

        Schema::create('templates', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('content');    
            $table->timestamps();        
        });

        Schema::create('invitation_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('invitations_id');
            $table->string('name');
            $table->string('comment');
            $table->boolean('is_show');
            $table->boolean('response');
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
        Schema::dropIfExists('invitations');
        Schema::dropIfExists('invitation_details');
        Schema::dropIfExists('templates');
    }
}
