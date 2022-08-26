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
        $type = $_POST["product_type"];
        $brand = $_POST["product_brand"];
        $model = $_POST["product_model"];
        $color = $_POST["product_color"];
        $connection = $_POST["product_connection"];
        $price = $_POST["product_price"];

        $imagesFile = [];

        if ($_POST["image_type"] == "url") {
            array_push($imagesFile, $_POST["product_img1"]);
            array_push($imagesFile, $_POST["product_img2"]);
            array_push($imagesFile, $_POST["product_img3"]);
        } else {
            $groupByEntry = function (&$arr) {
                $entry = [];
                $first_value = current($arr);
                if (is_array($first_value)) {
                    $count = count($first_value);

                    foreach ($arr as $key => $column_values) {
                        for ($i = 0; $i < $count; $i++) {
                            $entry[$i][$key] = $column_values[$i];
                        };
                    };
                    $arr = $entry;
                } else {
                    $arr = [$entry];
                }
            };

            $target_dir = "/home/ivansmuzicenko/Desktop/Magebit_Bootcamp/Final project/electrocity/storage/app/";


            foreach ($_FILES['product_images']['error'] as $error) {
                if ($error > 0) {
                    return
                        response()->json([
                            "status" => false,
                            "message" => "No images found",
                        ], 200);
                }
            }


            $images = $_FILES['product_images'];
            $groupByEntry($images);
            $count = 0;
            global $data;

            foreach ($images as $image) {
                $target_file = $target_dir . basename($image['name']);
                $image_file_type = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
                $size = getimagesize($image["tmp_name"]);
                $file_size = $image['size'];

                $count++;
                Storage::disk("public")->put($image['name'], file_get_contents($image["tmp_name"]));
                array_push($imagesFile, asset('storage/' . $image['name']));
            }
        }

        Products::create([
            "type" => $type,
            "brand" => $brand,
            "model" => $model,
            "color" => $color,
            "connection" => $connection,
            "price" => $price,
            "img1" => $imagesFile[0],
            "img2" => $imagesFile[1],
            "img3" => $imagesFile[2],
        ]);
        return true;
    }
}
