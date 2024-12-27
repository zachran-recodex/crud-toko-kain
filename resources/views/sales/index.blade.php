@extends('layouts.dashboard')

@php
    $title = 'Penjualan';
    $subTitle = 'Penjualan';
@endphp

@section('content')
    <div class="card basic-data-table">
        <div class="card-header d-flex align-items-center flex-wrap justify-content-between">
            <h5 class="card-title mb-0">List Penjualan</h5>

            <a href="{{ route('sales.create') }}"
                class="btn btn-primary text-sm btn-sm px-12 py-12 radius-8 d-flex align-items-center gap-2">
                <iconify-icon icon="ic:baseline-plus" class="icon text-xl line-height-1"></iconify-icon>
                Tambah Penjualan
            </a>
        </div>
        <div class="card-body">
            <table class="table bordered-table mb-0" id="dataTable" data-page-length='10'>
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Produk</th>
                        <th scope="col">Nama Pelanggan</th>
                        <th scope="col">Kuantitas</th>
                        <th scope="col">Total Harga</th>
                        <th scope="col">Tanggal Pembelian</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($sales as $sale)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $sale->product->name }}</td>
                            <td>{{ $sale->customer_name ?? 'N/A' }}</td>
                            <td>{{ $sale->quantity }}</td>
                            <td>{{ format_rupiah($sale->total_price) }}</td>
                            <td>{{ $sale->created_at->format('d-m-Y') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
