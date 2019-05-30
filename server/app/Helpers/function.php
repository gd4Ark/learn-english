<?php

use Illuminate\Http\JsonResponse;

/**
 * @param array $data
 * @param bool $status
 * @param string $msg
 * @param int $statusCode
 * @return \Illuminate\Http\JsonResponse
 */
function json($data = [], $status = true, $msg = '', $statusCode = 200)
{
    return new JsonResponse([
        'status' => $status,
        'msg' => $msg,
        'data' => $data
    ], $statusCode);
}


/**
 * @param $msg
 * @return \Illuminate\Http\JsonResponse
 */
function msg(string $msg)
{
    return json([], true, $msg);
}

/**
 * @param string $msg
 * @param int $statusCode
 * @return JsonResponse
 */
function error(string $msg, int $statusCode = 500)
{
    return json([], true, $msg, $statusCode);
}

/**
 * @param string $value
 * @param string $delimiter
 * @return array
 */
function split(string $value, string $delimiter = "\n")
{
    return explode($delimiter, $value);
}

/**
 * @param string $string
 * @return string|string[]|null
 */
function removeBlank(string $string)
{
    return preg_replace("/(^[\r\n]*|[\r\n]+)[\s\t]*[\r\n]+/", "\n", $string);
}
