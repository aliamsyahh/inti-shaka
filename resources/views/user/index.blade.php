@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center ">
            <div class="col-md-12">
                <div class="card shadow mb-4">
                    <div class="card-header d-sm-flex align-items-center justify-content-between py-3 ">
                        <h6 class="m-0 font-weight-bold text-primary">Data User</h6>
                        <div>
                            <a href="{{ route('user.create') }}"
                                class="d-none d-sm-inline-block btn btn-primary btn-sm shadow-sm">
                                <i class="fas fa-plus fa-sm"></i> Tambah</a>
                            <a href="{{ route('export.user') }}"
                                class="d-none d-sm-inline-block btn btn-success btn-sm shadow-sm">
                                <i class="fas fa-file-excel fa-sm"></i> Export</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table" id="user" width="100%">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Workplace</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Role</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $data)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $data->name }}</td>
                                            <td>{{ $data->email }}</td>
                                            <td>{{ $data->workplace->name }}</td>
                                            <td>{{ $data->is_active }}</td>
                                            <td>{{ $data->role }}</td>
                                            <td>
                                                <a href="{{ route('user.edit', $data->id) }}"
                                                    class="btn btn-sm btn-success"><i class="fas fa-edit"></i></a>
                                                <a href="{{ route('user.destroy', $data->id) }}"
                                                    onclick="event.preventDefault();
                                        document.getElementById('delete-form').submit();"
                                                    class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
                                                <form id="delete-form" action="{{ route('user.destroy', $data->id) }}"
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
            $('#user').dataTable();
        });
    </script>
@endsection
