@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center ">
            <div class="col-md-12">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Form Asset</h6>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('pic.store') }}" method="POST">
                            @csrf
                            @if (Auth::user()->role == 'admin')
                                <div class="form-group">
                                    <label for="exampleInputEmail1">asset</label>
                                    <select name="assets_id" class="form-control" id="asset" required>
                                        <option value="">--Pilih asset--</option>
                                        @foreach ($asset as $data)
                                            <option value="{{ $data->id }}">{{ $data->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            @else
                                <div class="form-group">
                                    <label for="exampleInputEmail1">asset</label>
                                    <select name="assets_id" class="form-control" id="asset" required>
                                        <option value="">--Pilih asset--</option>
                                        @foreach (Auth::user()->workplace->asset as $data)
                                            <option value="{{ $data->id }}">{{ $data->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            @endif
                            <div class="form-group">
                                <label for="exampleInputEmail1">PIC Name</label>
                                <input type="text" class="form-control" name="pic" required>
                            </div>
                            <div class="form-group form-check">
                                <input type="checkbox" class="form-check-input" name="is_active"
                                    {{ old('remember') ? 'checked' : '' }}>
                                <label class="form-check-label">Active</label>
                            </div>
                            <div class="form-group mt-3">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <a href="{{ route('asset.index') }}" class="btn btn-danger">Kembali</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $("#workplace").select2({
            theme: "bootstrap4"
        });
    </script>
@endsection
