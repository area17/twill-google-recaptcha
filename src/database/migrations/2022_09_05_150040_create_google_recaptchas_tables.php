<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGoogleRecaptchasTables extends Migration
{
    public function up(): void
    {
        Schema::create('twill_google_recaptchas', function (Blueprint $table) {
            createDefaultTableFields($table);

            $table->string('site_key')->nullable();

            $table->string('private_key')->nullable();
        });

        Schema::create('twill_google_recaptcha_revisions', function (Blueprint $table) {
            createDefaultRevisionsTableFields($table, 'twill_google_recaptcha');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('twill_google_recaptcha_revisions');
        Schema::dropIfExists('twill_google_recaptchas');
    }
}
