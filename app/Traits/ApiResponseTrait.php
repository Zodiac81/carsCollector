<?php

namespace App\Traits;



use Illuminate\Http\Response;

trait ApiResponseTrait
{
    public function error($msg = null)
    {
        return response()->json([], Response::HTTP_BAD_REQUEST);
    }

    public function success($msg, $data, $status)
    {
        return response()->json([
            'msg' => $msg,
            'data' => $data,
        ], $status);
    }
}
