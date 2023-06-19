<?php

namespace App\Http\Controllers;

use App\Models\Elderly;
use App\Models\ElderlyRecord;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use App\Traits\ExcelTrait;
use Carbon\Carbon;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Spreadsheet;

class ElderlyRecordController extends Controller
{

    use ExcelTrait;

    public function __construct()
    {
        // module name
        $this->module_name = 'elderly-records';
        // module model name, path
        $this->module_model = "App\Models\ElderlyRecord";
        // page title
        $this->page_title = 'Pemeriksaan Lansia';
        // page description
        $this->page_description = 'Daftar Pemeriksaan Lansia';
        // module singular name
        $this->module_singular = 'Pemeriksaan Lansia';
    }
    public function index()
    {
        $module_name = $this->module_name;
        $module_singular = $this->module_singular;
        $module_data = $this->module_model::paginate();
        $page_title = $this->page_title;
        $page_description = $this->page_description;
        $action = 'default';
        return view("$module_name.index", compact('page_title', 'page_description', 'action', 'module_data', 'module_name', 'module_singular'));
    }

    public function index_data() {
        $data = $this->module_model::select('*');
        return DataTables::of($data)
            ->addColumn('nik', function($data) {
                return $data->elderly->nik;
            })
            ->addColumn('name', function($data) {
                return $data->elderly->name;
            })
            ->editColumn('recorded_at', function($data) {
                return $data->recorded_at->translatedFormat('F Y');
            })
            ->addColumn('action', function ($data) {
                $module_name = $this->module_name;
                return view('components.action_column', compact('module_name', 'data'));
            })
            ->toJson();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $module_name = $this->module_name;
        $page_title = "Tambah $this->page_title";
        $page_description = $this->page_description;
        $elderly = Elderly::find($id);
        $action = 'default';
        return view("$module_name.create", compact('module_name', 'page_title', 'page_description', 'action', 'elderly'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->merge([
            "is_new" => $request->is_new === "on" ? 1 : 0,
        ]);
        $module_name = $this->module_name;
        $module_data = $this->module_model::create($request->all());
        return redirect()->route("elderlies.index")->with('status', "$this->module_singular baru berhasil dibuat!");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $module_name = $this->module_name;
        $module_singular = $this->module_singular;
        $module_data = $this->module_model::findOrFail($id);
        $page_title = "Detail $this->page_title";
        $page_description = $this->page_description;
        $action = 'default';
        return view("$module_name.show", compact('module_name', 'page_title', 'page_description', 'action', 'module_data', 'module_singular'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $module_name = $this->module_name;
        $module_data = $this->module_model::findOrFail($id);
        $page_title = "Ubah $this->page_title";
        $elderly = Elderly::find($module_data->elderly_id);
        $page_description = $this->page_description;
        $action = 'default_index';
        return view("$module_name.edit", compact('module_name', 'page_title', 'page_description', 'action', 'module_data', 'elderly'));
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
        $request->merge([
            "is_new" => $request->is_new === "on" ? 1 : 0,
        ]);
        $module_name = $this->module_name;
        $module_data = $this->module_model::findOrFail($id);
        $module_data->update($request->all());
        return redirect()->route("$module_name.index")->with('status',"$this->module_singular berhasil diubah!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $module_data = $this->module_model::findOrFail($id);
        $module_data->delete();
        return response()->json(['statusCode' => 200, 'message' => 'Data berhasil dihapus']);
    }

    

    public function export_view()
    {
        $module_name = $this->module_name;
        $module_singular = $this->module_singular;
        $module_data = $this->module_model::paginate();
        $page_title = "Laporan $this->page_title";
        $page_description = $this->page_description;
        $action = 'default';
        return view("$module_name.export", compact('page_title', 'page_description', 'action', 'module_data', 'module_name', 'module_singular'));
    }

    public function export(Request $request) {
        $nik = $request->nik;
        $month = $request->month;
        $year = $request->year;

        $query = ElderlyRecord::query();
        
        if($request->filled('nik')) {
            $query->whereHas('elderly', function($q) use ($nik) {
                $q->where('nik', $nik);
            });
        }
    
        if($month != "all") {
            $query->whereMonth("recorded_at", $month);
        }

        if($year != "all") {
            $query->whereYear("recorded_at", $year);
        }

        $data = $query->get();

        $column_alphanumerics = range('A', 'AA');
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->setActiveSheetIndex(0);
        $column = 1;
        $number = 1;
        // Set Header
        foreach ($column_alphanumerics as $column_alphanumeric) {
            $sheet
                ->setCellValue("A$column", "No")
                ->setCellValue("B$column", "Tanggal")
                ->setCellValue("C$column", "NIK")
                ->setCellValue("D$column", "Nama")
                ->setCellValue("E$column", "Kemandirian")
                ->setCellValue("F$column", "Umur")
                ->setCellValue("G$column", "Kelompok Umur")
                ->setCellValue("H$column", "Pendidikan Terakhir")
                ->setCellValue("I$column", "IMT")
                ->setCellValue("J$column", "TD")
                ->setCellValue("K$column", "A (Indeks Barthel)")
                ->setCellValue("L$column", "B (Romberg)")
                ->setCellValue("M$column", "C (MMSe)")
                ->setCellValue("N$column", "D (Faktor Resiko)")
                ->setCellValue("O$column", "E (GDRS)")
                ->setCellValue("P$column", "Mental Emosional")
                ->setCellValue("Q$column", "Anemia")
                ->setCellValue("R$column", "Diabetes Melitus")
                ->setCellValue("S$column", "Gangguan Ginjal")
                ->setCellValue("T$column", "Berat Badan")
                ->setCellValue("U$column", "Gula Darah")
                ->setCellValue("V$column", "Kolestrol")
                ->setCellValue("W$column", "Penyakit Lain")
                ->setCellValue("X$column", "Hasil Screening")
                ->setCellValue("Y$column", "Penanganan")
                ->setCellValue("Z$column", "Rencana Tindakan")
                ->setCellValue("AA$column", "Keterangan")
                ->getColumnDimension($column_alphanumeric)
                ->setAutoSize(true);
            $this->setExcelHeaderStyle($sheet, "A$column:AA$column");
        }
        $column++;
        foreach ($data as $record) {
            $sheet
                ->setCellValue("A$column", $number)
                ->setCellValue("B$column", $record->recorded_at->format("d-m-Y"))
                ->setCellValue("C$column", $record->elderly->nik)
                ->setCellValue("D$column", $record->elderly->name)
                ->setCellValue("E$column", $record->independence_group)
                ->setCellValue("F$column", Carbon::parse($record->elderly->birth_date)->diff($record->recorded_at)->y . "Th")
                ->setCellValue("G$column", $record->age_group)
                ->setCellValue("H$column", $record->elderly->last_education)
                ->setCellValue("I$column", "$record->imt_res - $record->imt_format")
                ->setCellValue("J$column", "$record->blood_pressure_res - $record->blood_pressure_format")
                ->setCellValue("K$column", "$record->barthel_indeks_res - $record->barthel_indeks_format")
                ->setCellValue("L$column", $record->romberg_res)
                ->setCellValue("M$column", "$record->mmse_res - $record->mmse_format")
                ->setCellValue("N$column", "$record->factor_risk_res - $record->factor_risk_format")
                ->setCellValue("O$column", "$record->depression_res - $record->depression_format")
                ->setCellValue("P$column", $record->is_mental_emotional ? "Ya" : "Tidak")
                ->setCellValue("Q$column", $record->is_anemia ? "Ya" : "Tidak")
                ->setCellValue("R$column", $record->has_diabetes ? "Ya" : "Tidak")
                ->setCellValue("S$column", $record->has_kedney_failur ? "Ya" : "Tidak")
                ->setCellValue("T$column", "$record->weight - $record->weight_category")
                ->setCellValue("U$column", "$record->blood_sugar_res - $record->blood_sugar_format")
                ->setCellValue("V$column", "$record->colestrol_res - $record->colestrol_format")
                ->setCellValue("W$column", $record->other_diseases)
                ->setCellValue("X$column", $record->screening_format)
                ->setCellValue("Y$column", $record->treatment)
                ->setCellValue("Z$column", $record->follow_up)
                ->setCellValue("AA$column", $record->note)
                ->getColumnDimension($column_alphanumeric)
                ->setAutoSize(true);
            $this->setExcelStyle($sheet, "A$column:AA$column");
            $number++;
            $column++;
        }
        $file_name = "[LAPORAN PEMERIKSAAN LANSIA] " . date('d-m-Y');
        ob_end_clean();
        header('Content-Disposition: attachment;filename="' . $file_name . '.xlsx"');
        $writer = new Xlsx($spreadsheet);
        $writer->save('php://output');
    }
}
