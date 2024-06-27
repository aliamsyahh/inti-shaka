@extends('layouts.master')
@section('content')
    <div class="card shadow mb-4">
        <div class="card-header d-sm-flex align-items-center justify-content-between py-3 ">
            <h6 class="m-0 font-weight-bold text-primary">Data Workplace</h6>
            <div>
                <a href="{{ route('asset.create') }}" class="d-none d-sm-inline-block btn btn-primary btn-sm shadow-sm">
                    <i class="fas fa-plus fa-sm"></i> Tambah</a>
                <a href="{{ route('export.asset') }}" class="d-none d-sm-inline-block btn btn-success btn-sm shadow-sm">
                    <i class="fas fa-file-excel fa-sm"></i> Export</a>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table" id="asset" width="100%">
                    <thead>
                        <tr>
                            <th scope="col">Asset Code</th>
                            <th scope="col">Asset Name</th>
                            <th scope="col">Asset Description</th>
                            <th scope="col">Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($assets as $data)
                            <tr>
                                <td>{{ $data->code }}</td>
                                <td>{{ $data->name }}</td>
                                <td width="20%">{{ $data->description }}</td>
                                <td>{{ $data->is_active }}</td>
                                <td>
                                    <a href="{{ route('asset.show', $data->id) }}" class="btn btn-sm btn-info"><i
                                            class="fas fa-eye"></i></a>
                                    <a href="{{ route('asset.edit', $data->id) }}" class="btn btn-sm btn-success"><i
                                            class="fas fa-edit"></i></a>
                                    <a href="{{ route('asset.destroy', $data->id) }}"
                                        onclick="event.preventDefault();
                                        document.getElementById('delete-form').submit();"
                                        class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
                                    <form id="delete-form" action="{{ route('asset.destroy', $data->id) }}" method="POST"
                                        class="d-none">
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
@endsection
@section('script')
    <script>
        $(document).ready(function() {
            $('#asset').dataTable();
        });
    </script>
@endsection
