<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Route;
use App\Models\Stop;
use App\Models\PrivateCompany;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('route_stop', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('stop_id');
            $table->unsignedBigInteger('route_id');

            $table->foreign('stop_id')->references('id')->on('stops')->onUpdate('cascade')->onDelete('restrict');
            $table->foreign('route_id')->references('id')->on('routes')->onUpdate('cascade')->onDelete('restrict');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('route_stop');
    }
};
