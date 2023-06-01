<?php

namespace Database\Seeders;

use App\Models\InventoryItem;
use App\Models\InventoryLog;
use App\Models\InventoryStock;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InventoryStockSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = InventoryItem::all();
        $log = InventoryLog::create([
            "user_id" => 1,
            "admin_id" => 1,
            "code" => "CK-" . date("dmy") . "-001",
            "date" => date("Y-m-d H:i:s"),
            "note" => "initial",
            "type" => 2,
            "validation_status" => 2,
            "validated_at" => date("Y-m-d H:i:s"),
        ]);

        $stocks = [];

        foreach($items as $item) {
            $stocks[] = [
                "inventory_log_id" => $log->id,
                "inventory_item_id" => $item->id,
                "date" => date("Y-m-d H:i:s"),
                "decrease" => 0,
                "increase" => 10,
                "quantity" => 10,
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now()
            ];
        }

        DB::table("inventory_stocks")->insert($stocks);
    }
}
