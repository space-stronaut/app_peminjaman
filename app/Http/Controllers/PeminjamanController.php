<?php

namespace App\Http\Controllers;

use App\Models\Alat;
use App\Models\Peminjaman;
use Illuminate\Http\Request;
use PDF;

class PeminjamanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $peminjamans = Peminjaman::all();

        return view('peminjaman.index', compact('peminjamans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $alats = Alat::where('stok', '!=', 0)->get();

        return view('peminjaman.create', compact('alats'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        Peminjaman::create($data);

        return redirect()->route('peminjaman.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function validasi(Request $request, $id)
    {
        if ($request->status == 'disetujui') {
            $peminjaman = Peminjaman::find($id);
            $peminjaman->update([
                'status' => $request->status
            ]);
            $alat = Alat::find($peminjaman->alat_id);
            $hasil = $alat->stok - $peminjaman->jumlah_pinjam;

            Alat::find($peminjaman->alat_id)->update([
                'stok' => $hasil
            ]);

            return redirect()->back();
        }else{
            $peminjaman = Peminjaman::find($id);
            $peminjaman->update([
                'status' => $request->status
            ]);
            $alat = Alat::find($peminjaman->alat_id);
            $hasil = $alat->stok + $peminjaman->jumlah_pinjam;

            Alat::find($peminjaman->alat_id)->update([
                'stok' => $hasil
            ]);

            return redirect()->back();
        }
    }

    public function export($id)
    {
        $peminjaman = Peminjaman::find($id);
 
    	$pdf = PDF::loadview('pdf.peminjaman',['peminjaman'=>$peminjaman]);
    	return $pdf->download('laporan-peminjaman.pdf');
    }
}
