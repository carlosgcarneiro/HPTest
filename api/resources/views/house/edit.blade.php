@extends('house.default')

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
                            <span>{{$house->name}} - @lang('Editar HP (CRUD Laravel)')</span>
                            <a href="{{ url('houses') }}" class="btn-info btn-sm">
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
                        @if (session('fail'))
                            <div class="alert alert-danger" role="alert">
                                {{ session('fail') }}
                            </div>
                        @endif


                        <div class="form-group">
                            <span>@lang('To load a Hogwarts\' house name from Potter API, insert the Potter API ID value and click at Load button')</span>
                        </div>

                        {!! Form::open(['action' => ['HouseController@update',$house->id], 'method' => 'PUT'])!!}

                        <div class="form-group">
                            {!! Form::label(__('Name:')) !!}
                            {!! Form::text("name" , $house->name, ["id"=>"name", "class"=>"form-control","required"=>"required"]) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label(__('Potter API ID:')) !!}
                            {!! Form::text("potterapi_id" , $house->potterapi_id, ["id"=>"potterapi_id", "class"=>"form-control","required"=>"required"]) !!}
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script>
        jQuery(document).ready(function($){
            jQuery('#load').click(function () {
                if($('#potterapi_id').val().length>0){
                    $.ajax({
                        url: '/api/v1/house_potterapi_id/'+$('#potterapi_id').val(),
                        type: 'GET',
                        success: function (data) {
                            if(data.length>0){
                                $('#name').val(data);
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