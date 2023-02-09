<?php

namespace App\Http\Controllers;

use App\Models\Request as RequestModel;
use App\Models\Response;
use App\Models\Route;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function indexAction()
    {
        return view('admin.index', [
            'routes' => Route::all(),
        ]);
    }

    public function requestIndexAction()
    {
        return view('admin.request.index', [
            'requests' => RequestModel::all(),
            'routes' => Route::all(),
        ]);
    }

    public function routesIndexAction()
    {
        return view('admin.route.index', [
            'routes' => Route::all(),
        ]);
    }

    public function responseIndexAction()
    {
        return view('admin.response.index', [
            'responses' => Response::all(),
        ]);
    }


    public function editRequestAction(int $id)
    {
        /** @var RequestModel $request */
        $request = RequestModel::query()->where('id', '=', $id)->firstOrFail();

        return view('admin.request.edit', [
            'request' => $request,
            'routes' => Route::all(),
        ]);
    }

    public function editRouteAction(int $id)
    {
        $route = Route::query()->where('id', '=', $id)->firstOrFail();

        return view('admin.route.edit', [
            'route' => $route,
        ]);
    }

    public function editResponseAction(int $id)
    {
        $response = Response::query()->where('id', '=', $id)->firstOrFail();

        return view('admin.response.edit', [
            'response' => $response,
            'requests' => RequestModel::all(),
        ]);
    }

    public function addRequestAction()
    {
        return view('admin.request.create', ['routes' => Route::all(),]);
    }

    public function addRouteAction()
    {
        return view('admin.route.create');
    }

    public function addResponseAction()
    {
        return view('admin.response.create', [
            'requests' => RequestModel::all(),
        ]);

    }

    public function storeRequestAction(Request $request)
    {
        $requestModel = new RequestModel();
        if ($request->has('id')) {
            $requestModel = RequestModel::query()->where('id', '=', $request->input('id'))->first();
        }

        $requestModel->body = $request->input('body');
        $requestModel->method = $request->input('method');
        $requestModel->route_id = $request->input('route_id');
        $requestModel->save();

        return redirect(route('requests'));
    }

    public function storeRouteAction(Request $request)
    {
        $routeModel = new Route();
        if ($request->has('id')) {
            $routeModel = Route::query()->where('id', '=', $request->input('id'))->first();
        }
        $routeModel->name = $request->input('name');
        $routeModel->route = $request->input('route');
        $routeModel->save();

        return redirect(route('routes'));
    }

    public function storeResponseAction(Request $request)
    {
        $responseModel = new Response();
        if ($request->has('id')) {
            $responseModel = Response::query()->where('id', '=', $request->input('id'))->first();
        }
        $responseModel->body = $request->input('body');
        $responseModel->http_code = $request->input('http_code');
        $responseModel->request_id = $request->input('request_id');
        $responseModel->save();

        return redirect(route('responses'));
    }
}
