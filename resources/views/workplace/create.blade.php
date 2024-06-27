@extends('layouts.master')
@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Formulir Product Baru</h6>
        </div>
        <div class="card-body">
            <form action="{{ route('company.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="exampleInputEmail1">Name Company</label>
                    <input type="text" class="form-control" name="name" required>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">NPWP</label>
                    <input type="text" class="form-control" name="npwp" required>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Alamat</label>
                    <input type="text" class="form-control" name="address" required>
                </div>
                <div class="form-group form-check">
                    <input type="checkbox" class="form-check-input" name="is_active" {{ old('remember') ? 'checked' : '' }}>
                    <label class="form-check-label">Active</label>
                </div>
                <div class="form-group mt-3">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a href="{{ route('company.index') }}" class="btn btn-danger">Kembali</a>
                </div>
            </form>
        </div>
    </div>
@endsection
