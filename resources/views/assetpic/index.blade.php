@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center ">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-sm-flex align-items-center justify-content-between py-3">
                        {{ __('Data Workplace') }}
                        <div>
                            <a href="{{ route('pic.create') }}"
                                class="d-none d-sm-inline-block btn btn-primary btn-sm shadow-sm">
                                <i class="fas fa-plus fa-sm"></i> Tambah</a>
                            <a href="{{ route('export.pic') }}"
                                class="d-none d-sm-inline-block btn btn-success btn-sm shadow-sm">
                                <i class="fas fa-file-excel fa-sm"></i> Export</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered" id="example-basic" width="100%">
                            <thead>
                                <tr>
                                    <th scope="col">Workplace</th>
                                    <th scope="col">Asset Code</th>
                                    <th scope="col">Asset Name</th>
                                    <th scope="col">Asset Description</th>
                                    <th scope="col">PIC</th>
                                    <th scope="col">Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($assetspic as $data)
                                    <tr data-tt-id="node-{{ $data->id }}">
                                        <td colspan="7" style="background: pink">
                                            {{ $data->name }}
                                        </td>
                                    </tr>
                                    @foreach ($data->asset as $item)
                                        <tr data-tt-id="1.{{ $item->code }}" data-tt-parent-id="node-{{ $data->id }}"
                                            style="background: green">
                                            <td></td>
                                            <td>{{ $item->code }}</td>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->description }}</td>
                                            @foreach ($item->pic as $value)
                                        <tr data-tt-id="1.1.{{ $item->code }}"
                                            data-tt-parent-id="node-{{ $data->id }}">
                                            <td colspan="4"></td>
                                            <td>{{ $value->pic }}</td>
                                            <td>{{ $value->is_active }}</td>
                                            <td>
                                                <a href="{{ route('pic.edit', $value->id) }}">Edit</a>
                                                <a href="{{ route('pic.destroy', $value->id) }}"
                                                    onclick="event.preventDefault();
                                        document.getElementById('delete-form').submit();">Delete</a>
                                                <form id="delete-form" action="{{ route('pic.destroy', $value->id) }}"
                                                    method="POST" class="d-none">
                                                    @csrf
                                                    @method('delete')
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-treetable/3.2.0/jquery.treetable.min.js"></script>
    <script>
        $("#example-basic").treetable({
            expandable: true,
        });
    </script>
@endsection
