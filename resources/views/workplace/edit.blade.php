@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center ">
            <div class="col-md-12">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Formulir Product Baru</h6>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('workplace.update', $item->id) }}" method="POST">
                            @csrf
                            @method('put')
                            <div class="form-group">
                                <label for="exampleInputEmail1">Name Workplace</label>
                                <select name="companies_id" class="form-control" id="">
                                    <option value="">--Pilih Company--</option>
                                    @foreach ($companies as $data)
                                        <option value="{{ $data->id }}"
                                            @if ($item->companies_id == $data->id) selected @endif>{{ $data->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Name Workplace</label>
                                <input type="text" class="form-control" name="name" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Contact Number</label>
                                <input type="number" class="form-control" name="contact_number" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Alamat</label>
                                <input type="text" class="form-control" name="address" required>
                            </div>
                            <div class="form-group form-check">
                                <input type="checkbox" class="form-check-input" name="is_active"
                                    {{ old('remember') ? 'checked' : '' }}>
                                <label class="form-check-label">Active</label>
                            </div>
                            <div class="form-group mt-3">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <a href="{{ route('workplace.index') }}" class="btn btn-danger">Kembali</a>
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
        CKEDITOR.replace('desc');
    </script>
@endsection
