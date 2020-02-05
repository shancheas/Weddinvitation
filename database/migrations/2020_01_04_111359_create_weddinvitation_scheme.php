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

        Schema::create('templates', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('path', 64);
            $table->string('thumbnail', 64);
            $table->timestamps();
        });

        Schema::create('invitations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('template_id')->default(1);
            $table->string('bride');
            $table->string('bridegroom');
            $table->string('places');
            $table->string('address');
            $table->longText('longitude');
            $table->longText('latitude');
            $table->dateTime('date');

            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');

            $table->foreign('template_id')
                ->references('id')
                ->on('templates')
                ->onDelete('cascade');
        });

        Schema::create('invitation_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('invitation_id');
            $table->string('name');
            $table->string('comment');
            $table->boolean('is_show');
            $table->boolean('response');
            $table->timestamps();

            $table->foreign('invitation_id')
                ->references('id')
                ->on('invitations')
                ->onDelete('cascade');
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
