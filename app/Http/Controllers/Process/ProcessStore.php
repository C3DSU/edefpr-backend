<?php

namespace App\Http\Controllers\Process;

use App\Http\Controllers\Controller;
use App\Models\Process;
use Illuminate\Http\Request;

class ProcessStore extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function __invoke(Request $request)
    {
        $process = new Process($request->all());
        $process->user_id = $request->user()->getAuthIdentifier();

        try {
            $process->save();

            return redirect()
                ->route('processes.index')
                ->with('alert-success', 'Processo cadastrado com sucesso!');
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->with('alert-danger', 'Falha no cadastro do processo!' . $e->getMessage());
        }
    }
}