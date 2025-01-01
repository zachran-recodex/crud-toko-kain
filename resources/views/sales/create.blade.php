@extends('layouts.dashboard')

@php
    $title = 'Penjualan';
    $subTitle = 'Penjualan';
@endphp

@section('content')
    <div class="row gy-4">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex align-items-center flex-wrap justify-content-between">
                    <h5 class="card-title mb-0">Tambah Penjualan</h5>

                    <a href="{{ route('sales.index') }}"
                       class="btn btn-primary text-sm btn-sm px-12 py-12 radius-8 d-flex align-items-center gap-2">
                        <iconify-icon icon="material-symbols:arrow-back-rounded" class="icon text-xl line-height-1"></iconify-icon>
                        Kembali
                    </a>
                </div>
                <div class="card-body">
                    <form action="{{ route('sales.store') }}" method="POST">
                        @csrf
                        <div class="row gy-3">
                            <div class="col-12">
                                <label for="customer_name" class="form-label">Nama Pelanggan</label>
                                <input type="text" name="customer_name" id="customer_name" class="form-control">
                            </div>

                            <div class="col-4">
                                <label for="product_id" class="form-label">Produk</label>
                                <select name="product_id" id="product_id" class="form-control">
                                    @foreach($products as $product)
                                        <option value="{{ $product->id }}" data-price="{{ $product->price_per_yard }}" data-stock="{{ $product->stock_quantity }}">{{ $product->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-4">
                                <label for="product_price" class="form-label">Harga Produk</label>
                                <input type="text" id="product_price" class="form-control" readonly>
                            </div>

                            <div class="col-4">
                                <label for="product_stock" class="form-label">Stok Produk</label>
                                <input type="text" id="product_stock" class="form-control" readonly>
                            </div>

                            <div class="col-12">
                                <label for="quantity" class="form-label">Jumlah</label>
                                <input type="number" name="quantity" id="quantity" class="form-control" required>
                            </div>

                            <div class="col-12">
                                <button type="submit" class="btn btn-primary-600">Tambah</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <script>
        document.getElementById('product_id').addEventListener('change', function() {
            var selectedOption = this.options[this.selectedIndex];
            var productPrice = selectedOption.getAttribute('data-price');
            var productStock = selectedOption.getAttribute('data-stock');

            document.getElementById('product_price').value = new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR' }).format(productPrice);

            document.getElementById('product_stock').value = productStock;
        });

        document.addEventListener('DOMContentLoaded', function() {
            var selectedOption = document.getElementById('product_id').options[document.getElementById('product_id').selectedIndex];
            var productPrice = selectedOption.getAttribute('data-price');
            var productStock = selectedOption.getAttribute('data-stock');

            document.getElementById('product_price').value = new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR' }).format(productPrice);
            document.getElementById('product_stock').value = productStock;
        });
    </script>
@endsection
