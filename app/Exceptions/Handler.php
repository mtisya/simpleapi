<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;

class Handler extends ExceptionHandler
{
    /**
     * The list of the inputs that are never flashed to the session on validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     */
    public function register(): void
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }
    /**
     * HTTP status codes for your API responses.
     */
    protected function invalidJson($request, ValidationException $exception)
    {
        return response()->json([
            'message' => $exception->getMessage(),
            'errors' => $exception->errors()
        ], Response::HTTP_UNPROCESSABLE_ENTITY);
    }
}
