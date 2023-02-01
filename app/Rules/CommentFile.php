<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\InvokableRule;

class CommentFile implements InvokableRule
{
    /**
     * Run the validation rule.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     * @return void
     */
    public function __invoke($attribute, $value, $fail)
    {
        if ($value && $value != 'undefined' && $value->getClientOriginalExtension() == 'txt' && filesize($value) > 100000) {
            $fail('Very large file. Maximum 100 kb for the format "txt"');
        }
    }
}