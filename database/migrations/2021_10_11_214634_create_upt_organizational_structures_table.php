<?php

use App\Models\Upt;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUptOrganizationalStructuresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('upt_organizational_structures', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Upt::class);
            $table->string('name');
            $table->string('position');
            $table->longText('description')->nullable();
            $table->text('avatar')->nullable();
            $table->timestamps();

            $table->foreign('upt_id')->references('id')->on('upts')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('upt_organizational_structures');
    }
}
