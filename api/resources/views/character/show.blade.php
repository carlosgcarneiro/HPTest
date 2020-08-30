@extends('character.default')

@section('title',__($character->name . 'HP (CRUD Laravel)'))

@push('css')
    <style>
        table{
            font-family: Verdana,sans-serif;
            border: 1px solid #ccc;
            margin: 20px 0;
        }

        table th{
            padding:10px;
            font-weight: normal;
        }
    </style>
@endpush

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between w-100">
                            <span class="text-info">{{$character->name}}</span>
                            <a href="{{ url('characters') }}" class="btn-info btn-sm">
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


                        <table class="w3-table-all notranslate" width="100%" border="1">
                            <tbody>
                            <tr>
                                <th align="left"><strong>ID:</strong></th>
                                <th align="left">{{$character->id}}</th>
                            </tr>
                            <tr>
                                <th align="left"><strong>@lang('Role')</strong>:</th>
                                <th align="left">{{$character->role->name}}</th>
                            </tr>
                            <tr>
                                <th align="left"><strong>@lang('House')</strong>:</th>
                                <th align="left">{{$character->house->name}}</th>
                            </tr>
                            <tr>
                                <th align="left"><strong>@lang('House API Code')</strong>:</th>
                                <th align="left">{{$character->house->potterapi_id}}</th>
                            </tr>
                            <tr>
                                <th align="left"><strong>@lang('Patronus')</strong>:</th>
                                <th align="left">{{$character->patronus->name}}</th>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script>
        // Script personalizado
    </script>
@endpush