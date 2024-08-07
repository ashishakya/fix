<?php

namespace App\Traits;

use Illuminate\Http\JsonResponse;

trait ApiResponses
{
    /**
     * @param array  $data
     * @param string $successMessage
     * @param int    $statusCode
     *
     * @return JsonResponse
     */
    protected function sendSuccessResponse(array $data, string $successMessage = 'Success', int $statusCode = 200): JsonResponse
    {
        $responseData = [
            "data"    => $data,
            "message" => $successMessage,
            "status"  => true,
        ];

        return response()->json($responseData, $statusCode);
    }

    public function sendErrorResponse($errorMessage, int $statusCode = 404): JsonResponse
    {
        $response = [
            'message' => $errorMessage,
            'status'  => false,
        ];

        return response()->json($response, $statusCode);
    }
}
