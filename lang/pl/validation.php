<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Komunikaty językowe dla walidacji
    |--------------------------------------------------------------------------
    |
    | Poniższe linie językowe zawierają domyślne komunikaty błędów używane przez
    | klasę walidatora. Niektóre z tych reguł mają kilka wersji, takich
    | jak reguły dotyczące rozmiaru. Możesz dostosować każdy z tych komunikatów tutaj.
    |
    */

    'accepted' => 'Pole :attribute musi być zaakceptowane.',
    'accepted_if' => 'Pole :attribute musi być zaakceptowane, gdy :other wynosi :value.',
    'active_url' => 'Pole :attribute musi być poprawnym adresem URL.',
    'after' => 'Pole :attribute musi być datą po :date.',
    'after_or_equal' => 'Pole :attribute musi być datą po lub równą :date.',
    'alpha' => 'Pole :attribute może zawierać tylko litery.',
    'alpha_dash' => 'Pole :attribute może zawierać tylko litery, cyfry, myślniki i podkreślenia.',
    'alpha_num' => 'Pole :attribute może zawierać tylko litery i cyfry.',
    'array' => 'Pole :attribute musi być tablicą.',
    'ascii' => 'Pole :attribute może zawierać tylko pojedyncze znaki alfanumeryczne i symbole.',
    'before' => 'Pole :attribute musi być datą przed :date.',
    'before_or_equal' => 'Pole :attribute musi być datą przed lub równą :date.',
    'between' => [
        'array' => 'Pole :attribute musi zawierać od :min do :max elementów.',
        'file' => 'Pole :attribute musi mieć rozmiar od :min do :max kilobajtów.',
        'numeric' => 'Pole :attribute musi mieć wartość od :min do :max.',
        'string' => 'Pole :attribute musi mieć od :min do :max znaków.',
    ],
    'boolean' => 'Pole :attribute musi być prawdą lub fałszem.',
    'confirmed' => 'Potwierdzenie pola :attribute nie pasuje.',
    'current_password' => 'Hasło jest nieprawidłowe.',
    'date' => 'Pole :attribute musi być prawidłową datą.',
    'date_equals' => 'Pole :attribute musi być datą równą :date.',
    'date_format' => 'Pole :attribute musi mieć format :format.',
    'decimal' => 'Pole :attribute musi mieć :decimal miejsc po przecinku.',
    'declined' => 'Pole :attribute musi być odrzucone.',
    'declined_if' => 'Pole :attribute musi być odrzucone, gdy :other wynosi :value.',
    'different' => 'Pole :attribute i :other muszą być różne.',
    'digits' => 'Pole :attribute musi mieć :digits cyfr.',
    'digits_between' => 'Pole :attribute musi mieć od :min do :max cyfr.',
    'dimensions' => 'Pole :attribute ma nieprawidłowe wymiary obrazu.',
    'distinct' => 'Pole :attribute ma zduplikowaną wartość.',
    'doesnt_end_with' => 'Pole :attribute nie może kończyć się jednym z tych: :values.',
    'doesnt_start_with' => 'Pole :attribute nie może zaczynać się jednym z tych: :values.',
    'email' => 'Pole :attribute musi być poprawnym adresem email.',
    'ends_with' => 'Pole :attribute musi kończyć się jednym z tych: :values.',
    'enum' => 'Wybrana opcja :attribute jest nieprawidłowa.',
    'exists' => 'Wybrana opcja :attribute jest nieprawidłowa.',
    'file' => 'Pole :attribute musi być plikiem.',
    'filled' => 'Pole :attribute musi mieć wartość.',
    'gt' => [
        'array' => 'Pole :attribute musi zawierać więcej niż :value elementów.',
        'file' => 'Pole :attribute musi mieć rozmiar większy niż :value kilobajtów.',
        'numeric' => 'Pole :attribute musi mieć wartość większą niż :value.',
        'string' => 'Pole :attribute musi mieć więcej niż :value znaków.',
    ],
    'gte' => [
        'array' => 'Pole :attribute musi zawierać co najmniej :value elementów.',
        'file' => 'Pole :attribute musi mieć rozmiar większy lub równy :value kilobajtów.',
        'numeric' => 'Pole :attribute musi mieć wartość większą lub równą :value.',
        'string' => 'Pole :attribute musi mieć co najmniej :value znaków.',
    ],
    'image' => 'Pole :attribute musi być obrazem.',
    'in' => 'Wybrana opcja :attribute jest nieprawidłowa.',
    'in_array' => 'Pole :attribute musi istnieć w :other.',
    'integer' => 'Pole :attribute musi być liczbą całkowitą.',
    'ip' => 'Pole :attribute musi być poprawnym adresem IP.',
    'ipv4' => 'Pole :attribute musi być poprawnym adresem IPv4.',
    'ipv6' => 'Pole :attribute musi być poprawnym adresem IPv6.',
    'json' => 'Pole :attribute musi być poprawnym ciągiem JSON.',
    'lowercase' => 'Pole :attribute musi być pisane małymi literami.',
    'lt' => [
        'array' => 'Pole :attribute musi zawierać mniej niż :value elementów.',
        'file' => 'Pole :attribute musi mieć rozmiar mniejszy niż :value kilobajtów.',
        'numeric' => 'Pole :attribute musi mieć wartość mniejszą niż :value.',
        'string' => 'Pole :attribute musi mieć mniej niż :value znaków.',
    ],
    'lte' => [
        'array' => 'Pole :attribute nie może zawierać więcej niż :value elementów.',
        'file' => 'Pole :attribute musi mieć rozmiar mniejszy lub równy :value kilobajtów.',
        'numeric' => 'Pole :attribute musi mieć wartość mniejszą lub równą :value.',
        'string' => 'Pole :attribute musi mieć mniej lub równo :value znaków.',
    ],
    'mac_address' => 'Pole :attribute musi być poprawnym adresem MAC.',
    'max' => [
        'array' => 'Pole :attribute nie może zawierać więcej niż :max elementów.',
        'file' => 'Pole :attribute nie może mieć rozmiaru większego niż :max kilobajtów.',
        'numeric' => 'Pole :attribute nie może mieć wartości większej niż :max.',
        'string' => 'Pole :attribute nie może mieć więcej niż :max znaków.',
    ],
    'max_digits' => 'Pole :attribute nie może zawierać więcej niż :max cyfr.',
    'mimes' => 'Pole :attribute musi być plikiem typu: :values.',
    'mimetypes' => 'Pole :attribute musi być plikiem typu: :values.',
    'min' => [
        'array' => 'Pole :attribute musi zawierać co najmniej :min elementów.',
        'file' => 'Pole :attribute musi mieć rozmiar co najmniej :min kilobajtów.',
        'numeric' => 'Pole :attribute musi mieć wartość co najmniej :min.',
        'string' => 'Pole :attribute musi mieć co najmniej :min znaków.',
    ],
    'min_digits' => 'Pole :attribute musi zawierać co najmniej :min cyfr.',
    'missing' => 'Pole :attribute musi być brakujące.',
    'missing_if' => 'Pole :attribute musi być brakujące, gdy :other wynosi :value.',
    'missing_unless' => 'Pole :attribute musi być brakujące, chyba że :other jest w :values.',
    'missing_with' => 'Pole :attribute musi być brakujące, gdy :values jest obecne.',
    'missing_with_all' => 'Pole :attribute musi być brakujące, gdy obecne są :values.',
    'multiple_of' => 'Pole :attribute musi być wielokrotnością :value.',
    'not_in' => 'Wybrana opcja :attribute jest nieprawidłowa.',
    'not_regex' => 'Format pola :attribute jest nieprawidłowy.',
    'numeric' => 'Pole :attribute musi być liczbą.',
    'password' => [
        'letters' => 'Pole :attribute musi zawierać co najmniej jedną literę.',
        'mixed' => 'Pole :attribute musi zawierać co najmniej jedną wielką literę i jedną małą literę.',
        'numbers' => 'Pole :attribute musi zawierać co najmniej jedną cyfrę.',
        'symbols' => 'Pole :attribute musi zawierać co najmniej jeden symbol.',
        'uncompromised' => 'Podane :attribute pojawiło się w przecieku danych. Proszę wybrać inne :attribute.',
    ],
    'present' => 'Pole :attribute musi być obecne.',
    'prohibited' => 'Pole :attribute jest zabronione.',
    'prohibited_if' => 'Pole :attribute jest zabronione, gdy :other wynosi :value.',
    'prohibited_unless' => 'Pole :attribute jest zabronione, chyba że :other jest w :values.',
    'prohibits' => 'Pole :attribute zabrania obecności :other.',
    'regex' => 'Format pola :attribute jest nieprawidłowy.',
    'required' => 'Pole :attribute jest wymagane.',
    'required_array_keys' => 'Pole :attribute musi zawierać wpisy dla: :values.',
    'required_if' => 'Pole :attribute jest wymagane, gdy :other wynosi :value.',
    'required_if_accepted' => 'Pole :attribute jest wymagane, gdy :other jest zaakceptowane.',
    'required_unless' => 'Pole :attribute jest wymagane, chyba że :other jest w :values.',
    'required_with' => 'Pole :attribute jest wymagane, gdy :values jest obecne.',
    'required_with_all' => 'Pole :attribute jest wymagane, gdy obecne są :values.',
    'required_without' => 'Pole :attribute jest wymagane, gdy :values nie jest obecne.',
    'required_without_all' => 'Pole :attribute jest wymagane, gdy żadne z :values nie jest obecne.',
    'same' => 'Pole :attribute musi być takie samo jak :other.',
    'size' => [
        'array' => 'Pole :attribute musi zawierać :size elementów.',
        'file' => 'Pole :attribute musi mieć rozmiar :size kilobajtów.',
        'numeric' => 'Pole :attribute musi mieć wartość :size.',
        'string' => 'Pole :attribute musi mieć :size znaków.',
    ],
    'starts_with' => 'Pole :attribute musi zaczynać się jednym z tych: :values.',
    'string' => 'Pole :attribute musi być ciągiem znaków.',
    'timezone' => 'Pole :attribute musi być poprawną strefą czasową.',
    'unique' => ':Attribute został już użyty.',
    'uploaded' => 'Przesyłanie :attribute nie powiodło się.',
    'uppercase' => 'Pole :attribute musi być napisane wielkimi literami.',
    'url' => 'Pole :attribute musi być poprawnym adresem URL.',
    'ulid' => 'Pole :attribute musi być poprawnym ULID.',
    'uuid' => 'Pole :attribute musi być poprawnym UUID.',

    /*
    |--------------------------------------------------------------------------
    | Dostosowane komunikaty językowe dla walidacji
    |--------------------------------------------------------------------------
    |
    | Tutaj możesz określić niestandardowe komunikaty walidacji dla atrybutów,
    | korzystając z konwencji "attribute.rule" w nazwach linii. Ułatwia to
    | określenie niestandardowego komunikatu językowego dla konkretnej reguły atrybutu.
    |
    */

    'custom' => [
        'nazwa-atrybutu' => [
            'nazwa-reguły' => 'niestandardowa-wiadomość',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Niestandardowe atrybuty walidacji
    |--------------------------------------------------------------------------
    |
    | Poniższe linie językowe są używane do zamiany atrybutu na bardziej przyjazny
    | czytelnikowi, na przykład zamiast "email" możesz użyć "Adres e-mail", co
    | pomaga tworzyć bardziej zrozumiałe komunikaty.
    |
    */

    'attributes' => [],

];
