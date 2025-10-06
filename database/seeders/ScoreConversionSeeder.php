<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\ScoreConversion;

class ScoreConversionSeeder extends Seeder
{
    public function run(): void
    {
        // Kosongkan tabel untuk menghindari duplikat
        ScoreConversion::truncate();

        $scores = [];

        // Data Listening (Section 1)
        for ($i = 50; $i >= 0; $i--) {
            $scoreMap = [50 => 68, 49 => 67, 48 => 67, 47 => 66, 46 => 65, 45 => 63, 44 => 62, 43 => 61, 42 => 60, 41 => 59, 40 => 58, 39 => 57, 38 => 57, 37 => 56, 36 => 55, 35 => 54, 34 => 54, 33 => 53, 32 => 52, 31 => 52, 30 => 51, 29 => 51, 28 => 50, 27 => 49, 26 => 49, 25 => 48, 24 => 48, 23 => 47, 22 => 47, 21 => 46, 20 => 45, 19 => 45, 18 => 44, 17 => 43, 16 => 43, 15 => 42, 14 => 41, 13 => 41, 12 => 40, 11 => 38, 10 => 37, 9 => 35, 8 => 33, 7 => 32, 6 => 30, 5 => 29, 4 => 28, 3 => 27, 2 => 26, 1 => 25, 0 => 24];
            if (isset($scoreMap[$i])) {
                $scores[] = ['section' => 'listening', 'correct_answers' => $i, 'converted_score' => $scoreMap[$i]];
            }
        }

        // Data Structure (Section 2)
        for ($i = 40; $i >= 0; $i--) {
            $scoreMap = [40 => 68, 39 => 67, 38 => 65, 37 => 63, 36 => 61, 35 => 60, 34 => 58, 33 => 57, 32 => 56, 31 => 55, 30 => 54, 29 => 53, 28 => 52, 27 => 51, 26 => 50, 25 => 49, 24 => 48, 23 => 47, 22 => 46, 21 => 45, 20 => 44, 19 => 43, 18 => 42, 17 => 41, 16 => 40, 15 => 38, 14 => 37, 13 => 36, 12 => 35, 11 => 33, 10 => 32, 9 => 31, 8 => 29, 7 => 27, 6 => 26, 5 => 25, 4 => 23, 3 => 22, 2 => 21, 1 => 20, 0 => 20];
            if (isset($scoreMap[$i])) {
                $scores[] = ['section' => 'structure', 'correct_answers' => $i, 'converted_score' => $scoreMap[$i]];
            }
        }

        // Data Reading (Section 3)
        for ($i = 50; $i >= 0; $i--) {
            $scoreMap = [50 => 67, 49 => 66, 48 => 65, 47 => 63, 46 => 61, 45 => 60, 44 => 59, 43 => 58, 42 => 57, 41 => 56, 40 => 55, 39 => 54, 38 => 54, 37 => 53, 36 => 52, 35 => 52, 34 => 51, 33 => 50, 32 => 49, 31 => 48, 30 => 48, 29 => 47, 28 => 46, 27 => 46, 26 => 45, 25 => 45, 24 => 44, 23 => 43, 22 => 43, 21 => 42, 20 => 42, 19 => 41, 18 => 40, 17 => 39, 16 => 38, 15 => 37, 14 => 35, 13 => 34, 12 => 32, 11 => 31, 10 => 30, 9 => 29, 8 => 28, 7 => 27, 6 => 26, 5 => 25, 4 => 24, 3 => 23, 2 => 23, 1 => 22, 0 => 22];
            if (isset($scoreMap[$i])) {
                $scores[] = ['section' => 'reading', 'correct_answers' => $i, 'converted_score' => $scoreMap[$i]];
            }
        }

        // Masukkan semua data sekaligus ke database
        ScoreConversion::insert($scores);
    }
}
