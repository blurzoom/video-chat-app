<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted' => 'Це :attribute поле має бути прийнято.',
    'accepted_if' => 'Це :attribute поле має бути прийнято, коли :other є :value.',
    'active_url' => 'Це :attribute поле має бути дійсною URL-адресою.',
    'after' => 'Це :attribute поле має бути датою після :date.',
    'after_or_equal' => 'Це :attribute поле має бути датою після або дорівнювати :date.',
    'alpha' => 'Це :attribute поле має містити лише літери.',
    'alpha_dash' => 'Це :attribute поле має містити лише літери, цифри, тире та підкреслення.',
    'alpha_num' => 'Це :attribute поле повинно містити лише літери та цифри.',
    'array' => 'Це :attribute поле має бути масивом.',
    'ascii' => 'Це :attribute поле має містити лише однобайтові буквено-цифрові символи та символи.',
    'before' => 'Це :attribute поле має бути датою раніше :date.',
    'before_or_equal' => 'Це :attribute поле має передувати даті або дорівнювати їй :date.',
    'between' => [
        'array' => 'Це :attribute поле має бути між :min і :max елементів.',
        'file' => 'Це :attribute поле має бути між :min і :max кілобайт.',
        'numeric' => 'Це :attribute поле має бути між :min і :max.',
        'string' => 'Це :attribute поле має бути між :min і :max символів.',
    ],
    'boolean' => 'Це :attribute поле повинно мати значення вірно або хибно.',
    'can' => 'Це :attribute поле містить недозволене значення.',
    'confirmed' => 'Це :attribute підтвердження поля не збігається.',
    'current_password' => 'Це пароль неправильний.',
    'date' => 'Це :attribute у полі має бути дійсна дата.',
    'date_equals' => 'Це :attribute поле має бути датою, що дорівнює :date.',
    'date_format' => 'Це :attribute поле має відповідати формату :format.',
    'decimal' => 'Це :attribute поле повинно мати :decimal знаки після коми.',
    'declined' => 'Це :attribute поле має бути відхилено.',
    'declined_if' => 'Це :attribute поле має бути відхилено, коли :other є :value.',
    'different' => 'Це :attribute поле і :other повинні відрізнятися.',
    'digits' => 'Це :attribute поле повинно бути :digits цифри.',
    'digits_between' => 'Це :attribute поле має бути між :min і :max цифри.',
    'dimensions' => 'Це :attribute поле містить недійсні розміри зображення.',
    'distinct' => 'Це :attribute поле має повторюване значення.',
    'doesnt_end_with' => 'Це :attribute поле не має закінчуватися одним із наведених нижче: :values.',
    'doesnt_start_with' => 'Це :attribute поле не має починатися з одного з наступних: :values.',
    'email' => 'Це :attribute поле має бути дійсною електронною адресою.',
    'ends_with' => 'Це :attribute поле має закінчуватися одним із наведених нижче: :values.',
    'enum' => 'Цей вибраний :attribute є недійсним.',
    'exists' => 'Це вибраний :attribute є недійсним.',
    'file' => 'Це :attribute поле має бути файлом.',
    'filled' => 'Це :attribute field must have a value.',
    'gt' => [
        'array' => 'Це :attribute поле повинно містити більше ніж :value елементів.',
        'file' => 'Це :attribute field must be greater than :value kilobytes.',
        'numeric' => 'Це :attribute field must be greater than :value.',
        'string' => 'Це :attribute field must be greater than :value characters.',
    ],
    'gte' => [
        'array' => 'Це :attribute field must have :value items or more.',
        'file' => 'Це :attribute field must be greater than or equal to :value kilobytes.',
        'numeric' => 'Це :attribute field must be greater than or equal to :value.',
        'string' => 'Це :attribute field must be greater than or equal to :value characters.',
    ],
    'image' => 'Це :attribute field must be an image.',
    'in' => 'Це selected :attribute is invalid.',
    'in_array' => 'Це :attribute field must exist in :other.',
    'integer' => 'Це :attribute field must be an integer.',
    'ip' => 'Це :attribute field must be a valid IP address.',
    'ipv4' => 'Це :attribute field must be a valid IPv4 address.',
    'ipv6' => 'Це :attribute field must be a valid IPv6 address.',
    'json' => 'Це :attribute field must be a valid JSON string.',
    'lowercase' => 'Це :attribute field must be lowercase.',
    'lt' => [
        'array' => 'Це :attribute field must have less than :value items.',
        'file' => 'Це :attribute field must be less than :value kilobytes.',
        'numeric' => 'Це :attribute field must be less than :value.',
        'string' => 'Це :attribute field must be less than :value characters.',
    ],
    'lte' => [
        'array' => 'Це :attribute field must not have more than :value items.',
        'file' => 'Це :attribute field must be less than or equal to :value kilobytes.',
        'numeric' => 'Це :attribute field must be less than or equal to :value.',
        'string' => 'Це :attribute field must be less than or equal to :value characters.',
    ],
    'mac_address' => 'Це :attribute field must be a valid MAC address.',
    'max' => [
        'array' => 'Це :attribute field must not have more than :max items.',
        'file' => 'Це :attribute field must not be greater than :max kilobytes.',
        'numeric' => 'Це :attribute field must not be greater than :max.',
        'string' => 'Це :attribute поле не повинно бути більше ніж :max символів.',
    ],
    'max_digits' => 'Це :attribute field must not have more than :max digits.',
    'mimes' => 'Це :attribute field must be a file of type: :values.',
    'mimetypes' => 'Це :attribute field must be a file of type: :values.',
    'min' => [
        'array' => 'Це :attribute поле повинно мати принаймні :min елементів.',
        'file' => 'Це :attribute field must be at least :min kilobytes.',
        'numeric' => 'Це :attribute поле повинно бути принаймні :min.',
        'string' => 'Це :attribute поле повинно бути принаймні :min символів.',
    ],
    'min_digits' => 'Це :attribute поле повинно мати принаймні :min цифри.',
    'missing' => 'Це :attribute field must be missing.',
    'missing_if' => 'Це :attribute field must be missing when :other is :value.',
    'missing_unless' => 'Це :attribute field must be missing unless :other is :value.',
    'missing_with' => 'Це :attribute field must be missing when :values is present.',
    'missing_with_all' => 'Це :attribute field must be missing when :values are present.',
    'multiple_of' => 'Це :attribute field must be a multiple of :value.',
    'not_in' => 'Це selected :attribute is invalid.',
    'not_regex' => 'Це :attribute field format is invalid.',
    'numeric' => 'Це :attribute field must be a number.',
    'password' => [
        'letters' => 'Це :attribute поле повинно містити хоча б одну літеру.',
        'mixed' => 'Це :attribute поле має містити принаймні одну велику та одну малу літери.',
        'numbers' => 'Це :attribute поле повинно містити хоча б одне число.',
        'symbols' => 'Це :attribute поле повинно містити принаймні один символ.',
        'uncompromised' => 'Даний :attribute з\'явився в результаті витоку даних. Виберіть інше :attribute.',
    ],
    'present' => 'Це :attribute field must be present.',
    'prohibited' => 'Це :attribute field is prohibited.',
    'prohibited_if' => 'Це :attribute field is prohibited when :other is :value.',
    'prohibited_unless' => 'Це :attribute field is prohibited unless :other is in :values.',
    'prohibits' => 'Це :attribute field prohibits :other from being present.',
    'regex' => 'Це :attribute field format is invalid.',
    'required' => 'Це :attribute поле обов\'язкове.',
    'required_array_keys' => 'Це :attribute field must contain entries for: :values.',
    'required_if' => 'Це :attribute field is required when :other is :value.',
    'required_if_accepted' => 'Це :attribute field is required when :other is accepted.',
    'required_unless' => 'Це :attribute field is required unless :other is in :values.',
    'required_with' => 'Це :attribute field is required when :values is present.',
    'required_with_all' => 'Це :attribute field is required when :values are present.',
    'required_without' => 'Це :attribute field is required when :values is not present.',
    'required_without_all' => 'Це :attribute field is required when none of :values are present.',
    'same' => 'Це :attribute поле має збігатися :other.',
    'size' => [
        'array' => 'Це :attribute field must contain :size items.',
        'file' => 'Це :attribute field must be :size kilobytes.',
        'numeric' => 'Це :attribute field must be :size.',
        'string' => 'Це :attribute поле повинно бути :size characters.',
    ],
    'starts_with' => 'Це :attribute field must start with one of the following: :values.',
    'string' => 'Це :attribute field must be a string.',
    'timezone' => 'Це :attribute field must be a valid timezone.',
    'unique' => 'Це :attribute вже взято.',
    'uploaded' => 'Це :attribute failed to upload.',
    'uppercase' => 'Це :attribute field must be uppercase.',
    'url' => 'Це :attribute field must be a valid URL.',
    'ulid' => 'Це :attribute field must be a valid ULID.',
    'uuid' => 'Це :attribute field must be a valid UUID.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [],

];
