<?php

/**
 * Success response method
 *
 * @param $result
 * @param $message
 * @return \Illuminate\Http\JsonResponse
 */

if (!function_exists('responseMessage')) {

    function responseMessage($result, $code = null, $limit = null, $offset = null)
    {
        $metaData = [
            'method' => \request()->getMethod(),
            'endpoint' => \request()->getRequestUri()
        ];

        if (isset($limit) && isset($offset)) {
            $metaData['limit'] = $limit;
            $metaData['offset'] = $offset;
        }


        $response = [
            'success' => true,
            'code' => $code,
            'meta' => $metaData,
            'data'    => $result,
            'error' => [],
        ];

        return response()->json($response, 200);
    }
}

/**
 * Return error response
 *
 * @param       $error
 * @param array $errorMessages
 * @param int   $code
 * @return \Illuminate\Http\JsonResponse
 */

if (!function_exists('errorMessage')) {

    function errorMessage($error, $errorMessages = [], $code = null)
    {
        $result = [];

        $errorMessages = is_array($errorMessages) ? $errorMessages : $errorMessages->toArray();

        foreach ($errorMessages as $key => $value) {
            array_push($result, [
                'attribute' => $key,
                'message' => $value[0]
            ]);
        }

        $response = [
            'success' => false,
            'code' => $code,
            'meta' => [
                'method' => \request()->getMethod(),
                'endpoint' => \request()->getRequestUri()
            ],
            'data' => [],
            'error' => $error,
        ];

        !empty($errorMessages) ? $response['error'] = $result : null;

        return response()->json($response, $code);
    }
}

