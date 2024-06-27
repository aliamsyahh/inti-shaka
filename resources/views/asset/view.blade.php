@extends('layouts.master')
@section('content')
    <div class="card" style="width: 18rem;">
        <div class="card-body">
            {{ QrCode::size(250)->backgroundColor(255, 255, 204)->generate($item->code) }}
            <h5 class="card-title mt-5">{{ $item->name }}</h5>
            <p class="card-text">{{ $item->description }}</p>
            <a href="{{ route('asset.index') }}" class="btn btn-primary">Kembali</a>
        </div>
    </div>
@endsection
