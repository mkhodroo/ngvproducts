<?php

namespace App\Http\Controllers;

use App\Models\Access as AccessModel;
use App\Models\Method as MethodsModel;
use Exception;
use Illuminate\Support\Facades\Auth;

class AccessController
{
    public static function set($user_id,$method_name)
    {
        $method = MethodsModel::where('name',$method_name)->first();
        $access = AccessModel::where('user_id',$user_id)->where('method_id',$method->id)->first();

        if($access)
            AccessModel::where('user_id',$user_id)->where('method_id',$method->id)->update(['access' => 1]);
        else
            AccessModel::create([
                'user_id' => $user_id,
                'method_id' => $method->id,
                'access' => 1,
                ]);
    }

    public static function unset($user_id,$method_name)
    {
        $method = MethodsModel::where('name',$method_name)->first();
        $access = AccessModel::where('user_id',$user_id)->where('method_id',$method->id)->first();

        if($access)
            AccessModel::where('user_id',$user_id)->where('method_id',$method->id)->update(['access' => 0]);
        else
            AccessModel::create([
                'user_id' => $user_id,
                'method_id' => $method->id,
                'access' => 0,
                ]);
    }

    public static function check($method_name)
    {
        try{
            $method = MethodsModel::where('name', $method_name)->first();
            $user = Auth::user();
            $access = AccessModel::where('method_id', $method->id)->where('user_id', $user->id)->first();

            if(!empty($access)):
                if($access->access == 1):
                    return true;
                else:
                    //return false;
                    abort(403);
                endif;
            else:
                abort(403);
            endif;
        }
        catch(Exception $e){
            abort(403,$e->getMessage());
        }

    }

    public static function checkView($method_name)
    {
        try{
            $method = MethodsModel::where('name', $method_name)->first();
            $user = Auth::user();
            $access = AccessModel::where('method_id', $method->id)->where('user_id', $user->id)->first();

            if(!empty($access)):
                if($access->access == 1):
                    return true;
                else:
                    //return false;
                    return false;
                endif;
            else:
                return false;
            endif;
        }
        catch(Exception $e){
            return false;
        }
    }

    public static function create($method_name,$method_faname)
    {
        $method = new MethodsModel();
        $method->name = $method_name;
        $method->fa_name = $method_faname;
        $method->save();
        return true;
    }

    public function CheckClientIP()
    {
        // $clientip = ($_SERVER['REMOTE_ADDR']);
        // if(DisableModel::get()->count()){
        //     if(!DisableModel::where('ip', $clientip)->count()){
        //         abort(403,'نرم افزار جهت بروز رسانی در دسترس نمی باشد');
        //     }
        // }
    }
}
