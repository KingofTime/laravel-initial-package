<?php

namespace App\Helpers;

use Illuminate\Http\Request;

class Parameters
{
    private $params;

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
        if (array_key_exists('page', $this->params)) {
              unset($this->params['page']);
        }

        return $this->params;
    }
}
