<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Http\Requests\UploadPostRequest;

class MainController extends Controller
{
    //

    public function index(){
        return view("main");
    }

    public function uploadFile(UploadPostRequest $request){
        try{
            $content = $request->file("list")->get();
            $rows = explode("\n", $content);
            $rowCount = count($rows);
            $list = [];

            foreach($rows as $row) {
                $jsonObj = json_decode($row, true);
                if (get_distance(env("MAIN_LAT"), env("MAIN_LONG"), $jsonObj["latitude"], $jsonObj["longitude"]) <= 100) {
                    $list[] = $jsonObj;
                }
            }

            usort($list, fn($a, $b) => $a["affiliate_id"] - $b["affiliate_id"]);
            
            return view('list', compact('list','rowCount'));

        } catch(\Exception $e) {
            return back()->withErrors(["msg" => $e->getMessage()]);
        }
        

    }
}
