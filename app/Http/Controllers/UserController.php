<?php
/**
 * Created by PhpStorm.
 * User: dev001
 * Date: 16-10-28
 * Time: 12:07
 */

namespace Tld\Wechat\Http\Controllers;


use App\User;
use App\Http\Requests;
use Illuminate\Http\Request;

class UserController extends AdminController
{
    public function index(Request $request)
    {   
        $nickname = $request->nickname;
        if(isset($nickname)){
            $where[]=array("nickname"=>$nickname);
        }
        $status = $request->status;
        if(isset($status)){
            $where[]=array("status"=>$status);
        }
        $list = User::join("user_sns", "user_sns.user_id", "=", "users.id")->where($where)->paginate(20);
        
        return view("wechat::user.index", ['list' => $list, 'i' => 1]);
    }
}