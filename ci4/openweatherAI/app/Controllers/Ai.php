<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\KmAi;

class Ai extends BaseController
{
    protected $km;
    public function __construct()
    {
        $this->km = new KmAi();
    }
    public function getsugestion($suhu = 0, $kelembapan = 0, $usia = 0, $jk = "laki-laki", $bb = 0, $tb = 0)
    {
        $data_sugestion = [];
        $total_air = 0;
        switch ($jk) {
            case "laki-laki":
                if ($usia >= 10 && $usia <= 12) {
                    $data_gizi = $this->km->where("ID", 5)->findAll();
                    foreach ($data_gizi as $dg) {
                        $total_air = $bb * $suhu * $kelembapan * $tb * ($dg["Air (ml)"]);
                        $data_sugestion["jml_air"] = $total_air;
                    }
                    $data_sugestion[] = $data_gizi[0];
                } elseif ($usia >= 13 && $usia <= 15) {
                    $data_gizi = $this->km->where("ID", 6)->findAll();
                    foreach ($data_gizi as $dg) {
                        $total_air = $bb * $suhu * $kelembapan * $tb * ($dg["Air (ml)"]);
                        $data_sugestion["jml_air"] = $total_air;
                    }
                    $data_sugestion[] = $data_gizi[0];
                } elseif ($usia >= 16 && $usia <= 18) {
                    $data_gizi = $this->km->where("ID", 7)->findAll();
                    foreach ($data_gizi as $dg) {
                        $total_air = $bb * $suhu * $kelembapan * $tb * ($dg["Air (ml)"]);
                        $data_sugestion["jml_air"] = $total_air;
                    }
                    $data_sugestion[] = $data_gizi[0];
                } elseif ($usia >= 19 && $usia <= 29) {
                    $data_gizi = $this->km->where("ID", 8)->findAll();
                    foreach ($data_gizi as $dg) {
                        $total_air = $bb * $suhu * $kelembapan * $tb * ($dg["Air (ml)"]);
                        $data_sugestion["jml_air"] = $total_air;
                    }
                    $data_sugestion[] = $data_gizi[0];
                } elseif ($usia >= 30 && $usia <= 49) {
                    $data_gizi = $this->km->where("ID", 9)->findAll();
                    foreach ($data_gizi as $dg) {
                        $total_air = $bb * $suhu * $kelembapan * $tb * ($dg["Air (ml)"]);
                        $data_sugestion["jml_air"] = $total_air;
                    }
                    $data_sugestion[] = $data_gizi[0];
                } elseif ($usia >= 50 && $usia <= 64) {
                    $data_gizi = $this->km->where("ID", 10)->findAll();
                    foreach ($data_gizi as $dg) {
                        $total_air = $bb * $suhu * $kelembapan * $tb * ($dg["Air (ml)"]);
                        $data_sugestion["jml_air"] = $total_air;
                    }

                    $data_sugestion[] = $data_gizi[0];
                } elseif ($usia >= 65  && $usia <= 80) {
                    $data_gizi = $this->km->where("ID", 11)->findAll();
                    foreach ($data_gizi as $dg) {
                        $total_air = $bb * $suhu * $kelembapan * $tb * ($dg["Air (ml)"]);
                        $data_sugestion["jml_air"] = $total_air;
                    }
                    $data_sugestion[] = $data_gizi[0];
                } elseif ($usia >= 80) {
                    $data_gizi = $this->km->where("ID", 12)->findAll();
                    foreach ($data_gizi as $dg) {
                        $total_air = $bb * $suhu * $kelembapan * $tb * ($dg["Air (ml)"]);
                        $data_sugestion["jml_air"] = $total_air;
                    }
                    $data_sugestion[] = $data_gizi[0];
                }
                break;

            case "perempuan":
                if ($usia >= 10 && $usia <= 12) {
                    $data_gizi = $this->km->where("ID", 13)->findAll();
                    foreach ($data_gizi as $dg) {
                        $total_air = $bb * $suhu * $kelembapan * $tb * ($dg["Air (ml)"]);
                        $data_sugestion["jml_air"] = $total_air;
                    }
                    $data_sugestion[] = $data_gizi[0];
                } elseif ($usia >= 13 && $usia <= 15) {
                    $data_gizi = $this->km->where("ID", 14)->findAll();
                    foreach ($data_gizi as $dg) {
                        $total_air = $bb * $suhu * $kelembapan * $tb * ($dg["Air (ml)"]);
                        $data_sugestion["jml_air"] = $total_air;
                    }
                    $data_sugestion[] = $data_gizi[0];
                } elseif ($usia >= 16 && $usia <= 18) {
                    $data_gizi = $this->km->where("ID", 15)->findAll();
                    foreach ($data_gizi as $dg) {
                        $total_air = $bb * $suhu * $kelembapan * $tb * ($dg["Air (ml)"]);
                        $data_sugestion["jml_air"] = $total_air;
                    }
                    $data_sugestion[] = $data_gizi;
                } elseif ($usia >= 19 && $usia <= 29) {
                    $data_gizi = $this->km->where("ID", 16)->findAll();
                    foreach ($data_gizi as $dg) {
                        $total_air = $bb * $suhu * $kelembapan * $tb * ($dg["Air (ml)"]);
                        $data_sugestion["jml_air"] = $total_air;
                    }
                    $data_sugestion[] = $data_gizi;
                } elseif ($usia >= 30 && $usia <= 49) {
                    $data_gizi = $this->km->where("ID", 17)->findAll();
                    foreach ($data_gizi as $dg) {
                        $total_air = $bb * $suhu * $kelembapan * $tb * ($dg["Air (ml)"]);
                        $data_sugestion["jml_air"] = $total_air;
                    }
                    $data_sugestion[] = $data_gizi;
                } elseif ($usia >= 50 && $usia <= 64) {
                    $data_gizi = $this->km->where("ID", 18)->findAll();
                    foreach ($data_gizi as $dg) {
                        $total_air = $bb * $suhu * $kelembapan * $tb * ($dg["Air (ml)"]);
                        $data_sugestion["jml_air"] = $total_air;
                    }

                    $data_sugestion[] = $data_gizi;
                } elseif ($usia >= 65  && $usia <= 80) {
                    $data_gizi = $this->km->where("ID", 19)->findAll();
                    foreach ($data_gizi as $dg) {
                        $total_air = $bb * $suhu * $kelembapan * $tb * ($dg["Air (ml)"]);
                        $data_sugestion["jml_air"] = $total_air;
                    }
                    $data_sugestion[] = $data_gizi;
                } elseif ($usia >= 80) {
                    $data_gizi = $this->km->where("ID", 20)->findAll();
                    foreach ($data_gizi as $dg) {
                        $total_air = $bb * $suhu * $kelembapan * $tb * ($dg["Air (ml)"]);
                        $data_sugestion["jml_air"] = $total_air;
                    }
                    $data_sugestion[] = $data_gizi;
                }
                break;
            default:
                echo "data anda tidak valid";
        }
        return $data_sugestion;
    }
    public function testing()
    {
        $tes = $this->getsugestion(30, 50, 17, "laki-laki", 40, 170);
        dd($tes);
    }
}
