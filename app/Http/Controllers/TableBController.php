<?php

namespace App\Http\Controllers;

use App\Models\TableB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PhpOffice\PhpSpreadsheet\IOFactory;

class TableBController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = DB::table('table_b')
            // ->paginate(10);
            ->get();
        // dd($data);
        return view('PenjualanB.index', [
            'data' => $data,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $tableA = DB::table('table_a')
            // ->paginate(10);
            ->get();
        return view('PenjualanB.tambah', [
            'tableA' => $tableA,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $data = $request->collect();
        $cekB = DB::table('table_b')->get();

        if ($cekB->contains('kode_toko', $data['kode_toko'])) {
            return redirect()->route('tableB.index')->with('status', 'nominal penjualan sudah di set');
        } else {
            DB::table('table_b')
                ->insert(
                    array(
                        'kode_toko' => $data['kode_toko'],
                        'nominal_transaksi' => $data['nominal_transaksi'],

                    )
                );

            return redirect()->route('tableB.index')->with('status', 'Berhasil menambahkan Penjualan');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TableB  $tableB
     * @return \Illuminate\Http\Response
     */
    public function show(TableB $tableB)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TableB  $tableB
     * @return \Illuminate\Http\Response
     */
    public function edit(TableB $tableB)
    {
        //
        $tableA = DB::table('table_a')
            // ->paginate(10);
            ->get();
        return view('PenjualanB.edit', [
            'tableA' => $tableA,
            'tableB' => $tableB,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TableB  $tableB
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TableB $tableB)
    {
        //
        $data = $request->collect();
        DB::table('table_b')
            ->where('kode_toko', $tableB['kode_toko'])
            ->update(
                array(
                    'kode_toko' => $data['kode_toko'],
                    'nominal_transaksi' => $data['nominal_transaksi'],
                )
            );
        return redirect()->route('tableB.index')->with('status', 'Berhasil mengubah penjualan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TableB  $tableB
     * @return \Illuminate\Http\Response
     */
    public function destroy(TableB $tableB)
    {
        //
        DB::table('table_b')->where('kode_toko', $tableB['kode_toko'])->delete();
        // $tableA->delete();
        return redirect()->route('tableB.index')->with('status', 'Berhasil menghapus Penjualan');
    }

    public function viewExcelB(Request $request)
    {
        return view('PenjualanB.excel');
    }
    public function excelUploadB(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xls,xlsx',
        ]);

        $file = $request->file('file');

        $spreadsheet = IOFactory::load($file);
        $sheet = $spreadsheet->getActiveSheet();

        foreach ($sheet->toArray() as $row) {

            // dd(
            //     count($sheet->toArray())
            // );
            if ($row[0] !== null && $row[1] !== null) {
                DB::table('table_b')
                    ->insert(
                        array(
                            'kode_toko' => $row[0],
                            'nominal_transaksi' => $row[1],
                        )
                    );
            }
        }
        return redirect()->route('tableB.index')->with('status', 'Berhasil mengunggah data penjualan');
    }
}
