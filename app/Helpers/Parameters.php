<?php

namespace App\Helpers;

use Illuminate\Http\Request;

class Parameters
{
    private array $params;

    public function __construct(Request $request)
    {
        $this->params = $request->query();
    }

    public function isPaginate(): bool
    {
        return array_key_exists('page', $this->params);
    }

    public function getFilter(): array
    {
        $params = $this->params;

        if (array_key_exists('page', $this->params)) {
              unset($params['page']);
        }

        if (array_key_exists('per_page', $this->params)) {
            unset($params['per_page']);
        }

        return $params;
    }

    public function getPerPage(): int
    {
        $per_page = 5;

        if(array_key_exists('per_page', $this->params)) {
            $per_page = $this->params['per_page'];
        }

        return $per_page;
    }
}
