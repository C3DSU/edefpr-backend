<?php

namespace App\Forms\FamilyComposition;

use App\Forms\Field;
use App\Models\Assisted;
use Kris\LaravelFormBuilder\Form;

class FamilyCompositionForm extends Form
{
    public function buildForm()
    {
        $this
            ->add('name', Field::TEXT, [
                'label' => 'Nome',
                'rules' => 'required|string'
            ])
            ->add('work', Field::TEXT, [
                'label' => 'Trabalho',
                'rules' => 'required|string'
            ])
            ->add('birth_date', Field::DATE, [
                'label' => 'Data de Nascimento',
                'rules' => 'required'
            ])
            ->add('income', Field::TEXT, [
                'label' => 'Renda',
                'rules' => 'required|double'
            ])
            ->add('legal_situation', Field::SELECT, [
                'label' => 'Situação Legal',
                'choices' => [
                    'general' => 'Geral',
                    'elderly' => 'Pessoa Idosa',
                    'child' => 'Criança/Adolescente',
                    'disabled-person' => 'Pessoa com deficiência',
                    'ex-prisoner' => 'Egresso Sistema Prisional'
                ],
                'empty_value' => 'Selecione a situação legal da pessoa',
                'rules' => 'required'
            ])
            ->add('kinship', Field::SELECT, [
                'label' => 'Grau de Parentesco',
                'choices' => [
                    'mother' => 'Mãe',
                    'father' => 'Pai',
                    'son' => 'Filho',
                    'daughter' => 'Filha',
                    'sister' => 'Irmã',
                    'brother' => 'Irmão',
                    'grandmother' => 'Avó',
                    'grandfather' => 'Avô',
                    'grandson' => 'Neto',
                    'granddaughter' => 'Neta',
                    'uncle' => 'Tio',
                    'aunt' => 'Tia',
                    'nephew' => 'Sobrinho',
                    'niece' => 'Sobrinha',
                    'cousin' => 'Primo/Prima',
                    'wife' => 'Esposa',
                    'husband' => 'Esposo',
                    'stepfather' => 'Padastro',
                    'stepmother' => 'Madastra',
                    'stepbrother' => 'Meio-irmão',
                    'stepsister' => 'Meio-Irmã'
                ],
                'empty_value' => 'Selecione um grau de parentesco',
                'rules' => 'required'
            ])
            ->add('assisted_id', 'entity', [
                'label' => 'Assistido',
                'class' => Assisted::class,
                'property' => 'name',
                'rules' => 'required',
                'empty_value' => 'Selecione um assistido',
                'empty_data' => null
            ])
            ->add('submit', Field::BUTTON_SUBMIT, [
                'label' => 'Salvar'
            ]);
    }
}
