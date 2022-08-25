<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Models\Orders;
use App\Models\Products;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Storage;
use PhpParser\Node\Expr\FuncCall;

$data = [];

class OrdersController extends BaseController {
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function placeOrder() {
        $product_id = $_POST["product_id"];
        $amount = $_POST["amount"];
        $customer_id = $_POST["customer_id"];
        $customer_address = $_POST["customer_address"];
        $customer_email = $_POST["customer_email"];
        $order_date = date("Y-m-d H:i:s");
        Orders::create([
            "product_id" => $product_id,
            "amount" => $amount,
            "customer_id" => $customer_id,
            "customer_address" => $customer_address,
            "customer_email" => $customer_email,
            "order_date" => $order_date,
        ]);
        return true;
    }

    public function getOrdersById() {
        $customer_id = $_POST["customer_id"];
        return response()->json([
            "status" => true,
            "data" => Products::where("customer_id", $customer_id)->get()
        ], 200);
    }
}
