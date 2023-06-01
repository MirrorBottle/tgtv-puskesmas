<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InventorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // * CATEGORY
        DB::table("inventory_categories")->insert([
            ["name" => "Kategori 1"],
            ["name" => "Kategori 2"],
        ]);

        // * ITEMS
        for($category_id = 1; $category_id <= 2; $category_id++) {
            DB::table("inventory_items")->insert([
                [
                    "name" => "Barang 1 K$category_id",
                    "unit" => "box",
                    "inventory_category_id" => $category_id
                ],
                [
                    "name" => "Barang 2 K$category_id",
                    "unit" => "box",
                    "inventory_category_id" => $category_id
                ],
            ]);
        }

        // * LOGS
        DB::table("inventory_logs")->insert([
            [
                "user_id" => 2,
                "code" => uniqid("apa"),
                "date" => Carbon::now(),
                "type" => 1,
                "validation_status" => 1
            ],
            [
                "user_id" => 2,
                "code" => uniqid("apa"),
                "date" => Carbon::now(),
                "type" => 1,
                "validation_status" => 1
            ],
            [
                "user_id" => 2,
                "code" => uniqid("apa"),
                "date" => Carbon::now(),
                "type" => 2,
                "validation_status" => 1
            ],
            [
                "user_id" => 2,
                "code" => uniqid("apa"),
                "date" => Carbon::now(),
                "type" => 2,
                "validation_status" => 1
            ],
        ]);
        
        // * STOCK IN
        $stocks = 0;
        for($log_id = 1; $log_id <= 2; $log_id++) {
            DB::table("inventory_stocks")->insert([
                [
                    "inventory_item_id" => 1,
                    "inventory_log_id" => $log_id,
                    "date" => Carbon::now(),
                    "decrease" => 0,
                    "increase" => 10,
                    "quantity" => $stocks + 10
                ],
                [
                    "inventory_item_id" => 2,
                    "inventory_log_id" => $log_id,
                    "date" => Carbon::now(),
                    "decrease" => 0,
                    "increase" => 10,
                    "quantity" => $stocks + 10
                ],
                [
                    "inventory_item_id" => 3,
                    "inventory_log_id" => $log_id,
                    "date" => Carbon::now(),
                    "decrease" => 0,
                    "increase" => 10,
                    "quantity" => $stocks + 10
                ],
                [
                    "inventory_item_id" => 4,
                    "inventory_log_id" => $log_id,
                    "date" => Carbon::now(),
                    "decrease" => 0,
                    "increase" => 10,
                    "quantity" => $stocks + 10
                ],
            ]);
            $stocks += 10;
        }
        
        // * STOCK OUT
        for($log_id = 3; $log_id <= 4; $log_id++) {
            DB::table("inventory_stocks")->insert([
                [
                    "inventory_item_id" => 1,
                    "inventory_log_id" => $log_id,
                    "date" => Carbon::now(),
                    "decrease" => 2,
                    "increase" => 0,
                    "quantity" => $stocks - 2
                ],
                [
                    "inventory_item_id" => 2,
                    "inventory_log_id" => $log_id,
                    "date" => Carbon::now(),
                    "decrease" => 2,
                    "increase" => 0,
                    "quantity" => $stocks - 2
                ],
                [
                    "inventory_item_id" => 3,
                    "inventory_log_id" => $log_id,
                    "date" => Carbon::now(),
                    "decrease" => 2,
                    "increase" => 0,
                    "quantity" => $stocks - 2
                ],
                [
                    "inventory_item_id" => 4,
                    "inventory_log_id" => $log_id,
                    "date" => Carbon::now(),
                    "decrease" => 2,
                    "increase" => 0,
                    "quantity" => $stocks - 2
                ],
            ]);
            $stocks -= 2;
        }
    }
}
