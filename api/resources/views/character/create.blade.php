@extends('character.default')

@section('title',__('Criar HP (CRUD Laravel)'))

@push('css')
    <style>
        /* Personalizar layout*/
    </style>
@endpush

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between w-100">
                            <span>@lang('Criar HP (CRUD Laravel)')</span>
                            <a href="{{ url('character') }}" class="btn-info btn-sm">
                                <i class="fa fa-arrow-left"></i> @lang('Back')
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success" role="alert">
                                {{ session('success') }}
                            </div>
                        @endif

                        {!! Form::open(['action' =>'CharacterController@store', 'method' => 'POST'])!!}

                        <div class="form-group">
                            {!! Form::label(__('Name:')) !!}
                            {!! Form::text("name" , null, ["class"=>"form-control","required"=>"required"]) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label(__('Role:')) !!}
                            {!! Form::select("role_id", $role->pluck('name'), null,  ["class"=>"form-control","required"=>"required", "placeholder" => "Select a role..."]) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label(__('House:')) !!}
                            {!! Form::select("house_id", $house->pluck('name') , null, ["class"=>"form-control","required"=>"required", "placeholder" => "Select a house..."]) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label(__('Patronus:')) !!}
                            {!! Form::select("patronus_id", $patronus->pluck('name') , null,  ["class"=>"form-control","required"=>"required", "placeholder" => "Select a patronus..."]) !!}
                        </div>

                        <div class="well well-sm clearfix">
                            <button class="btn btn-success pull-right" title="@lang('Salvar')"
                                    type="submit">@lang('Adicionar')</button>
                        </div>

                        {!! Form::close() !!}


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script language='JavaScript'>
        $(".mmss").focusout(function () {
            var id = $(this).attr('id');
            var vall = $(this).val();
            var regex = /[^0-9]/gm;
            const result = vall.replace(regex, ``);
            $('#' + id).val(result);
        });
    </script>
@endpush