<?php 
namespace App\Traits;

trait ApiResponse{


// suucess --> 200-ok
// status : true or ok,
// message : ['ar'=>'تم بنجاح','en'=>'success'],
// data : {}

protected function success($data=null,$message='success',$code=200){
    return response()->json([
        'status' => true,
        'message' => 'success',
        'data'=> $data
    ],$code);
}

// server error --> 500 --> bug 
//status: false ,
// message: 'internal server error'
protected function serverError($message='internal server error',$code=500,$errors=[]){
    return response()->json([
        'status'=>false,
        'message'=> $message,
        'errors'=>$errors,
    ],$code);
}

// bad request--> 400 --> 
// status: false 
// message : "bad request"
protected function badRequest($message="bad Reqyest",$erros=[])
{
    return $this->serverError($message,400,$errors);
}

//code 401

protected function unauthorized($message='unauthorized',$code=401){
    return response()->json([
        'status' => false,
        'message' => 'unauthorized',

    ],$code);
}


}