<?php

declare(strict_types=1);

namespace Modules\User\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Str;

use function Safe\preg_match;

class Password implements Rule
{
    /**
     * The minimum length of the password.
     */
    private int $length = 8;

    /**
     * Indicates if the password must contain one uppercase character.
     */
    private bool $requireUppercase = false;

    /**
     * Indicates if the password must contain one numeric digit.
     */
    private bool $requireNumeric = false;

    /**
     * Indicates if the password must contain one special character.
     */
    private bool $requireSpecialCharacter = false;

    /**
     * The message that should be used when validation fails.
     *
     * @var string
     */
    private $message;

    /**
     * Determine if the validation rule passes.
     *
     * @param string $attribute
     */
    public function passes($attribute, $value): bool
    {
        $value = is_scalar($value) ? (string) $value : '';

        if ($this->requireUppercase && Str::lower($value) === $value) {
            return false;
        }

        if ($this->requireNumeric && ! preg_match('/\d/', $value)) {
            return false;
        }

        if (! $this->requireSpecialCharacter) {
            return Str::length($value) >= $this->length;
        }

        if (0 !== preg_match('/[\W_]/', $value)) {
            return Str::length($value) >= $this->length;
        }

        return false;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        if ('' !== $this->message && '0' !== $this->message) {
            return $this->message;
        }

        return match (true) {
            $this->requireUppercase
            && ! $this->requireNumeric
            && ! $this->requireSpecialCharacter => __('The :attribute must be at least :length characters and contain at least one uppercase character.', [
                'length' => $this->length,
            ]),
            $this->requireNumeric
            && ! $this->requireUppercase
            && ! $this->requireSpecialCharacter => __('The :attribute must be at least :length characters and contain at least one number.', [
                'length' => $this->length,
            ]),
            $this->requireSpecialCharacter
            && ! $this->requireUppercase
            && ! $this->requireNumeric => __('The :attribute must be at least :length characters and contain at least one special character.', [
                'length' => $this->length,
            ]),
            $this->requireUppercase
            && $this->requireNumeric
            && ! $this->requireSpecialCharacter => __('The :attribute must be at least :length characters and contain at least one uppercase character and one number.', [
                'length' => $this->length,
            ]),
            $this->requireUppercase
            && $this->requireSpecialCharacter
            && ! $this->requireNumeric => __('The :attribute must be at least :length characters and contain at least one uppercase character and one special character.', [
                'length' => $this->length,
            ]),
            $this->requireUppercase
            && $this->requireNumeric
            && $this->requireSpecialCharacter => __('The :attribute must be at least :length characters and contain at least one uppercase character, one number, and one special character.', [
                'length' => $this->length,
            ]),
            $this->requireNumeric
            && $this->requireSpecialCharacter
            && ! $this->requireUppercase => __('The :attribute must be at least :length characters and contain at least one special character and one number.', [
                'length' => $this->length,
            ]),
            default => __('The :attribute must be at least :length characters.', [
                'length' => $this->length,
            ]),
        };
    }
}
