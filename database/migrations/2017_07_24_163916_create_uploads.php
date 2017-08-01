<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Contracts\DBTable;

class CreateUploads extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create( 
            DBTable::UPLOADS, 
            function (Blueprint $table) {
            $table->increments('id');
            $table->string('image_name');
            $table->string('url');
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::table(
            DBTable::UPLOADS, 
            function (Blueprint $table) {
               $table->integer('user_id')->unsigned();
               $table->foreign('user_id','fk__users__uploads')->references('id')->on('users');
            }
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         Schema::dropIfExists(DBTable::UPLOADS);
    }
}
