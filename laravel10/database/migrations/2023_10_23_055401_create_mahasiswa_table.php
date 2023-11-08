<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     *
     */
    public function up(): void
    {
        Schema::create('mahasiswas', function (Blueprint $table) {
            $table->id();
            $table->char('npm',10)->unique();
            $table->string('nama');
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->timestamps();
            $table->foreign('prodi_id')->after('alamat')->constrained()
            ->onUpdate('cascade')->onDelete('cascade');
        });



    }

    /**
     * Reverse the migrations.
     *
     *
     */
    public function down(): void
    {


        Schema::table('mahasiswas',function(Blueprint $table){
            $table->dropForeign('mahasiswa_prodi_id_foreign');
            $table->renameColumn('nama','nama_mahasiswa');
            $table->dropColumn('alamat','prodi_id');
            $table->text('alamat')->after('tanggal_lahir');
        });




    }


};
