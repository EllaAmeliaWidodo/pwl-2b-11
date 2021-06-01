<?php
    namespace App\Traits;

    trait ApiResponse{
        protected function apiSuccess($data,$code=200,$massage=null)
        {
            return response()->json([
                'data'=> $data,
                'message'=>$massage,

            ],$code);
        }
        protected function apiError($errors,$code=200,$massage=null)
        {
            return response()->json([
                'errors'=> $errors,
                'message'=>$massage,

            ],$code);
        }
    }
?>