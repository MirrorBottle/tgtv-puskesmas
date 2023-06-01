<?php

namespace App\Http\Controllers\Api;

use App\Helper\JsonResponse;
use App\Http\Resources\Web\InventoryLogItemsResource;
use App\Models\InventoryItem;
use App\Models\InventoryStock;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use App\Http\Controllers\Controller;
use App\Http\Resources\Mobile\InventoryValidationDetailResource;
use App\Http\Resources\Mobile\InventoryValidationResource;
use Illuminate\Http\Response;

class InventoryValidationController extends Controller
{
  public function __construct()
  {
    // module name
    $this->module_name = 'inventory-validations';
    // module model name, path
    $this->module_model = "App\Models\InventoryLog";
    // page title
    $this->page_title = 'Validasi';
    // page description
    $this->page_description = 'Validasi List';
    // module singular name
    $this->module_singular = 'Validasi';
  }

  public function index()
  {
    $validations = $this->module_model::with('user', 'stocks')
      ->select('*')
      ->where("validation_status", 1)
      ->get();
    return InventoryValidationResource::collection($validations);
  }

  public function show($id) {
    $validation = $this->module_model::find($id);
    return new InventoryValidationDetailResource($validation);
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
    $page_title = "Tolak $this->page_title";
    $page_description = $this->page_description;
    $action = 'default_index';
    return view("$module_name.edit", compact('module_name', 'page_title', 'page_description', 'action', 'module_data'));
  }

  public function verified(Request $request, $id, $status) {
    $module_data = $this->module_model::findOrFail($id);
    $module_data->update([
      "validation_status" => $status,
      "admin_id" => auth()->user()->id,
      "validated_at" => Carbon::now()->toDateTimeString(),
      "validation_note" => request()->note
    ]);
    return response()->json(new JsonResponse([]), Response::HTTP_OK);
  }

  public function bulk($id) {
    $this->module_model::where("validation_status", 1)
    ->update([
      "validation_status" => 2,
      "admin_id" => $id,
      "validated_at" => Carbon::now()->toDateTimeString()
    ]);
    return response()->json(new JsonResponse([]), Response::HTTP_OK);
  }
}
