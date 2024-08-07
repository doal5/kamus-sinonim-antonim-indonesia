@extends('layouts.master')
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body">
                <h2 class="text-center">Kamus Sinonim Antonim Bahasa Indonesia</h2>
            </div>
        </div>
        <div class="card shadow-sm">
            <div class="card-body">
                <form method="POST" action="{{ route('home.cari') }}" class="row g-3">
                    @csrf

                    <div class="col-sm-8 shadow-sm">
                        <label for="search" class="visually-hidden">Masukan Kata</label>
                        <input type="text" class="form-control" id="search" value="{{ $kata ?? '' }}" name="search"
                            placeholder="Masukan Kata">
                    </div>
                    <div class="col-sm-3 shadow-sm text-capitalize">
                        <select name="kategori" id="" class="form-select" aria-label="Default select example">
                            <option value="">Sinonim | Antonim</option>
                            <option value="sinonim">Sinonim</option>
                            <option value="antonim">Antonim</option>
                        </select>
                    </div>

                    <div class="col-auto">
                        <button type="submit" class="btn btn-primary mb-3">Cari</button>
                    </div>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </form>
                <div class="card text-capitalize">
                    <div class="card-body shadow-sm">
                        <div class="card mb-3 shadow-sm">
                            <div class="card-body border-bottom shadow-md">
                                <h6>kata yang anda cari : {{ $kata ?? '' }}</h6>
                                <h6>Kategori : {{ $kategori ?? '' }}</h6>
                            </div>
                            <div class="card-body">
                                <h5>Hasil</h5>
                                @if ($tipe ?? '')
                                    @if ($tipe['status']['code'] == 200)
                                        @php
                                            $katakunci = $tipe['data'];
                                        @endphp
                                        @foreach ($katakunci as $key => $item)
                                            <a href="kata/{!! html_entity_decode($item) !!}">{{ $item . ',' }}</a>
                                        @endforeach
                                    @else
                                        <b> <span
                                                class="badge bg-danger">{{ $katakunci = $tipe['status']['description'] }}</span>
                                        </b>
                                    @endif
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
