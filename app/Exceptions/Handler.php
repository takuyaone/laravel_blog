<?php

namespace App\Exceptions;

use Illuminate\Validation\ValidationException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Session\TokenMismatchException;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }

    public function render($request, Throwable $e)
    {
        // if($e instanceof TokenMismatchException){
        //     return back()->withErrors([
        //         '_token' => 'セッションが切れました。',
        //     ])->withInput();
        // }

        if ($e instanceof TokenMismatchException) {
            throw ValidationException::withMessages([
                '_token' => 'セッションが切れました。',
            ]);
        }


        return parent::render($request, $e);
    }
}
