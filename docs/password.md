use Illuminate\Validation\Rules\Password; 
 
 Password::defaults(function () {
            return Password::min(8)
                           ->mixedCase()
                           ->uncompromised();
        });


$request->validate([
    'password' => ['required', Password::defaults()],
]);

---

ZxcvbnPhp\Zxcvbn

ZxcvbnRule

https://github.com/bjeavons/zxcvbn-php
