@extends('layouts.dashboard')

@php
    $title = 'Pelanggan';
    $subTitle = 'Pelanggan';
@endphp

@section('content')
    <div class="row gy-4">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex align-items-center flex-wrap justify-content-between">
                    <h5 class="card-title mb-0">Tambah Pelanggan</h5>

                    <a href="{{ route('customers.index') }}"
                       class="btn btn-primary text-sm btn-sm px-12 py-12 radius-8 d-flex align-items-center gap-2">
                        <iconify-icon icon="material-symbols:arrow-back-rounded" class="icon text-xl line-height-1"></iconify-icon>
                        Kembali
                    </a>
                </div>
                <div class="card-body">
                    <form action="{{ route('customers.store') }}" method="POST">
                        @csrf

                        <div class="row gy-3">
                            <div class="col-4">
                                <label for="name" class="form-label">Nama</label>
                                <input type="text" name="name" id="name" class="form-control"
                                       value="{{ $customer->name ?? '' }}">
                            </div>
                            <div class="col-4">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" name="email" id="email" class="form-control"
                                       value="{{ $customer->email ?? '' }}">
                            </div>
                            <div class="col-4">
                                <label for="phone" class="form-label">Nomor</label>
                                <input type="text" name="phone" id="phone" class="form-control"
                                       value="{{ $customer->phone ?? '' }}">
                            </div>
                            <div class="col-12">
                                <label for="address" class="form-label">Alamat</label>
                                <textarea name="address" id="address" class="form-control"></textarea>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary-600">Tambah</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div><!-- card end -->
        </div>
    </div>
@endsection
