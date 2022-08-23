<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Models\Auth;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Storage;
use PhpParser\Node\Expr\FuncCall;

$data = [];

class AuthController extends BaseController {
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function getAuthById($id) {
        return response()->json([
            "status" => true,
            "data" => Auth::where("id", $id)
        ], 200);
    }
    public function register() {
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $email = $_POST['email'];
        $address = $_POST['address'];
        $password =
            password_hash($_POST['password'], PASSWORD_DEFAULT);
        Auth::create(["firstname" => $firstname, "lastname" => $lastname, "email" => $email, "address" => $address, "password" => $password, `updated_at` => date("Y-m-d H:i:s"), `created_at` => date("Y-m-d H:i:s")]);
        return response()->json([
            "status" => true,
        ], 200);
    }
    public function login($id) {
        $email = $_POST['email'];
        $password =
            password_hash($_POST['password'], PASSWORD_DEFAULT);
        $user = Auth::where("id", $id);
        if ($user->password == $password) {
        }
        Auth::create();
        return response()->json([
            "status" => true,
            "data" => $user->id
        ], 200);
    }
}
