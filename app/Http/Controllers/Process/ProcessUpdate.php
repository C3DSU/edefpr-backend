<?php

namespace App\Http\Controllers\Process;

use App\Http\Controllers\Controller;
use App\Models\Process;
use App\Utils\LogActivity\LogActivityUtil;
use Illuminate\Http\Request;

class ProcessUpdate extends Controller
{
    /**
     * @param Request $request
     * @param Process $process
     * @return \Illuminate\Http\RedirectResponse
     */
    public function __invoke(Request $request, Process $process)
    {
        $process->update($request->all());
        $wage = Process::BRAZIL_MINIMUM_WAGE * 3;
        $standardFiscalUnitOfParana = 1500;
        $amountFamilyMinimumWage = Process::FAMILY_MINIMUM_WAGE_AMOUNT;

        try {
            if ($process->assisted->getAssetsPrice() > Process::STANDARD_FISCAL_UNIT_OF_PARANA * $standardFiscalUnitOfParana) {
                throw new \Exception("A soma dos bens do assistido excede $standardFiscalUnitOfParana UFP/PR");
            } elseif ($process->assisted->getNetFamilyIncome() > $wage) {
                $wage = money($wage);
                throw new \Exception("A soma da renda familiar do assistido excede R$ $wage");
            } elseif ($process->assisted->getFinancialInvestmentsTotal() > $amountFamilyMinimumWage * Process::BRAZIL_MINIMUM_WAGE) {
                throw new \Exception("A soma das aplicações do assistido excede $amountFamilyMinimumWage SMF");
            }
            $process->save();

            LogActivityUtil::register($request->user(), "Dados do processo $process->title atualizados");

            return redirect()
                ->route('processes.index')
                ->with('alert-success', 'Processo atualizado com sucesso!');
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->withInput($request->all())
                ->with('alert-danger', 'Falha na atualização do processo! ' . $e->getMessage());
        }
    }
}
