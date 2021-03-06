<?php

namespace App\Http\Controllers\Assisted;

use App\Http\Controllers\Controller;
use App\Models\Assisted;
use App\Utils\LogActivity\LogActivityUtil;
use Illuminate\Http\Request;

class AssistedUpdate extends Controller
{
    /**
     * @param Request $request
     * @param Assisted $assisted
     * @return \Illuminate\Http\RedirectResponse
     */
    public function __invoke(Request $request, Assisted $assisted)
    {
        $assisted->update($request->all());

        try {
            $assisted->save();
            LogActivityUtil::register($request->user(), "Dados do assistido $assisted->name atualizados");

            return redirect()
                ->route('assisteds.show', $assisted->id)
                ->with('alert-success', 'Assistido atualizado com sucesso!');
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->with('alert-danger', 'Falha na atualização do assistido!');
        }
    }
}
