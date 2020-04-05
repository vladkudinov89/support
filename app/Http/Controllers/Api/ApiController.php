<?php


namespace App\Http\Controllers\Api;


use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;

class ApiController extends Controller
{
    protected function successResponse(array $data, int $statusCode = JsonResponse::HTTP_OK) : JsonResponse
    {
        return JsonResponse::create(['data' => $data], $statusCode);
    }
}
