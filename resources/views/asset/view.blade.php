@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center ">
            <div class="col-md-12">
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        {{ QrCode::size(250)->backgroundColor(255, 255, 204)->generate($item->code) }}
                        <h5 class="card-title mt-5">{{ $item->name }}</h5>
                        <p class="card-text">{{ $item->description }}</p>
                        <a href="{{ route('asset.index') }}" class="btn btn-primary">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
