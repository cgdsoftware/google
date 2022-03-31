<?php

namespace LaravelEnso\Google\Upgrades;

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use LaravelEnso\Upgrade\Contracts\MigratesTable;
use LaravelEnso\Upgrade\Helpers\Column;

class SettingsStructure implements MigratesTable
{
    public function isMigrated(): bool
    {
        return Column::getLength('google_settings', 'ads_id') === 260;
    }

    public function migrateTable(): void
    {
        Schema::table('google_settings', function (Blueprint $table) {
            $table->string('ads_id', 260)->nullable()->change();
            $table->string('maps_key', 260)->nullable()->change();
            $table->string('recaptcha_key', 260)->nullable()->change();
            $table->string('recaptcha_secret', 260)->nullable()->change();
        });
    }
}
