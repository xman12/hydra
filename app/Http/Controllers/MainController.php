<?php

namespace App\Http\Controllers;

use App\Services\RouteService;
use Illuminate\Http\Request;
use JsonException;

class MainController extends Controller
{
    protected RouteService $routeService;

    public function __construct(RouteService $routeService)
    {
        $this->routeService = $routeService;
    }

    /**
     * @throws JsonException
     */
    public function indexAction(string $route, Request $request)
    {
        $responseData = $this->routeService->getResponse($route, $request);

        return response()->json($responseData['body'], $responseData['http_code']);
    }

}
