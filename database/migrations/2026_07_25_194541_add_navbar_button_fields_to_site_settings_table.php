<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('site_settings', function (Blueprint $table) {
            $table->string('navbar_button_text')
                ->nullable()
                ->after('keywords');

            $table->string('navbar_button_link')
                ->nullable()
                ->after('navbar_button_text');

            $table->boolean('navbar_button_active')
                ->default(true)
                ->after('navbar_button_link');
        });
    }

    public function down(): void
    {
        Schema::table('site_settings', function (Blueprint $table) {
            $table->dropColumn([
                'navbar_button_text',
                'navbar_button_link',
                'navbar_button_active',
            ]);
        });
    }
};
