<?php

namespace App\Services;

use App\Models\Route;
use Illuminate\Http\Request;
use App\Models\Request as RequestModel;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class RouteService
{
    /**
     * @throws \JsonException
     */
    public function getResponse(string $route, Request $request): array
    {
        /** @var Route $route */
        $routeData = Route::query()->where('route', '=', $route)->first();
        if (null === $routeData) {
            throw new NotFoundHttpException('Error, route not found');
        }
        /** @var RequestModel $requestsData */
        $requestsData = $routeData->requestsWithMethod($request->method())->first();
        if (null === $requestsData) {
            throw new NotFoundHttpException('Error, request not found');
        }

        $response = $requestsData->response;
        if (null === $response) {
            throw new NotFoundHttpException('Error, response not found');
        }

        return [
            'body' => json_decode($response->body, true, 512, JSON_THROW_ON_ERROR),
            'http_code' => $response->http_code,
        ];
    }
}
