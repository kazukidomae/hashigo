<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\User;


class MypageController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view('mypage',compact('user'));
    }

    public function seach_shop($id)
    {
        $hpg_key = config('apikey.hpg-key');
        $url = "http://webservice.recruit.co.jp/hotpepper/gourmet/v1/?key=".$hpg_key.$id."&format=json";
        // return $url;
        // return $this->create_list($url);
        $hashigo_arr = $this->create_list($url);
        return $hashigo_arr;
    }

    public function create_list($url)
    {
        $json = array();
        $json = file_get_contents($url);
        $json = mb_convert_encoding($json, 'UTF8', 'ASCII,JIS,UTF-8,EUC-JP,SJIS-WIN');
        $arr = json_decode($json,true);
        // return $arr['results']['shop'];
        return $arr['results']['shop'];
    }

    public function hashigo_history()
    {
        $user = Auth::user();
        $hashigos = DB::table('hashigo_lists')->where('member_id',$user->id)->get();
        $url_ids = "";
        foreach($hashigos as $hashigo){
            
            $first = "&id=".$hashigo->first_store_id;
            $second = "&id=".$hashigo->second_store_id;
            $third = !isset($hashigo->third_store_id)?"&id=".$hashigo->third_store_id:'';
            $url_ids = $url_ids.$first.$second.$third;

        }
        $hashigo_shops = $this->seach_shop($url_ids);

        // return view('mypage',compact('user','hashigos'));
    }

}
