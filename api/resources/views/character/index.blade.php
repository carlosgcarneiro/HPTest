@extends('layouts.app')

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
                            <a href="{{ url('characters/create') }}" class="btn-primary btn-sm">
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
                                <td>@lang('Student')</td>
                                <td>@lang('Role')</td>
                                <td>@lang('School')</td>
                                <td>@lang('Patronus')</td>
                                <td colspan="3" class="text-center">@lang('Actions')</td>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($characters as $character)
                                <tr>
                                    <td>{{$character->id}}</td>
                                    <td>{{$character->name}}</td>
                                    <td>{{$character->role->name}}</td>
                                    <td>{{$character->house->name}}</td>
                                    <td>{{$character->patronus->name}}</td>
                                    <td class="text-center p-0 align-middle" width="70">
                                        <a href="{{ route('characters.show', $character->id)}}"
                                           class="btn btn-info btn-sm">@lang('Show')
                                        </a>
                                    </td>
                                    <td class="text-center p-0 align-middle" width="70">
                                        <a href="{{ route('characters.edit', $character->id)}}"
                                           class="btn btn-primary btn-sm">@lang('Edit')
                                        </a>
                                    </td>
                                    <td class="text-center p-0 align-middle" width="70">
                                        <form action="{{ route('characters.destroy', $character->id)}}" method="post">
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