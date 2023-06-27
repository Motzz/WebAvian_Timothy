<?php

namespace App\Http\Controllers;

use App\Models\TableD;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PhpOffice\PhpSpreadsheet\IOFactory;


class TableDController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = DB::table('table_d')
            // ->paginate(10);
            ->get();
        // dd($data);
        return view('SalesD.index', [
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
        return view('SalesD.tambah');
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

        DB::table('table_d')
            ->insert(
                array(
                    'kode_sales' => $data['kode_sales'],
                    'nama_sales' => $data['nama_sales'],

                )
            );
        return redirect()->route('tableD.index')->with('status', 'Berhasil menambahkan sales');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TableD  $tableD
     * @return \Illuminate\Http\Response
     */
    public function show(TableD $tableD)
    {
        //

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TableD  $tableD
     * @return \Illuminate\Http\Response
     */
    public function edit(TableD $tableD)
    {
        //
        return view('SalesD.edit', [
            'tableD' => $tableD,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TableD  $tableD
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TableD $tableD)
    {
        //
        $data = $request->collect();
        DB::table('table_d')
            ->where('kode_sales', $tableD['kode_sales'])
            ->update(
                array(
                    'kode_sales' => $data['kode_sales'],
                    'nama_sales' => $data['nama_sales'],
                )
            );
        return redirect()->route('tableD.index')->with('status', 'Berhasil mengubah sales');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TableD  $tableD
     * @return \Illuminate\Http\Response
     */
    public function destroy(TableD $tableD)
    {
        //
        // dd($tableA);
        DB::table('table_d')->where('nama_sales', $tableD->nama_sales)->delete();
        // $tableA->delete();
        return redirect()->route('tableD.index')->with('status', 'Berhasil menghapus sales');
    }
    public function viewExcelD(Request $request)
    {
        return view('SalesD.excel');
    }
    public function excelUploadD(Request $request)
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
                DB::table('table_d')
                    ->insert(
                        array(
                            'kode_sales' => $row[0],
                            'nama_sales' => $row[1],

                        )
                    );
            }
        }
        return redirect()->route('tableD.index')->with('status', 'Berhasil mengunggah data sales');
    }
}
