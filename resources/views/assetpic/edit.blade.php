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
                        <form action="{{ route('asset.update', $item->id) }}" method="POST">
                            @csrf
                            @if (Auth::user()->role == 'admin')
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Asset</label>
                                    <select name="assets_id" class="form-control" id="asset">
                                        <option value="">--Pilih Asset--</option>
                                        @foreach ($asset as $data)
                                            <option value="{{ $data->id }}"
                                                @if ($item->assets_id == $data->id) selected @endif>
                                                {{ $data->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            @else
                                <input type="hidden" name="assets_id" value="{{ Auth::user()->assets_id }}">
                            @endif
                            <div class="form-group">
                                <label for="exampleInputEmail1">PIC Name</label>
                                <input type="text" class="form-control" name="pic" value="{{ $item->pic }}">
                            </div>
                            <div class="form-group form-check">
                                <input type="checkbox" class="form-check-input" name="is_active"
                                    @if ($item->is_active == 'Active') checked @endif>
                                <label class="form-check-label">Active</label>
                            </div>
                            <div class="form-group mt-3">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <a href="{{ route('pic.index') }}" class="btn btn-danger">Kembali</a>
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
