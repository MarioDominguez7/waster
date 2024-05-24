<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Actuator;

class ActuatorsController extends Controller
{
    //consultar todos los Usuarios
    public function index(){
        return Actuator::paginate();
    }
    //consultar un Usuario
    public function show($id){
        return Actuator::find($id);
    }

    //crear un Usuario
    public function store(Request $request){
        $this->validate($request,[
            'name'=> 'required',
            'type'=> 'required',
            //'value'=> 'required',
            //'date'=> 'required',
            //'user_id'=> 'required',
            //'status'=> 'required',
            //'value_status'=> 'required',
        ]); 
        $actuator = Actuator::find(1);
        if(!$actuator)$actuator = new Actuator;
        $actuator->fill($request->all());
        $actuator->value=1;
        $actuator->user_id=1;
        $actuator->date = date('Y-m-d H:i:s');
        $actuator->status = 'Apagado';
        $actuator->value_status=0;
        $actuator->save();
        return $actuator;
    }

    //actualizar un Usuario
    public function update(Request $request,$id){
        $this->validate($request,[
            'name'=> 'filled|unique:actuators',
        ]); 
        $actuator = Actuator::find($id);
        if (!$actuator) return response('', 404);
        $actuator->update($request->all());
        $actuator->save();
        return $actuator;
    }

    //eliminar un Usuario
    public function destroy($id){
        $actuator = Actuator::find($id);
        if (!$actuator) return response('', 404);
        $actuator->delete();
        return $actuator;
    }

}
