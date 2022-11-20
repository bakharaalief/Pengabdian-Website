<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBapClasses extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bap_classes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('class')
                ->references('id')
                ->on('classes')
                ->onUpdate('cascade')
                ->onDelete('restrict');
            $table->String('materi');
            $table->String('deskripsi');
            $table->foreignId('user_isi')
                ->references('id')
                ->on('users')
                ->onUpdate('cascade')
                ->onDelete('restrict');
            $table->date('study_date');
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
        Schema::dropIfExists('bap_classes');
    }
}
