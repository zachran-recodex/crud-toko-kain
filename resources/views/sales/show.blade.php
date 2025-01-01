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
                    <h5 class="card-title mb-0">Detail Penjualan</h5>

                    <a href="{{ route('sales.index') }}"
                       class="btn btn-primary text-sm btn-sm px-12 py-12 radius-8 d-flex align-items-center gap-2">
                        <iconify-icon icon="material-symbols:arrow-back-rounded" class="icon text-xl line-height-1"></iconify-icon>
                        Kembali
                    </a>
                </div>
                <div class="card-body">
                    <div class="row gy-3">
                        <!-- Nama Pelanggan -->
                        <div class="col-12">
                            <label for="customer_name" class="form-label">Nama Pelanggan:</label>
                            <p id="customer_name" class="form-control-plaintext">{{ $sale->customer_name }}</p>
                        </div>

                        <!-- Produk -->
                        <div class="col-12">
                            <label for="product_name" class="form-label">Produk:</label>
                            <p id="product_name" class="form-control-plaintext">{{ $sale->product->name }}</p>
                        </div>

                        <!-- Jumlah -->
                        <div class="col-12">
                            <label for="quantity" class="form-label">Jumlah:</label>
                            <p id="quantity" class="form-control-plaintext">{{ $sale->quantity }}</p>
                        </div>

                        <!-- Total Harga -->
                        <div class="col-12">
                            <label for="total_price" class="form-label">Total Harga:</label>
                            <p id="total_price" class="form-control-plaintext">Rp {{ number_format($sale->total_price, 0, ',', '.') }}</p>
                        </div>

                        <!-- Waktu Penjualan -->
                        <div class="col-12">
                            <label for="created_at" class="form-label">Tanggal Penjualan:</label>
                            <p id="created_at" class="form-control-plaintext">{{ $sale->created_at->format('d M Y, H:i') }}</p>
                        </div>

                        <!-- Tombol Aksi -->
                        <div class="col-12 text-end">
                            <a href="{{ route('sales.edit', $sale->id) }}" class="btn btn-primary">Edit</a>
                            <form action="{{ route('sales.destroy', $sale->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus penjualan ini?')">Hapus</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div><!-- card end -->
        </div>
    </div>
@endsection
