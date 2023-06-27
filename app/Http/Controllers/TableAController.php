<?php

namespace App\Http\Controllers;

use App\Models\TableA;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PhpOffice\PhpSpreadsheet\IOFactory;

class TableAController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = DB::table('table_a')
            // ->paginate(10);
            ->get();
        // dd($data);
        return view('KodeTokoA.index', [
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
        return view('KodeTokoA.tambah');
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
        $cekA = DB::table('table_a')->get();


        if ($cekA->contains('kode_toko_baru', $data['kode_toko_baru'])) {
            return redirect()->route('tableA.index')->with('status', ' Kode Tokosudah di set');
        } else {
            DB::table('table_a')
                ->insert(
                    array(
                        'kode_toko_baru' => $data['kode_toko_baru'],
                        'kode_toko_lama' => $data['kode_toko_lama'],

                    )
                );
            return redirect()->route('tableA.index')->with('status', 'Berhasil menambahkan Kode Toko');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TableA  $tableA
     * @return \Illuminate\Http\Response
     */
    public function show(TableA $tableA)
    {
        //

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TableA  $tableA
     * @return \Illuminate\Http\Response
     */
    public function edit(TableA $tableA)
    {
        //

        return view('KodeTokoA.edit', [
            'tableA' => $tableA,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TableA  $tableA
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TableA $tableA)
    {
        //
        $data = $request->collect();
        DB::table('table_a')
            ->where('kode_toko_baru', $tableA['kode_toko_baru'])
            ->update(
                array(
                    'kode_toko_baru' => $data['kode_toko_baru'],
                    'kode_toko_lama' => $data['kode_toko_lama'],
                )
            );
        return redirect()->route('tableA.index')->with('status', 'Berhasil mengubah kode toko');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TableA  $tableA
     * @return \Illuminate\Http\Response
     */
    public function destroy(TableA $tableA)
    {
        //
        // dd($tableA);
        DB::table('table_a')->where('kode_toko_baru', $tableA['kode_toko_baru'])->delete();
        // $tableA->delete();
        return redirect()->route('tableA.index')->with('status', 'Berhasil menghapus kode toko');
    }
    public function viewExcelA(Request $request)
    {
        return view('KodeTokoA.excel');
    }
    public function excelUploadA(Request $request)
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
                DB::table('table_a')
                    ->insert(
                        array(
                            'kode_toko_baru' => $row[0],
                            'kode_toko_lama' => $row[1],
                        )
                    );
            }
        }
        return redirect()->route('tableA.index')->with('status', 'Berhasil mengunggah data kode toko');
    }
}
