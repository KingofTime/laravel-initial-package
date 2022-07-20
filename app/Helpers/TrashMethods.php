<?php

namespace App\Helpers;

use Illuminate\Http\Request;

trait TrashMethods
{
    public function restore(int $id)
    {
        $this->service->restore($id);

        return response([
            "message" => "Recurso restaurado com sucesso"
        ], 200);
    }

    public function onlyTrashed(Request $request)
    {
        $parameters = new Parameters($request);

        if($parameters->isPaginate()){
            $collection = $this->service->onlyTrashPaginate($parameters->getFilter(), $parameters->getPerPage());
        } else {
            $collection = $this->service->onlyTrash($parameters->getFilter());
        }

        return response($collection, 200);
    }

    public function forceDelete(int $id)
    {
        $this->service->forceDelete($id);

        return response([
            "message" => "Recurso removido com sucesso"
        ], 200);
    }
}
