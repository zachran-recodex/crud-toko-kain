@extends('layouts.dashboard')

@php
    $title = 'Produk';
    $subTitle = 'Produk';
@endphp

@section('content')
    <div class="row gy-4">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h6 class="card-title mb-0">Tambah Produk</h6>
                </div>
                <div class="card-body">
                    <form action="{{ route('products.store') }}" method="POST">
                        @csrf

                        <div class="row gy-3">
                            <div class="col-12">
                                <label for="name" class="form-label">Nama</label>
                                <input type="text" name="name" id="name" class="form-control"
                                    value="{{ $product->name ?? '' }}">
                            </div>
                            <div class="col-6">
                                <label for="price_per_meter" class="form-label">Harga per Meter</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-base"> Rp </span>
                                    <input type="number" name="price_per_meter" id="price_per_meter" class="form-control"
                                        value="{{ $product->price_per_meter ?? '' }}">
                                </div>
                            </div>
                            <div class="col-6">
                                <label for="stock_quantity" class="form-label">Jumlah Stok</label>
                                <input type="number" name="stock_quantity" id="stock_quantity" class="form-control"
                                    value="{{ $product->stock_quantity ?? '' }}">
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
