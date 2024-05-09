<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Log;

class LogsController extends Controller
{
    //consultar todos los Usuarios
    public function index(){
        return Log::paginate();
    }
    //consultar un Usuario
    public function show($id){
        return Log::find($id);
    }

    //crear un Usuario
    public function store(Request $request){
        $this->validate($request,[
            'day'=> 'required',
            'month'=> 'required',
            'year'=> 'required',
            'value'=> 'required',
            'thrift'=> 'required',
            //'user_id'=> 'required',
        ]); 
        $log = new Log;
        $log->fill($request->all());
        $log->user_id=1;
        $log->save();
        return $log;
    }

    //actualizar un Usuario
    public function update(Request $request,$id){
        $log = Log::find($id);
        if (!$log) return response('', 404);
        $log->update($request->all());
        $log->save();
        return $log;
    }

    //eliminar un Usuario
    public function destroy($id){
        $log = Log::find($id);
        if (!$log) return response('', 404);
        $log->delete();
        return $log;
    }
}
