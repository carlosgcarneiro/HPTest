@extends('house.default')

@section('title',__('HP (CRUD Laravel)'))

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
                            <span>@lang('HP (CRUD Laravel)'))</span>
                            <a href="{{ url('houses/create') }}" class="btn-primary btn-sm">
                                <i class="fa fa-plus"></i> @lang('Add')
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success" role="alert">
                                {{ session('success') }}
                            </div>
                        @endif

                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <td>ID</td>
                                <td>@lang('House')</td>
                                <td>@lang('Potter API ID')</td>
                                <td colspan="3" class="text-center">@lang('Actions')</td>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($houses as $house)
                                <tr>
                                    <td>{{$house->id}}</td>
                                    <td>{{$house->potterapi_id}}</td>
                                    <td>{{$house->name}}</td>
                                    <td class="text-center p-0 align-middle" width="70">
                                        <a href="{{ route('houses.show', $house->id)}}"
                                           class="btn btn-info btn-sm">@lang('Show')
                                        </a>
                                    </td>
                                    <td class="text-center p-0 align-middle" width="70">
                                        <a href="{{ route('houses.edit', $house->id)}}"
                                           class="btn btn-primary btn-sm">@lang('Edit')
                                        </a>
                                    </td>
                                    <td class="text-center p-0 align-middle" width="70">
                                        <form action="{{ route('houses.destroy', $house->id)}}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger btn-sm" type="submit">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
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