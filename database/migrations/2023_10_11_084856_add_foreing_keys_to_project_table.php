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
        Schema::table('projects', function (Blueprint $table) {
            // nullable perchè altrimenti darà errore causa possibile conflitto nel db se già presente la colonna
            // crea una colonna di tipo unsignedBigInteger
            $table->unsignedBigInteger('type_id')->nullable();

            // rendo la colonna type_id una foreign key
            $table->foreign('type_id')
                // riferimento colonna id
                ->references('id')
                // nella tabella types
                ->on('projects');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('projects', function (Blueprint $table) {
            // processo inverso, devo rimuovere la foreign tramite nome indice
            $table->dropForeign('posts_type_id_foreign');
            
            // rimuovo la colonna type_id
            $table->dropColumn('type_id');
        });
    }
};
