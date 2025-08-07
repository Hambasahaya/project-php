<?php

namespace App\Helpers;

class FaceHelper
{
    /**
     * Hitung jarak Euclidean antara dua vektor 128-dimensi.
     *
     * @param array $vector1
     * @param array $vector2
     * @return float
     */
    public static function euclideanDistance(array $vector1, array $vector2): float
    {
        if (count($vector1) !== 128 || count($vector2) !== 128) {
            throw new \InvalidArgumentException('Face descriptor harus 128 dimensi.');
        }

        $sum = 0.0;

        for ($i = 0; $i < 128; $i++) {
            $diff = $vector1[$i] - $vector2[$i];
            $sum += $diff * $diff;
        }

        return sqrt($sum);
    }
}
