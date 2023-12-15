<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penyewaan;
use PDF;
// use Barryvdh\DomPDF\Facade as PDF;

class LaporanController extends Controller
{
    public function cetak(Request $request)
    {
        $riwayat_penyewaan = Penyewaan::with('user','karangan_bunga')->get();

        $pdf =PDF::loadView('admin.laporan_pdf',['riwayat_penyewaan'=>$riwayat_penyewaan]);

        return $pdf->download('laporan_penyewaan.pdf');
    }

}
