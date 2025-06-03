<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeDeadlineColumnInTasksTable extends Migration
{
    /**
     * Jalankan migrasi untuk mengubah tipe data kolom 'deadline'.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tasks', function (Blueprint $table) {
            $table->dateTime('deadline')->change();  // Mengubah kolom 'deadline' menjadi tipe DATETIME
        });
    }

    /**
     * Mengembalikan perubahan migrasi.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tasks', function (Blueprint $table) {
            $table->date('deadline')->change();  // Mengembalikan kolom 'deadline' ke tipe DATE jika rollback
        });
    }
}
