<?php
/**
 * Created by PhpStorm.
 * User: dev001
 * Date: 16-10-28
 * Time: 12:07
 */
namespace  Tld\Wechat\Http\Controllers;


use App\User;
use App\Http\Requests;
use Illuminate\Http\Request;

class UserController extends CommonController
{
    public function index(Request $request)
    {
        $where=[];
        $nickname = $request->nickname;
        if(!empty($nickname)){
            $where["nickname"]=$nickname;
        }
        $status = $request->status;
        if(!empty($status)){
            $where["user_sns.status"]=$status;
        }
        $sex = $request->sex;
        if(!empty($sex)){
            $where["sex"]=$sex;
        }
//        dd($where);
        $list = User::join("user_sns", "user_sns.user_id", "=", "users.id")->where($where)->paginate(20);
        
        return view("wechat::user.index", ['list' => $list, 'i' => 1]);
    }
}