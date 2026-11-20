<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('site_sections', function (Blueprint $table) {
            $table->id();
            $table->string('key')->unique();
            $table->boolean('is_visible')->default(true);
            $table->timestamps();
        });

        $now = now();

        DB::table('site_sections')->insert([
            ['key' => 'skills', 'is_visible' => true, 'created_at' => $now, 'updated_at' => $now],
            ['key' => 'projects', 'is_visible' => true, 'created_at' => $now, 'updated_at' => $now],
            ['key' => 'experiences', 'is_visible' => true, 'created_at' => $now, 'updated_at' => $now],
            ['key' => 'educations', 'is_visible' => true, 'created_at' => $now, 'updated_at' => $now],
            ['key' => 'testimonials', 'is_visible' => true, 'created_at' => $now, 'updated_at' => $now],
        ]);
    }

    public function down(): void
    {
        Schema::dropIfExists('site_sections');
    }
};
