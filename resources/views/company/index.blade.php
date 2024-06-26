@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-sm-flex align-items-center justify-content-between py-3">
                        {{ __('Company') }}
                        <a href="{{ route('company.create') }}"
                            class="d-none d-sm-inline-block btn btn-primary btn-sm shadow-sm">
                            <i class="fas fa-plus fa-sm"></i> Create Company</a>
                    </div>

                    <div class="card-body">
                        <table class="table">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name Company</th>
                                    <th scope="col">Npwp</th>
                                    <th scope="col">Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($companies as $data)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $data->name }}</td>
                                        <td>{{ $data->npwp }}</td>
                                        <td>{{ $data->is_active }}</td>
                                        <td>
                                            <a href="{{ route('company.edit', $data->id) }}"
                                                class="btn btn-sm btn-success"><i class="fas fa-edit"></i></a>
                                            <a href="{{ route('company.destroy', $data->id) }}"
                                                onclick="event.preventDefault();
                                                    document.getElementById('delete-form').submit();"
                                                class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
                                            <form id="delete-form" action="{{ route('company.destroy', $data->id) }}"
                                                method="POST" class="d-none">
                                                @csrf
                                                @method('delete')
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
