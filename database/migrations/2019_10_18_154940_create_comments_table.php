<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('board_id');
            $table->string('user_id');
            $table->text('contents');
            //$table->unsignedInteger('parents_comment')->nullable();
            $table->timestamps();
        });
    }




  /*
  id int(10) not null auto_increment primary key,
  post_num int(10) not null,
  user_id varchar(10) not null,
  password varchar(8) not null,
  contents text not null,
  parents_comment int(10)

*/
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comments');
    }
}
