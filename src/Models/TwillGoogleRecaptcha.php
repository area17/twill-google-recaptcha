<?php

namespace A17\TwillGoogleRecaptcha\Models;

use A17\Twill\Models\Model;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Crypt;
use A17\Twill\Models\Behaviors\HasRevisions;
use Throwable;

class TwillGoogleRecaptcha extends Model
{
    use HasRevisions;

    protected $fillable = ['published', 'site_key', 'private_key'];

    public function getSiteKeyAttribute(): string|null
    {
        return $this->decrypt(google_recaptcha()->siteKey(true));
    }

    public function setSiteKeyAttribute($value): void
    {
        $this->attributes['site_key'] = $this->encrypt($value);
    }

    public function getPrivateKeyAttribute(): string|null
    {
        return $this->decrypt(google_recaptcha()->privateKey(true));
    }

    public function setPrivateKeyAttribute($value): void
    {
        $this->attributes['private_key'] = $this->encrypt($value);
    }

    public function getPublishedAttribute(): string|null
    {
        return google_recaptcha()->published(true);
    }

    public function encrypt($value): string|null
    {
        $encrypted = 'ENCRYPTION ERROR';

        try {
            $encrypted = Crypt::encryptString($value);
        } catch (\Throwable) {
        }

        return $encrypted;
    }

    public function decrypt($value): string|null
    {
        $decrypted = '';

        try {
            $decrypted = Crypt::decryptString($value);
        } catch (\Throwable) {
            $decrypted = $value;
        }

        return $decrypted;
    }
}
