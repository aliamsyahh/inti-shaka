@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center ">
            <div class="col-md-12">
                <div class="card shadow mb-4">
                    <div class="card-header d-sm-flex align-items-center justify-content-between py-3 ">
                        <h6 class="m-0 font-weight-bold text-primary">Data Company</h6>
                        <div>
                            <a href="{{ route('company.create') }}"
                                class="d-none d-sm-inline-block btn btn-primary btn-sm shadow-sm">
                                <i class="fas fa-plus fa-sm"></i> Tambah</a>
                            <a href="{{ route('export.company') }}"
                                class="d-none d-sm-inline-block btn btn-success btn-sm shadow-sm">
                                <i class="fas fa-file-excel fa-sm"></i> Export</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="workplace" width="100%">
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
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function() {
            $('#workplace').dataTable();
        });
    </script>
@endsection
