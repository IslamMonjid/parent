<?php

namespace App\Http\Controllers;

use App\Services\Interfaces\DataProviderServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    private $dataProviderService;

    public function __construct(DataProviderServiceInterface $dataProviderService)
    {
        $this->dataProviderService = $dataProviderService;
    }

    public function index(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'statusCode' => 'string',
            'provider'=> 'string',
            'balanceMin'=> 'integer',
            'balanceMax'=> 'integer',
            'currency'=> 'string',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors'=>$validator->errors()], Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        $data = $this->dataProviderService->all($request->query());
        return response()->json(['data' => $data]);
    }
}