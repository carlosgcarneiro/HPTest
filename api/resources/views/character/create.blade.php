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
                            {!! Form::text("name" , null, ["id"=>"name", "class"=>"form-control","required"=>"required"]) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label(__('Role:')) !!}
                            {!! Form::select("role_id", $role->pluck('name'), null,  [ "class"=>"form-control","required"=>"required", "placeholder" => "Select a role..."]) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label(__('House:')) !!}
                            {!! Form::select("house_id", $house->pluck('name') , null, ["id"=>"house", "class"=>"form-control","required"=>"required", "placeholder" => "Select a house..."]) !!}
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
                        <div style="border:1px solid rgb(195, 195, 195); border-radius: 5px; margin-left: 10px; margin-top: 15px; overflow: auto; padding: 15px 15px;">
                            <div class="form-group">
                                <span>@lang('To load a Hogwarts\' character name and house from Potter API, insert the Potter API ID value and click at Load button')</span>
                            </div>

                            <div class="form-group">
                                {!! Form::label(__('Character Potter API ID:')) !!}
                                {!! Form::text("potterapi_id" , null, ["id"=>"potterapi_id", "class"=>"form-control","required"=>"required"]) !!}
                            </div>

                            <div class="well well-sm clearfix">
                                <button id="load" class="btn btn-primary pull-left" title="@lang('Salvar')"
                                        type="button">@lang('Load')</button>
                            </div>
                        </div>
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
    </script><script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script>
        jQuery(document).ready(function($){
            jQuery('#load').click(function () {
                if($('#potterapi_id').val().length>0){
                    $.ajax({
                        url: '/api/v1/character_potterapi_id/'+$('#potterapi_id').val(),
                        type: 'GET',
                        success: function (data) {
                            console.log(data);
                            if(data['name'].length>0){
                                $('#name').val(data['name']);
                                $('#house').val(data['house']);
                            }else{
                                alert("House not found.")
                            }
                        },
                        error: function (jqXHR, textStatus, errorThrown) {
                            alert("Server Error.")
                        }
                    });
                }else{
                    alert("Insert a Potter API ID and try again.")
                }
            });

        });
    </script>
@endpush