<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class ElderlyController extends Controller
{
    public function __construct()
    {
        // module name
        $this->module_name = 'elderlies';
        // module model name, path
        $this->module_model = "App\Models\Elderly";
        // page title
        $this->page_title = 'Lansia';
        // page description
        $this->page_description = 'Daftar Lansia';
        // module singular name
        $this->module_singular = 'Lansia';
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
        $module_name = $this->module_name;
        $data = $this->module_model::select('*')->orderBy("id", "DESC");
        return DataTables::of($data)
            ->addColumn('age', function($data) {
                return $data->age . " Thn";
            })
            ->addColumn('last_record', function($data) {
                return $data->last_record ? '-' : '-';
            })
            ->addColumn('action', function ($data) use ($module_name) {
                $module_name = $this->module_name;
                return view("$module_name.action_column", compact('module_name', 'data'));
            })
            ->toJson();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $module_name = $this->module_name;
        $page_title = "Tambah $this->page_title";
        $page_description = $this->page_description;
        $action = 'default';
        return view("$module_name.create", compact('module_name', 'page_title', 'page_description', 'action'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $module_name = $this->module_name;
        $module_data = $this->module_model::create($request->all());
        return redirect()->route("$module_name.index")->with('status', "$this->module_singular baru berhasil dibuat!");
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
        $page_description = $this->page_description;
        $action = 'default_index';
        return view("$module_name.edit", compact('module_name', 'page_title', 'page_description', 'action', 'module_data'));
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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function death($id)
    {
        $module_name = $this->module_name;
        $module_data = $this->module_model::findOrFail($id);
        $page_title = "Diagnosa Kematian";
        $page_description = $this->page_description;
        $action = 'default_index';
        return view("$module_name.death", compact('module_name', 'page_title', 'page_description', 'action', 'module_data'));
    }
}
