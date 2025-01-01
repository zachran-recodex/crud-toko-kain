@extends('layouts.dashboard')

@php
    $title = 'Stok';
    $subTitle = 'Stok';
@endphp

@section('content')
    <div class="row gy-4">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex align-items-center flex-wrap justify-content-between">
                    <h5 class="card-title mb-0">Edit Stok | {{ $product->name }}</h5>

                    <a href="{{ route('products.index') }}"
                       class="btn btn-primary text-sm btn-sm px-12 py-12 radius-8 d-flex align-items-center gap-2">
                        <iconify-icon icon="material-symbols:arrow-back-rounded" class="icon text-xl line-height-1"></iconify-icon>
                        Kembali
                    </a>
                </div>
                <div class="card-body">
                    <form action="{{ route('products.update-stock', $product) }}" method="POST">
                        @csrf

                        <div class="row gy-3">
                            <div class="col-12">
                                <label for="stock_quantity" class="form-label">Ubah Stok Menjadi:</label>
                                <input type="number" name="stock_quantity" id="stock_quantity" class="form-control"
                                    value="{{ $product->stock_quantity }}" min="0" required>
                            </div>

                            <div class="col-12">
                                <button type="submit" class="btn btn-primary-600">Simpan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div><!-- card end -->
        </div>
    </div>
@endsection
