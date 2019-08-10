<?php

namespace App\Http\Controllers\api;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class requestController extends Controller
{

    public function update(Request $request,$id)
    {
        $requestt=\App\Request::findOrFail($id);
        $validate = validator::make($request->all(),$this->rules($requestt->id));
        $requestt->fill($request->all());
        if ($validate->fails()){
            return parent::error($validate->errors());
        }
        $requestt->update();
        return parent::success($requestt);
    }
    public function destroy($id)
    {
        try{
            $request=\App\Request::findOrFail($id);
            $request->delete();
            return parent::success($request);
        }catch (ModelNotFoundException $modelNotFoundException){
            return parent::error("request not found");

        }
    }
    private function rules($id=null)
    {
        $rules=[
            'request_identifier'=>'required',
            'book_amount'=>'required',
            'book_id'=>'required',
            'user_id'=>'required',
            'statues'=>'required',
        ];
        return $rules;
    }
}
