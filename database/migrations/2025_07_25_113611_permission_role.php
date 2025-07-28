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
    Schema::create("permission_role", function (Blueprint $table) {
        $table->id();
        $table->foreignId("role_id")->constrained('roles')->OnDelete('cascade');
        $table->foreignId("permission_id")->constrained('permissions')->OnDelete('cascade');
    });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        schema::dropIfExists('permissions');
    }
};
