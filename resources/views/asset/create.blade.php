@extends('layouts.master')
@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Form Asset</h6>
        </div>
        <div class="card-body">
            <form action="{{ route('asset.store') }}" method="POST">
                @csrf
                @if (Auth::user()->role == 'admin')
                    <div class="form-group">
                        <label for="exampleInputEmail1">Workplace</label>
                        <select name="workplaces_id" class="form-control" id="workplace">
                            <option value="">--Pilih Workplace--</option>
                            @foreach ($workplace as $data)
                                <option value="{{ $data->id }}">{{ $data->name }}</option>
                            @endforeach
                        </select>
                    </div>
                @else
                    <input type="hidden" name="workplaces_id" value="{{ Auth::user()->workplaces_id }}">
                @endif
                <div class="form-group">
                    <label for="exampleInputEmail1">Name Asset</label>
                    <input type="text" class="form-control" name="name" required>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Asset Description</label>
                    <input type="text" class="form-control" name="description" required>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Asset PIC</label>
                    <input type="text" class="form-control" name="pic" required>
                </div>
                <div class="form-group form-check">
                    <input type="checkbox" class="form-check-input" name="is_active" {{ old('remember') ? 'checked' : '' }}>
                    <label class="form-check-label">Active</label>
                </div>
                <div class="form-group mt-3">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a href="{{ route('asset.index') }}" class="btn btn-danger">Kembali</a>
                </div>
            </form>
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
