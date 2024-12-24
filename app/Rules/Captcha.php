<?php

namespace App\Rules;
use Illuminate\Support\Facades\Http;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use ReCaptcha\ReCaptcha;

class Captcha implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string, ?string=): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $recaptcha = new ReCaptcha(env('CAPTCHA_SECRET_KEY'));

        $response = $recaptcha->verify($value, $_SERVER['REMOTE_ADDR']);

        if (!$response->isSuccess()) {
            $fail('Captcha validation failed.');
        }
    }
}
