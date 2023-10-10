<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('competitions', function (Blueprint $table) {
            $table->id();
            $table->string('competition_name')->nullable();
            $table->string('organization_host')->nullable();
            $table->string('deadline')->nullable();
            $table->string('date_competition')->nullable();
            $table->string('description')->nullable();
            $table->string('requirments')->nullable();
            $table->string('link_announcement')->nullable();
            $table->tinyInteger('is_delete')->default(0)->comment('0:not deleted, 1: deleted');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('competitions');
    }
};
