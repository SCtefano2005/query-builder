<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;


class AlumnoController extends Controller
{
  public function index()
  {

      //$alumnos = DB::table('alumnos')->get('name');
      //return response()->json(["Response" => $alumnos]);

      //$alumnos = DB::table('alumnos')->where('edad',18)->first();
      //return response()->json(["Response" => $alumnos->name]);

      //$alumnos = DB::table('alumnos')-> where('name', 'Patricia')->first();
      //return response()->json(["Response" => $alumnos->edad]);

      //$alumnos=DB::table('alumnos')->where('edad', 18)->value('name');
      //return response()->json(["Response" => $alumnos]);

      //$alumnos= DB::table('alumnos')->find(5);
      //return response()->json(["Response" => $alumnos]);

      //$names=DB::table('alumnos')->pluck('name');
      //foreach($names as $name=>$result){
        //echo $result.'<br>';
      //}
      //DB::table('user_details')->orderBy('user_id')->chunk(100,function(Collection $users){
        //foreach($users as $user){
          //echo $user->user_id." - ".$user->first_name.'<br>';
        //}
        //return false;
      //});

      //value=2;
      //if(DB::table('user_details')->where('status', $value)->exists()){
        //return response()->json(["Response" => "Existen registros con status $value"]);
      //}else{
        //return response()->json(["Response" =>"No existen registros con status $value"]);
      //}

      $users=DB::table('user_details')
      ->select('first_name as nombre', 'username as nombre_de_usuario ')
      ->where('last_name', 'john')
      ->get();
      return response()->json(["Response" => $users]);

  }

  public function addSelectDemo()
    {
        $result = DB::table('user_details')
                    ->addSelect('first_name', 'last_name')
                    ->get();

        return response()->json($result);
    }

    public function distinct()
    {
        $result = DB::table('user_details')
                    ->distinct()
                    ->get();

        return response()->json($result);
    }

    public function selectRaw()
    {
        $result = DB::table('user_details')
                    ->selectRaw('first_name, last_name')
                    ->get();

        return response()->json($result);
    }

    public function whereRaw()
    {
        $result = DB::table('user_details')
                    ->whereRaw('status = ?', [1])
                    ->get();

        return response()->json($result);
    }

    public function aggregateFunctions()
{
    $result = DB::table('user_details')
                ->select(
                    DB::raw('COUNT(user_id) as total_users'),
                    DB::raw('AVG(status) as avg_status'),
                    DB::raw('MAX(status) as max_status'),
                    DB::raw('MIN(status) as min_status'),
                    DB::raw('SUM(status) as sum_status'),
                )
                ->get();

    return response()->json($result);
}

public function groupByGender()
{
    $result = DB::table('user_details')
                ->select('gender', DB::raw('COUNT(*) as total_users')) 
                ->groupBy('gender')
                ->get();

    return response()->json($result);
}


    public function groupBy()
    {
      $result = DB::table('user_details')
              ->select('gender', DB::raw('COUNT(*) as total_users'))
              ->groupBy('gender')
              ->get();

  return response()->json($result);
    }
}
