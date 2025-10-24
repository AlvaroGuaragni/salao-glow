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
        Schema::create('agendamento', function (Blueprint $table) {
            $table->id();
            $table->dateTime('data_hora');
            $table->string('servico', 250);
            $table->float('valor', 8, 2);
            $table->string('status', 50);
            $table->text('observacoes')->nullable();
            $table->unsignedBigInteger('cliente_id');
            $table->foreign('cliente_id')->references('id')->on('cliente')->onDelete;            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('agendamento');
    }
};
