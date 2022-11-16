<?php

namespace App\Twill\Capsules\GoogleRecaptchas\Models;

use A17\Twill\Models\Model;
use A17\Twill\Models\Behaviors\HasRevisions;

class GoogleRecaptcha extends Model
{
    use HasRevisions;

    protected $fillable = ['published', 'site_key', 'private_key'];

    public function getSiteKeyAttribute(): string|null
    {
        return google_recaptcha()->siteKey(true);
    }

    public function getPrivateKeyAttribute(): string|null
    {
        return google_recaptcha()->privateKey(true);
    }
}
