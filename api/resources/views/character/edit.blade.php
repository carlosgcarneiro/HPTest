@extends('layouts.app')

@section('title',__('Editar HP (CRUD Laravel)'));

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
                            <span>{{$character->name}} - @lang('Editar HP (CRUD Laravel)')</span>
                            <a href="{{ url('characters') }}" class="btn-info btn-sm">
                                <i class="fa fa-arrow-left"></i> @lang('Back')
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        {!! Form::open(['action' => ['CharacterController@update',$character->id], 'method' => 'PUT'])!!}


                        <div class="form-group">
                            {!! Form::label(__('Name:')) !!}
                            {!! Form::text("name", $character->name ,["id" => "name", "class"=>"form-control mmss","required"=>"required"]) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label(__('Role:')) !!}
                            {!! Form::select("role_id", $role->pluck('name') , $character->role->id-1, ["class"=>"form-control","required"=>"required"]) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label(__('House:')) !!}
                            {!! Form::select("house_id", $house->pluck('name') , $character->house->id-1, ["class"=>"form-control","required"=>"required"]) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label(__('Patronus:')) !!}
                            {!! Form::select("patronus_id", $patronus->pluck('name') , $character->patronus->id-1, ["class"=>"form-control","required"=>"required"]) !!}
                        </div>

                        <div class="well well-sm clearfix">
                            <button class="btn btn-success pull-right" title="@lang('Salvar')"
                                    type="submit">@lang('Save')</button>
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