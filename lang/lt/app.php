<?php

return [
    'dashboard' => [
        'title' => 'Pagrindinis',
        'text' => 'Esate prisijungę prie PVM sąskaitų valdymo sistemos sistemos',
    ],
    'login' => [
        'title' => 'Prisijungti',
        'email' => 'El. paštas',
        'password' => 'Slaptažodis',
        'submit' => 'Prisijungti',
    ],
    'register' => [
        'title' => 'Registracija',
        'name' => 'Vardas',
        'email' => 'El. paštas',
        'password' => 'Slaptažodis',
        'confirm_password' => 'Patvirtinti slaptažodį',
        'submit' => 'Užsiregistruoti',
    ],
    'system' => 'Sąskaitų išrašymo sistema',
    'admin_subsystem' => 'Administratoriaus posistėmis',
    'client_subsystem' => 'Kliento posistėmis',
    'accountant_subsystem' => 'Buhalterio posistėmis',
    'home' => 'Titulinis',
    'logout' => 'Atsijungti',
    'errors' => [
        '403' => 'Prieiga draudžiama',
        '500' => 'Serverio klaida',
    ],
    'admin' => [
        'user_admin' => 'Naudotojų valdymas',
        'client_admin' => 'Klientų ir sąskaitų valdymas',
        'functions' => 'Administravimo funkcijos',
        'user' => [
            'title' => 'Naudotojų valdymas',
            'name_surname' => 'vardas, pavardė',
            'roles' => 'vaidmenys',
            'edit' => 'Redaguoti',
            'edit_title' => 'Naudotojo redagavimas',
            'role_select' => 'Vaidmenys',
            'update' => 'Atnaujinti',
            'name' => 'Vardas',
            'name_placeholder' => 'Įveskite vardą',
            'surname' => 'Pavardė',
            'surname_placeholder' => 'Įveskite pavardę',
            'email' => 'El. pašto adresas',
            'email_placeholder' => 'Įveskite el. pašto adresą',
            'updated_success' => 'Naudotojo duomenys atnaujinti',
            'user_list' => 'Naudotojų sąrašas',
            'list' => 'Naudotojų sąrašas',
        ],
        'client' => [
            'title' => 'Klientų ir sąskaitų valdymas',
            'profile' => 'Kliento profilis',
            'name_surname' => 'vardas, pavardė',
            'list' => 'Klientų sąrašas',
            'bills' => 'Sąskaitos',
            'profile_button' => 'Profilis',
            'empty' => 'Kliento profilis tuščias',
            'client_data' => 'Kliento profilio duomenys',
            'edit' => 'Redaguoti',
            'create' => 'Užpildyti',
            'update' => 'Atnaujinti',
            'save' => 'Išsaugoti',
            'company' => 'Vardas, pavardė / Įmonė',
            'address' => 'Adresas',
            'address_placeholder' => 'Įveskite adresą',
            'company_code' => 'Įmonės kodas',
            'company_code_placeholder' => 'Įveskite įmonės kodą',
            'vat_nr' => 'Mokėtojo kodas',
            'vat_nr_placeholder' => 'Įveskite mokėtojo kodą',
            'edit_title' => 'Kliento duomenų redagavimas',
            'create_title' => 'Kliento duomenų pildymas',
            'updated_success' => 'Kliento duomenys sėkmingai išsaugoti',
        ],
        'bill' => [
            'title' => 'Sąskaitų sąrašas',
            'date' => 'Data',
            'show' => 'Peržiūrėti',
            'list' => 'Sąskaitų sąrašas',
            'edit' => 'Redaguoti',
            'empty' => 'Sąskaitų nėra',
            'create' => 'Sukurti sąskaitą',
            'update' => 'Atnaujinti sąskaitą',
            'delete' => 'Ištrinti',
            'create_not_allowed' => 'Negalima sukurti sąskaitą. Nėra kliento duomenų',
            'deleted_success' => 'Sąskaita pašalinta',
            'delete_error' => 'Negalima pašalinti. Sąskaita yra apmokėta.',
            'create_title' => 'Sąskaitos pildymas',
            'update_title' => 'Sąskaitos duomenų atnaujinimas',
            'save' => 'Išsaugoti',
            'bill_date' => 'Sąskaitos data',
            'bill_date_placeholder' => 'Pasirinkite datą',
            'invoice_nr' => 'Serijos numeris',
            'invoice_nr_placeholder' => 'Įveskite serijos numerį',
            'bank_acc_nr' => 'Banko sąskaita',
            'bank_acc_nr_placeholder' => 'Įveskite banko sąskaitą',
            'payment_purpose' => 'Mokėjimo paskirtis',
            'payment_purpose_placeholder' => 'Įveskite mokėjimo paskirtį',
            'update_error' => 'Negalima atnaujinti. Sąskaita yra apmokėta.',
            'updated_success' => 'Sąskaita atnaujinta',
            'created_success' => 'Sąskaita sukurta',
            'delete_product' => 'Ištrinti',
            'products' => 'Prėkių sąrašas',
            'name' => 'Prekės pavadinimas',
            'amount' => 'Kiekis',
            'price' => 'Kaina (vnt., be PVM)',
            'name_placeholder' => 'Įveskite prekės pavadinimą',
            'amount_placeholder' => 'Įveskite kiekį',
            'price_placeholder' => 'Įveskite kainą be PVM',
            'add_product' => 'Pridėti produktą',
            'count' => 'Iš viso sąskaitų',
            'empty_products' => 'Produktų sąrašas tuščias',
        ],
    ],
    'roles' => [
        'administrator' => 'Administratorius',
        'client' => 'Klientas',
        'accountant' => 'Buhalteris',
    ],
    'client' => [
        'bills' => 'Mano sąskaitos',
        'title' => 'Kliento posistemis',
        'bill' => [
            'show_title' => 'Sąskaitos peržiūra',
            'show' => 'Peržiūrėti',
            'bill_date' => 'Sąskaitos data',
            'invoice_nr' => 'Serijos numeris',
            'bank_acc_nr' => 'Banko sąskaita',
            'payment_purpose' => 'Mokėjimo paskirtis',
            'product_list' => 'Produktų sąrašas',
            'empty_products' => 'Produktų sąrašas tuščias',
            'cannot_pay_bill' => 'Negalima apmokėti sąsakaitos. Nėra produktų.',
            'pay' => 'Apmokėti sąskaitą',
            'paid' => 'Sąskaita apmokėta',
            'not_paid' => 'Sąskaita neapmokėta',
            'paid_short' => 'Apmokėta',
            'not_paid_short' => 'Neapmokėta',
            'error_already_paid' => 'Klaida. Sąskaita jau yra apmokėta!',
            'success_paid' => 'Sąskaita sėkmingai apmokėta!',
            'product' => [
                'name' => 'Prekės pavadinimas',
                'amount' => 'Kiekis (vnt.)',
                'price' => 'Kaina (be PVM) Eur',
                'sum_price' => 'Suma (be PVM) Eur',
                'vat' => 'PVM tarifas (%)',
                'sum' => 'Suma Eur',
                'general_sum' => 'Bendra suma Eur',
            ],
        ],
    ],
    'accountant' => [
        'client_list' => 'Klientų sąrašas',
        'client' => [
            'title' => 'Klientų ir sąskaitų valdymas',
            'profile' => 'Kliento profilis',
            'name_surname' => 'vardas, pavardė',
            'list' => 'Klientų sąrašas',
            'bills' => 'Sąskaitos',
            'profile_button' => 'Profilis',
            'empty' => 'Kliento profilis tuščias',
            'client_data' => 'Kliento profilio duomenys',
            'company' => 'Vardas, pavardė / Įmonė',
            'address' => 'Adresas',
            'address_placeholder' => 'Įveskite adresą',
            'company_code' => 'Įmonės kodas',
            'company_code_placeholder' => 'Įveskite įmonės kodą',
            'vat_nr' => 'Mokėtojo kodas',
            'vat_nr_placeholder' => 'Įveskite mokėtojo kodą',
            'pay' => 'Apmokėti sąskaitą',
            'paid' => 'Sąskaita apmokėta',
            'not_paid' => 'Sąskaita neapmokėta',
            'paid_short' => 'Apmokėta',
            'not_paid_short' => 'Neapmokėta',
        ],
    ],
    'back' => 'Grįžti atgal',
];
