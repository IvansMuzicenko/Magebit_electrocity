<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Models\Products;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Storage;
use PhpParser\Node\Expr\FuncCall;

$data = [];

class ProductController extends BaseController {
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function getAllProducts() {
        return response()->json([
            "status" => true,
            "data" => Products::all()
        ], 200);
    }
    public function getFilteredProducts() {
        $type = $_POST["type"];
        $brand = $_POST["brand"];
        $color = $_POST["color"];
        $connection = $_POST["connection"];
        $sort = $_POST["sort"];
        $filterArray = [];
        if ($type != "*") {
            array_push($filterArray, ["type", $type]);
        }
        if ($brand != "*") {
            array_push($filterArray, ["brand", $brand]);
        }
        if ($color != "*") {
            array_push($filterArray, ["color", $color]);
        }
        if ($connection != "*") {
            array_push($filterArray, ["connection", $connection]);
        }
        $query = DB::table('products')->where($filterArray);
        if ($sort != "") {
            $query = $query->orderBy('price', $sort);
        }
        return response()->json([
            "status" => true,
            "data" => $query->get()
        ], 200);
    }
    public function getProductById($id) {
        return response()->json([
            "status" => true,
            "data" => Products::where("id", $id)->get()
        ], 200);
    }
    public function addProduct() {
        $type = $_POST["type"];
        $brand = $_POST["brand"];
        $model = $_POST["model"];
        $color = $_POST["color"];
        $connection = $_POST["connection"];
        $price = $_POST["price"];
        $img1 = $_POST["img1"];
        $img2 = $_POST["img2"];
        $img3 = $_POST["img3"];

        Products::create([
            "type" => $type,
            "brand" => $brand,
            "model" => $model,
            "color" => $color,
            "connection" => $connection,
            "price" => $price,
            "img1" => $img1,
            "img2" => $img2,
            "img3" => $img3,
        ]);
        return true;
    }
}
