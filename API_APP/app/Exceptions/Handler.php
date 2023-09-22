<?php

namespace App\Exceptions;

use Illuminate\Http\JsonResponse;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;

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
    // render json for API requests
    public function render($request, Throwable $exception)
    {

        if ($request->expectsJson() || $request->is('/api/*')) {
            return $this->prepareJsonResponse($request, $exception);
        }

        return parent::render($request, $exception);
    }

    protected function prepareJsonResponse($request, Throwable $exception)
    {
        return new JsonResponse([
            'message' => $exception->getMessage(),
            'status' => 'error',
        ],
        $this->isHttpException($exception) ? $exception->getStatusCode() : 500);
    }
}
