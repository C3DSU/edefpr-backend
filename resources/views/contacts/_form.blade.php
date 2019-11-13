{!! form_start($form) !!}

<div class="row col-md-offset-1">

    <div class="col-md-5">
        <div class="box box-primary">

            <div class="box-header with-border">
                <h3 class="box-title">Informações Pessoais</h3>
            </div>

            <div class="box-body">
                <div class="form-group">
                    {!! form_label($form->assisted_id) !!}
                    {!! form_widget($form->assisted_id) !!}
                </div>

                <div class="form-group">
                    {!! form_label($form->name) !!}
                    {!! form_widget($form->name) !!}
                </div>

                <div class="form-group">
                    {!! form_label($form->phone) !!}
                    {!! form_widget($form->phone) !!}
                </div>

                <div class="form-group">
                    {!! form_label($form->email) !!}
                    {!! form_widget($form->email) !!}
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-5">
        <div class="box box-primary">

            <div class="box-header with-border">
                <h3 class="box-title">Endereço</h3>
            </div>

            <div class="box-body">
                <div class="form-group">
                    {!! form_label($form->postcode) !!}
                    {!! form_widget($form->postcode) !!}
                </div>

                <div class="form-group">
                    {!! form_label($form->street) !!}
                    {!! form_widget($form->street) !!}
                </div>

                <div class="form-group">
                    {!! form_label($form->neighborhood) !!}
                    {!! form_widget($form->neighborhood) !!}
                </div>

                <div class="form-group">
                    {!! form_label($form->number) !!}
                    {!! form_widget($form->number) !!}
                </div>

                <div class="form-group">
                    {!! form_label($form->complement) !!}
                    {!! form_widget($form->complement) !!}
                </div>

                <div class="form-group">
                    {!! form_label($form->uf) !!}
                    {!! form_widget($form->uf) !!}
                </div>

                <div class="form-group">
                    {!! form_label($form->city) !!}
                    {!! form_widget($form->city) !!}
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-10">
        {!! form_widget($form->submit) !!}
    </div>
</div>
{!! form_end($form) !!}
