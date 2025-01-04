<?php

use App\Http\Middleware\ForceJsonResponse;
use Illuminate\Database\QueryException;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Symfony\Component\ErrorHandler\Error\FatalError;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Illuminate\Validation\ValidationException;


return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->append(ForceJsonResponse::class);
    })
    ->withExceptions(function (Exceptions $exceptions) {

        $exceptions->render( function ( NotFoundHttpException $e  ) {
            if ( str_starts_with( $e->getMessage() , 'The route') ) {
                $response['message'] = 'Recurso Indisponível.';
                
                if ( env('APP_DEBUG') == 'true' ) {
                    $response['errors'] = $e->getMessage();
                }

                return response()->json(
                    $response, 
                    404,
                    [],
                    JSON_PRETTY_PRINT
                );
            }
            
            if ( str_starts_with( $e->getMessage() , 'No query results for model') ) {
                $response['message'] = 'Entidade não encontrada.';
                
                if ( env('APP_DEBUG') == 'true' ) {
                    $response['errors'] = $e->getMessage();
                }

                return response()->json(
                    $response, 
                    404,
                    [],
                    JSON_PRETTY_PRINT
                );
            }
        }); 

        $exceptions->render( function (ValidationException $e )  { 
            $response['message'] = 'Erro de Validação.';
            
            if ( env('APP_DEBUG') == 'true' ) {
                $response['errors'] = $e->errors();
            }

            return response()->json(
                $response, 
                422,
                [],
                JSON_PRETTY_PRINT
            );
        } );

    })->create();
    