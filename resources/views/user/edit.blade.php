@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center ">
            <div class="col-md-12">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Form User</h6>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('user.update', $item->id) }}" method="POST">
                            @csrf
                            @method('put')
                            <div class="form-group">
                                <label for="exampleInputEmail1">Workplace</label>
                                <select name="workplaces_id" class="form-control" id="workplace">
                                    <option value="">--Pilih Workplace--</option>
                                    @foreach ($workplace as $data)
                                        <option value="{{ $data->id }}"
                                            @if ($item->workplaces_id == $data->id) selected @endif>
                                            {{ $data->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Name</label>
                                <input type="text" class="form-control" name="name" value="{{ $item->name }}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Email</label>
                                <input type="email" class="form-control" name="email" value="{{ $item->email }}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Password <sup style="color: red"> *Kosongkan Jika Tidak
                                        Ingin Ganti
                                        Password</sup></label>
                                <input id="password" type="password" class="form-control " name="password"
                                    autocomplete="new-password">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Confirm Password</label>
                                <input id="password-confirm" type="password" class="form-control"
                                    name="password_confirmation" autocomplete="new-password">
                            </div>
                            <div class="form-group">
                                <label for="">Role</label>
                                <select name="role" id="" class="form-control">
                                    <option value=""></option>
                                    <option value="admin" @if ($item->role == 'admin') selected @endif>Admin</option>
                                    <option value="user" @if ($item->role == 'user') selected @endif>User</option>
                                </select>
                            </div>
                            <div class="form-group form-check">
                                <input type="checkbox" class="form-check-input" name="is_active"
                                    @if ($item->is_active == 'Active') checked @endif>
                                <label class="form-check-label">Active</label>
                            </div>
                            <div class="form-group mt-3">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <a href="{{ route('user.index') }}" class="btn btn-danger">Kembali</a>
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
