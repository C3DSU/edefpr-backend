<?php

namespace App\Http\Controllers\Api\Assisted;

use App\Http\Controllers\Controller;
use App\Http\Requests\Assisted\StoreRequest;
use App\Http\Resources\Assisted as AssistedResource;
use App\Models\Assisted;

class AssistedStore extends Controller
{
    /**
     * @param StoreRequest $request
     * @return AssistedResource
     * @throws \Throwable
     */
    public function __invoke(StoreRequest $request)
    {
        /** @var Assisted $assisted */
        $assisted = new Assisted($request->all());

        $assisted->saveOrFail();

        return new AssistedResource($assisted);
    }
}
