<?php


namespace App\Http\Controllers\Api;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller as Controller;


class MainController extends Controller
{
    /**
     * Send a success response with data.
     *
     * @param  mixed  $result
     * @param  string  $message
     * @return \Illuminate\Http\JsonResponse
     */
    public function sendResponse($result, $message)
    {
        // This method is responsible for sending a successful JSON response.

        $response = [
            'success' => true,
            'data'    => $result,
            'message' => $message,
        ];

        // Return a JSON response with a 200 status code
        return response()->json($response, 200);
    }

    /**
     * Send an error response with an optional error message and status code.
     *
     * @param  string  $error
     * @param  array  $errorMessages
     * @param  int  $code
     * @return \Illuminate\Http\JsonResponse
     */
    public function sendError($error, $errorMessages = [], $code = 404)
    {
        // This method is responsible for sending an error JSON response.

        $response = [
            'success' => false,
            'message' => $error,
        ];

        // Include error messages in the response if provided
        if (!empty($errorMessages)) {
            $response['data'] = $errorMessages;
        }

        // Return a JSON response with the specified status code
        return response()->json($response, $code);
    }

}
