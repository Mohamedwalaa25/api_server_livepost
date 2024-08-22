<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class GeneralJsonException extends Exception
{
    protected $code = 422;
    public function report(): void
    {
//        dump(123);
    }

    /**
     * Render the exception into an HTTP response.
     */
    public function render(Request $request)
    {
        return new JsonResponse([
            "errors" => [
                'message' => $this->getMessage(),
            ]
        ], $this->code
        );

    }
}
