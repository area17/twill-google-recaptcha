<?php

namespace A17\TwillGoogleRecaptcha\Models;

use A17\Twill\Models\Model;
use A17\Twill\Models\Behaviors\HasRevisions;
use Illuminate\Database\Eloquent\Relations\HasMany;
use A17\TwillGoogleRecaptcha\Models\Behaviors\Encrypt;

/**
 * @property int $id
 */
class TwillGoogleRecaptcha extends Model
{
    use HasRevisions;
    use Encrypt;

    protected $table = 'twill_ggl_captcha';

    protected $fillable = ['published', 'site_key', 'private_key'];

    public function getSiteKeyAttribute(): string|null
    {
        return $this->decrypt(google_recaptcha()->siteKey(true));
    }

    public function setSiteKeyAttribute(string|null $value): void
    {
        $this->attributes['site_key'] = $this->encrypt($value);
    }

    public function getPrivateKeyAttribute(): string|null
    {
        return $this->decrypt(google_recaptcha()->privateKey(true));
    }

    public function setPrivateKeyAttribute(string|null $value): void
    {
        $this->attributes['private_key'] = $this->encrypt($value);
    }

    public function getPublishedAttribute(): string|null
    {
        return google_recaptcha()->published(true);
    }

    public function revisions(): HasMany
    {
        return $this->hasMany($this->getRevisionModel(), 'twill_ggl_captcha_id')->orderBy('created_at', 'desc');
    }
}
