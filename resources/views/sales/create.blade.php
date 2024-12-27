@extends('layouts.dashboard')

@php
    $title = 'Penjualan';
    $subTitle = 'Penjualan';
@endphp

@section('content')
    <div class="row gy-4">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h6 class="card-title mb-0">Tambah Penjualan</h6>
                </div>
                <div class="card-body">
                    <form action="{{ route('sales.store') }}" method="POST">
                        @csrf

                        <div class="row gy-3">
                            <div class="col-12">
                                <label for="product_id">Penjualan</label>
                                <select name="product_id" id="product_id" class="form-control" required>
                                    <option value="" selected disabled>Pilih Produk</option>
                                    @foreach ($products as $product)
                                        <option value="{{ $product->id }}">
                                            {{ $product->name }} (Stock: {{ $product->stock_quantity }})
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-6">
                                <label for="customer_name" class="form-label">Nama Pelanggan</label>
                                <input type="text" name="customer_name" id="customer_name" class="form-control">
                            </div>
                            <div class="col-6">
                                <label for="quantity" class="form-label">Jumlah</label>
                                <input type="number" name="quantity" id="quantity" class="form-control" min="1"
                                    required>
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
