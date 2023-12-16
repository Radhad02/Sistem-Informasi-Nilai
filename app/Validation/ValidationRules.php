<?php

namespace App\Validation;

use CodeIgniter\Validation\Rules;

class ValidationRules extends Rules
{
    public function is_valid_birth_date(string $str): bool
    {
        // Ubah tanggal lahir menjadi objek DateTime
        $birthdate = new \DateTime($str);

        // Tentukan tahun maksimum yang diizinkan
        $maxYear = 2006;

        // Periksa apakah tahun kelahiran melebihi tahun maksimum
        return $birthdate->format('Y') <= $maxYear;
    }
}
