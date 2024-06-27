@extends('layouts.master')
@section('content')
    <div class="card shadow mb-4">
        <div class="card-header d-sm-flex align-items-center justify-content-between py-3 ">
            <h6 class="m-0 font-weight-bold text-primary">Data Workplace</h6>
            <div>
                <a href="{{ route('workplace.create') }}" class="d-none d-sm-inline-block btn btn-primary btn-sm shadow-sm">
                    <i class="fas fa-plus fa-sm"></i> Tambah Workplace</a>
                <a href="{{ route('export.workplace') }}" class="d-none d-sm-inline-block btn btn-success btn-sm shadow-sm">
                    <i class="fas fa-file-excel fa-sm"></i> Export</a>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-border" id="workplace" width="100%">
                    <thead>
                        <tr>
                            <th scope="col">Workplace</th>
                            <th scope="col">Asset Code</th>
                            <th scope="col">Asset Name</th>
                            <th scope="col">Asset Description</th>
                            <th scope="col">Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($workplaces as $data)
                            <tr data-tt-id="node-{{ $data->id }}">
                                <td colspan="6" style="background: pink">
                                    {{ $data->name }}
                                </td>
                            </tr>
                            @foreach ($data->asset as $item)
                                <tr data-tt-id="{{ $item->code }}" data-tt-parent-id="node-{{ $data->id }}">
                                    <td></td>
                                    <td>{{ $item->code }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td></td>
                                    {{-- <td>{{ $item->description }}</td> --}}
                                    <td>{{ $item->is_active }}</td>
                                    <td>
                                        <a href="{{ route('asset.edit', $item->id) }}">Edit</a>
                                        <a href="{{ route('company.edit', $item->id) }}">View</a>
                                    </td>
                                </tr>
                            @endforeach
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
            $('#workplace').dataTable();
        });
    </script>
@endsection
