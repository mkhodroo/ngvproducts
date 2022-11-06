<?php

namespace App\Http\Controllers;

use App\Models\Access as AccessModel;
use App\Models\Method as MethodsModel;
use Exception;
use Illuminate\Http\Request;
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
            if(!$method){
                $m = new MethodController();
                $method = $m->add_with_name($method_name);
            }
            $user = Auth::user();
            $access = AccessModel::where('method_id', $method->id)->where('role_id', $user->role_id)->first();

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

    public function add($role_id, $method_id)
    {
        return AccessModel::create([
            'method_id' => $method_id,
            'role_id' => $role_id,
            'access' => 1
        ]);
    }

    public function delete_all_role_access($role_id)
    {
        return AccessModel::where('role_id', $role_id)->delete();
    }

    public function get_by_role_id($role_id)
    {
        return AccessModel::where('role_id', $role_id)->where('access', 1)->get();
    }

    public function edit_role_access(Request $r)
    {
        $this->delete_all_role_access($r->role_id);
        $a = new AccessModel();
        for($i=0; true; $i++){
            $method_id = $r->get("list-method_$i");
            if($method_id !== null){
                $this->add($r->role_id, $method_id);
            }else{
                break;
            }
        }
        return response('دسترسی ها ویرایش شد.');
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
