<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
   public function up(): void
{
    Schema::table('de_incu', function (Blueprint $table) {
        $table->unsignedBigInteger('id_etudiant')->nullable()->after('id_projet');

        $table->foreign('id_etudiant')
              ->references('id_etudiant')
              ->on('etudiant')
              ->nullOnDelete();
    });
}

public function down(): void
{
    Schema::table('de_incu', function (Blueprint $table) {
        $table->dropForeign(['id_etudiant']);
        $table->dropColumn('id_etudiant');
    });
}
};
