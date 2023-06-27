<?php

namespace App\Http\Controllers;

use App\Models\TableC;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PhpOffice\PhpSpreadsheet\IOFactory;

class TableCController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = DB::table('table_c')
            // ->paginate(10);
            ->get();
        // dd($data);
        return view('AreaSalesC.index', [
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
        return view('AreaSalesC.tambah', [
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

        $cekC = DB::table('table_c')->get();

        if ($cekC->contains('kode_toko', $data['kode_toko'])) {
            return redirect()->route('tableC.index')->with('status', 'area sales sudah di set');
        } else {
            DB::table('table_c')
                ->insert(
                    array(
                        'kode_toko' => $data['kode_toko'],
                        'area_sales' => $data['area_sales'],

                    )
                );
            return redirect()->route('tableC.index')->with('status', 'Berhasil menambahkan area sales');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TableC  $tableC
     * @return \Illuminate\Http\Response
     */
    public function show(TableC $tableC)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TableC  $tableC
     * @return \Illuminate\Http\Response
     */
    public function edit(TableC $tableC)
    {
        //
        $tableA = DB::table('table_c')
            // ->paginate(10);
            ->get();
        return view('AreaSalesC.edit', [
            'tableA' => $tableA,
            'tableC' => $tableC,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TableC  $tableC
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TableC $tableC)
    {
        //
        $data = $request->collect();
        DB::table('table_c')
            ->where('kode_toko', $tableC['kode_toko'])
            ->update(
                array(
                    'kode_toko' => $data['kode_toko'],
                    'area_sales' => $data['area_sales'],
                )
            );
        return redirect()->route('tableC.index')->with('status', 'Berhasil mengubah area sales');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TableC  $tableC
     * @return \Illuminate\Http\Response
     */
    public function destroy(TableC $tableC)
    {
        //
        DB::table('table_c')->where('kode_toko', $tableC['kode_toko'])->delete();
        return redirect()->route('tableC.index')->with('status', 'Berhasil menghapus area sales');
    }

    public function viewExcelC(Request $request)
    {
        return view('AreaSalesC.excel');
    }
    public function excelUploadC(Request $request)
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
                DB::table('table_c')
                    ->insert(
                        array(
                            'kode_toko' => $row[0],
                            'area_sales' => $row[1],
                        )
                    );
            }
        }
        return redirect()->route('tableC.index')->with('status', 'Berhasil mengunggah data area sales');
    }
}
