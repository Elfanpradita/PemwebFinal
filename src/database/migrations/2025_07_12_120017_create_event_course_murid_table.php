<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventCourseMuridTable extends Migration
{
    public function up()
    {
        Schema::create('event_course_murid', function (Blueprint $table) {
            $table->id();
            $table->foreignId('event_course_id')->constrained('event_courses')->cascadeOnDelete();
            $table->foreignId('murid_id')->constrained('murids')->cascadeOnDelete();
            $table->timestamps();

            $table->unique(['event_course_id', 'murid_id']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('event_course_murid');
    }
}
