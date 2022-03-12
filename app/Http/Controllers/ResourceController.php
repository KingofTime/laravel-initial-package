<?php

namespace App\Http\Controllers;

use App\Helpers\Parameters;
use App\Services\Service;
use Illuminate\Http\Request;

class ResourceController extends Controller
{
    public function __construct(
        protected Service $service,
        protected Request $request
    ){}

    public function index($request)
    {
        $parameters = new Parameters($request);

        if($parameters->isPaginate()){
            $collection = $this->service->paginate($parameters->getFilter());
        } else {
            $collection = $this->service->getAll($parameters->getFilter());
        }

        return response($collection, 200);
    }

    public function store()
    {
        $validated = $this->request->validated();
        $resource = $this->service->create($validated);

        return response([
            "message" => "Recurso adicionado com sucesso",
            "data" => $resource
        ], 201);
    }

    public function show(int $id)
    {
        $resource = $this->service->get($id);

        return response($resource, 200);
    }

    public function update(int $id)
    {
        $validated = $this->request->validated();

        $this->service->update($id, $validated);

        return response([
            "message" => "Recurso atualizado com sucesso"
        ], 200);
    }

    public function destroy(int $id)
    {
        $this->service->delete($id);

        return response([
            "message" => "Recurso removido com sucesso"
        ], 200);
    }
}
