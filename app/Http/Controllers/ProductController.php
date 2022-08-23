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
    public function getProductById($id) {
        return response()->json([
            "status" => true,
            "data" => Products::where("id", $id)
        ], 200);
    }
    // public function add() {
    //     return response()->json([
    //         "status" => true,
    //     ], 200);
    // }
}
