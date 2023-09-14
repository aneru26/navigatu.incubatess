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
        Schema::create('team', function (Blueprint $table) {
            $table->id();
            $table->string('team_logo')->nullable();
            $table->string('team_name')->nullable();
            $table->string('startup_name')->nullable();
            $table->string('document_type')->nullable();
            $table->string('link')->nullable();
            $table->string('team_document')->nullable();
            $table->unsignedBigInteger('created_by')->nullable(); // Change data type to int
            $table->tinyInteger('is_delete')->default(0)->comment('0:not deleted, 1: deleted');
            $table->timestamps();
    
            // Define foreign key constraint for created_by column
            $table->foreign('created_by')
            ->references('id')
            ->on('users')
            ->after('created_by');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('team');
    }
};
