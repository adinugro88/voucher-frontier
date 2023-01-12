<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tokovouchers', function (Blueprint $table) {
            $table->id();
            $table->string('kodetoko');
            $table->string('nama_toko');
            $table->text('alamat');
            $table->string('notelpon');
            $table->string('Pic');
            $table->string('notelponpic')->nullable();
            
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
        Schema::dropIfExists('tokovouchers');
    }
};
