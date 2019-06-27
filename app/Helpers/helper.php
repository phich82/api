<?php
use App\Helpers\Constant;

if (!function_exists('lang')) {
    /**
     * Get language
     *
     * @param  string $key
     * @param  array $replace
     * @param  string $locale
     *
     * @return string
     */
    function lang($key = null, $replace = [], $locale = null)
    {
        $locale = $locale ?: request()->header(Constant::LANG_KEY_API, app()->getLocale());
        return trans($key, $replace, $locale);
    }
}
