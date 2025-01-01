@extends('layouts.dashboard')

@php
    $title = 'Penjualan';
    $subTitle = 'Penjualan';
    \Carbon\Carbon::setLocale('id');
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
                    <th scope="col">Nama Pelanggan</th>
                    <th scope="col">Produk</th>
                    <th scope="col">Jumlah</th>
                    <th scope="col">Total Harga</th>
                    <th scope="col">Tanggal Pembelian</th>
                    <th scope="col">Aksi</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($sales as $sale)
                    <tr>
                        <td>{{ $sale->customer_name }}</td>
                        <td>{{ $sale->product->name }}</td>
                        <td>{{ $sale->quantity }}</td>
                        <td>{{ format_rupiah($sale->total_price) }}</td>
                        <td>{{ $sale->created_at->translatedFormat('l, d F Y') }}</td>
                        <td class="d-flex flex-wrap gap-2">
                            <a href="{{ route('sales.edit', $sale->id) }}"
                               class="w-32-px h-32-px bg-success-focus text-success-main rounded-circle d-inline-flex align-items-center justify-content-center">
                                <iconify-icon icon="lucide:edit"></iconify-icon>
                            </a>
                            <form action="{{ route('sales.destroy', $sale->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button
                                    class="w-32-px h-32-px bg-danger-focus text-danger-main rounded-circle d-inline-flex align-items-center justify-content-center">
                                    <iconify-icon icon="mingcute:delete-2-line"></iconify-icon>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
