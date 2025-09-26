<?php

namespace App\Rules;

use App\Models\User;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class MaxTasksUser implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $user = User::find($value);

        if ($user && $user->tasks()->where('is_completed', false)->count() >= 5) {
            $fail('El usuario ya tiene 5 o más tareas pendientes y no se le pueden asignar más.');
        }
    }
}
