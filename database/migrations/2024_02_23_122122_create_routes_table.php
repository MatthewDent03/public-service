<?php
// creating the migration table to apply the fields to the table and fill them with fake data, they are then dropping the table when required

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
        if (!Schema::hasTable('routes')) {
            Schema::create('routes', function (Blueprint $table) {
                $table->id();
                $table->string('start_location');
                $table->string('end_location');
                $table->text('estimated_departure');
                $table->text('estimated_arrival');
                $table->text('journey_route');
                $table->unsignedBigInteger('private_company_id');
                $table->foreign('private_company_id')->references('id')->on('private_companies')->onUpdate('cascade')->onDelete('restrict');
                $table->timestamps(); //creating a foreign key and the foreign key restraint to create a relationship between the tables
            });
        }
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // DB::statement('ALTER TABLE routes DROP FOREIGN KEY routes_private_company_id_foreign');
        
        // Schema::table('routes', function (Blueprint $table) {
        //     $table->dropForeign(['private_company_id']);
        //     $table->dropColumn('private_company_id');
        // });
    }
    
};
