<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserChangePasswordRequest;
use App\Http\Requests\UserRequest;
use App\Models\Unit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Str;

class PageController extends Controller
{
    public function __construct()
    {
        // module name
        $this->module_name = 'pages';
        // module model name, path
        $this->module_model = "App\Models\Page";
        // page title
        $this->page_title = 'Halaman';
        // page description
        $this->page_description = 'Daftar Halaman';
        // module singular name
        $this->module_singular = 'Halaman';
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $module_name = $this->module_name;
        $module_data = $this->module_model::paginate();
        $page_title = $this->page_title;
        $page_description = $this->page_description;
        $action = 'user_index';
        return view("$module_name.index", compact('page_title', 'page_description', 'action', 'module_data', 'module_name'));
    }

    public function index_data() {
        $data = $this->module_model::select('*')->orderBy('id', "DESC");
        return DataTables::of($data)
            ->editColumn('banner', function($data) {
                return asset($data->banner);
            })
            ->addColumn('action', function ($data) {
                $module_name = $this->module_name;
                return view("components.action_column", compact('module_name', 'data'));
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
        $action = 'user_index';
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
            "slug" => Str::slug($request->slug),
        ]);
        $module_name = $this->module_name;
        $module_data = $this->module_model::create($request->all());
        return redirect()->route("$module_name.index", $request->type)->with('status', "Halaman baru berhasil dibuat!");
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
        $module_name = $this->module_name;
        $module_data = $this->module_model::findOrFail($id);
        $page_title = "Ubah $this->page_title";
        $page_description = $this->page_description;
        $action = 'user_index';
        $roles = Role::all();
        return view("$module_name.edit", compact('module_name', 'page_title', 'page_description', 'action', 'module_data', 'roles', 'units'));
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
            "slug" => Str::slug($request->slug),
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
