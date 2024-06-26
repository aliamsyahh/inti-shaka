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
                        <table class="table" id="Workplace">
                            <thead class="thead-dark">
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
                                    <tr data-tt-id="{{ $data->id }}">
                                        <td colspan="5">
                                            {{ $data->name }}
                                        </td>
                                    </tr>
                                    @foreach ($data->asset as $item)
                                        <tr data-tt-parent-id="{{ $data->id }}">
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
        </div>
    </div>
@endsection
@section('script')
    <script>
        $('#workplace').treetable({
            expandable: true,
        });
        $('#workplace').dataTable();
    </script>
@endsection
