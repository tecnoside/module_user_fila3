<?php

declare(strict_types=1);

namespace Modules\User\Models\Traits;

use Illuminate\Contracts\Validation\Rule;
use Modules\User\Models\Rules\Password;

trait PasswordValidationRules
{
    /**
     * Get the validation rules used to validate passwords.
     *
     * @return array<int, (Rule|array|string)>
     */
    protected function passwordRules(): array
    {
        return ['required', 'string', new Password(), 'confirmed'];
    }
}
