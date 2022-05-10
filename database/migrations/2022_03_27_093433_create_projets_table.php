<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projets', function (Blueprint $table) {
            $table->id();
            $table->foreignId('concour_id')->nullable()->constrained('concours')->onDelete('cascade')->onDelete('cascade');
            $table->foreignId('user_id')->nullable()->constrained('users')->onDelete('cascade')->onDelete('cascade');
            $table->string('titre');
            $table->text('description');
            $table->enum('gagnant', ['first', 'second', 'third'])->default(null);
            $table->string('prototype')->nullable();
            $table->string('bmc')->nullable();
            $table->string('planAffaire')->nullable();
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
        Schema::dropIfExists('projets');
    }
}
