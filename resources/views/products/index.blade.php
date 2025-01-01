@extends('layouts.dashboard')

@php
    $title = 'Produk';
    $subTitle = 'Produk';
@endphp

@section('content')
    <div class="card basic-data-table">
        <div class="card-header d-flex align-items-center flex-wrap justify-content-between">
            <h5 class="card-title mb-0">List Produk</h5>

            <a href="{{ route('products.create') }}"
               class="btn btn-primary text-sm btn-sm px-12 py-12 radius-8 d-flex align-items-center gap-2">
                <iconify-icon icon="ic:baseline-plus" class="icon text-xl line-height-1"></iconify-icon>
                Tambah Produk
            </a>
        </div>
        <div class="card-body">
            <table class="table bordered-table mb-0" id="dataTable" data-page-length='10'>
                <thead>
                <tr>
                    <th scope="col">Nama</th>
                    <th scope="col">Tipe</th>
                    <th scope="col">Harga (per Yard)</th>
                    <th scope="col">Stok</th>
                    <th scope="col">Aksi</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td>{{ $product->name }}</td>
                        <td>
                                <span class="badge {{ $product->type === 'polos' ? 'bg-success' : 'bg-info' }}">
                                    {{ ucfirst($product->type) }}
                                </span>
                        </td>
                        <td>{{ format_rupiah($product->price_per_yard) }}</td>
                        <td>
                            <div class="rapih">
                                    <span class="bg-primary-600 text-white px-24 py-4 rounded-pill fw-medium text-sm">
                                        {{ $product->stock_quantity }}
                                    </span>
                                <a href="{{ route('products.edit-stock', $product) }}"
                                   class="w-32-px h-32-px border border-primary-600 text-primary-600 rounded-circle d-inline-flex align-items-center justify-content-center">
                                    <iconify-icon icon="lucide:edit"></iconify-icon>
                                </a>
                            </div>
                        </td>
                        <td>
                            <div class="rapih">
                                <a href="{{ route('products.show', $product->id) }}"
                                   class="w-32-px h-32-px bg-warning-focus text-warning-main rounded-circle d-inline-flex align-items-center justify-content-center">
                                    <iconify-icon icon="icon-park-outline:eyes"></iconify-icon>
                                </a>
                                <a href="{{ route('products.edit', $product->id) }}"
                                   class="w-32-px h-32-px bg-success-focus text-success-main rounded-circle d-inline-flex align-items-center justify-content-center">
                                    <iconify-icon icon="lucide:edit"></iconify-icon>
                                </a>
                                <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button
                                        class="w-32-px h-32-px bg-danger-focus text-danger-main rounded-circle d-inline-flex align-items-center justify-content-center">
                                        <iconify-icon icon="mingcute:delete-2-line"></iconify-icon>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <style>
        .rapih {
            display: flex;
            align-items: center;
            gap: 8px;
        }
        .badge {
            font-size: 0.875rem;
            padding: 0.25rem 0.5rem;
            border-radius: 0.375rem;
            color: #fff;
        }
    </style>
@endsection
