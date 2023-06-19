<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class GalleryController extends Controller
{
    public function __construct()
    {
        // module name
        $this->module_name = 'galleries';
        // module model name, path
        $this->module_model = "App\Models\Gallery";
        // page title
        $this->page_title = [
            "gallery" => "Galeri",
            "service" => "Layanan",
            "banner" => "Banner",
            "attachment" => "Lampiran"
        ];
        // page description
        $this->page_description = 'Galeri List';
        // module singular name
        $this->module_singular = [
            "gallery" => "Galeri",
            "service" => "Layanan",
            "banner" => "Banner",
            "attachment" => "Lampiran"

        ];
    }
    public function index($type)
    {
        $module_name = $this->module_name;
        $module_singular = $this->module_singular[$type];
        $page_title = $this->page_title[$type];
        $module_data = $this->module_model::where('type', $type)->paginate();
        $page_description = $this->page_description;
        $action = 'default';
        return view("$module_name.index", compact('page_title', 'page_description', 'action', 'module_data', 'module_name', 'module_singular'));
    }

    public function index_data($type) {
        $data = $this->module_model::select('*')->where('type', $type);
        return DataTables::of($data)
            ->editColumn('image', function($data) {
                return asset($data->image);
            })
            ->addColumn('imageUrl', function($data) {
                return $data->image;
            })
            ->addColumn('action', function ($data) {
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
    public function create($type)
    {
        $module_name = $this->module_name;
        $page_title = $this->page_title[$type];
        $page_title = "Tambah $page_title";
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
        $request->merge([
            "is_active" => $request->is_active === "on" ? 1 : 0,
        ]);
        $module_name = $this->module_name;
        $module_data = $this->module_model::create($request->all());
        $module_singular = $this->module_singular[$request->type];
        return redirect()->route("$module_name.index", $request->type)->with('status', "$module_singular baru berhasil dibuat!");
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
        $module_data = $this->module_model::findOrFail($id);
        $module_singular = $this->module_singular[$module_data->type];
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
        $page_title = $this->page_title[$module_data->type];
        $page_title = "Ubah $page_title";
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
        $request->merge([
            "is_active" => $request->is_active === "on" ? 1 : 0,
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
}
