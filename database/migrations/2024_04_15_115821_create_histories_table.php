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
        Schema::create('histories', function (Blueprint $table) {
            $table->id();
            $table->foreignId('module_id')->constrained();
            $table->date('history_measurement_date'); //date de prise de mesure
            $table->float('history_measurement_value'); // valeur actuelle mesurée
            $table->string('history_state'); // etat de fonctionnment du module qui prendra 3 valeur (bon etat, mauvais etat etc..)
            $table->integer('data_sent')->default(0);// nombre de donnée à envoyé qui va s'incrementer à chaque action du bouton send
            $table->time('operating_time')->default('00:00:00'); // nombre de donnée à envoyé qui va s'incrementer à chaque action du bouton send
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('histories');
    }
};
