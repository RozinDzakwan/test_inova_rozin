<?php

namespace App\Http\Controllers\pegawai;

use App\Http\Controllers\Controller;
use App\Models\Pasien;
use App\Models\Tindakan;
use Illuminate\Http\Request;

class PegawaiDashboardController extends Controller
{

    public function index()
    {
        $totalPasien = Pasien::all()->count();
        // dd($coba);
        $dataObat = Tindakan::where('status', 'transaksi selesai')->get();
        $totalBayar = 0;
        $totalJumlah = 0;
        foreach ($dataObat as $data) {
            $array = 0;
            $pecahJumlah = explode(',', $data->jumlah_obat);
            $pecahBayar = explode(',', $data->total);
            foreach ($pecahJumlah as $dataJumlah) {
                $totalJumlah += (int)$dataJumlah;
                $totalBayar += (int)$pecahBayar[$array] * (int)$dataJumlah;
                $array++;
            }
        }
        $Sidebar = "none";
        $data01 = Tindakan::whereMonth('updated_at', '01')->count();
        $data02 = Tindakan::whereMonth('updated_at', '02')->count();
        $data03 = Tindakan::whereMonth('updated_at', '03')->count();
        $data04 = Tindakan::whereMonth('updated_at', '04')->count();
        $data05 = Tindakan::whereMonth('updated_at', '05')->count();
        $data06 = Tindakan::whereMonth('updated_at', '06')->count();
        $data07 = Tindakan::whereMonth('updated_at', '07')->count();
        $data08 = Tindakan::whereMonth('updated_at', '08')->count();
        $data09 = Tindakan::whereMonth('updated_at', '09')->count();
        $data10 = Tindakan::whereMonth('updated_at', '10')->count();
        $data11 = Tindakan::whereMonth('updated_at', '11')->count();
        $data12 = Tindakan::whereMonth('updated_at', '12')->count();

        $dataPoints = [
            ['label' => 'Januari', 'y' => $data01],
            ['label' => 'Februari', 'y' => $data02],
            ['label' => 'Maret', 'y' => $data03],
            ['label' => 'April', 'y' => $data04],
            ['label' => 'Mei', 'y' => $data05],
            ['label' => 'Juni', 'y' => $data06],
            ['label' => 'Juli', 'y' => $data07],
            ['label' => 'Agustus', 'y' => $data08],
            ['label' => 'September', 'y' => $data09],
            ['label' => 'Obtober', 'y' => $data10],
            ['label' => 'November', 'y' => $data11],
            ['label' => 'Desember', 'y' => $data12]
        ];
        return view('pegawai.Dashboard', compact('Sidebar', 'totalPasien', 'dataPoints', 'totalBayar', 'totalJumlah'));
    }
}
