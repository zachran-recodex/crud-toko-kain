@extends('layouts.dashboard')

@php
    $title = 'Produk';
    $subTitle = 'Produk';
@endphp

@section('content')
    <div class="row gy-4">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex align-items-center flex-wrap justify-content-between">
                    <h5 class="card-title mb-0">Edit Produk</h5>

                    <a href="{{ route('products.index') }}"
                       class="btn btn-primary text-sm btn-sm px-12 py-12 radius-8 d-flex align-items-center gap-2">
                        <iconify-icon icon="material-symbols:arrow-back-rounded" class="icon text-xl line-height-1"></iconify-icon>
                        Kembali
                    </a>
                </div>
                <div class="card-body">
                    <form action="{{ route('products.update', $product->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="row gy-3">
                            <div class="col-6">
                                <label for="name" class="form-label">Nama</label>
                                <input type="text" name="name" id="name" class="form-control"
                                       value="{{ old('name', $product->name) }}" required>
                            </div>
                            <div class="col-6">
                                <label for="stock_quantity" class="form-label">Jumlah Stok</label>
                                <input type="number" name="stock_quantity" id="stock_quantity" class="form-control"
                                       value="{{ old('stock_quantity', $product->stock_quantity) }}" required min="0">
                            </div>
                            <div class="col-6">
                                <label for="price_per_yard" class="form-label">Harga per Yard</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-base"> Rp </span>
                                    <input type="number" name="price_per_yard" id="price_per_yard" class="form-control"
                                           value="{{ old('price_per_yard', $product->price_per_yard) }}" required min="0">
                                </div>
                            </div>
                            <div class="col-6">
                                <label for="type" class="form-label">Jenis Produk</label>
                                <select name="type" id="type" class="form-select" required>
                                    <option value="polos" {{ old('type', $product->type) == 'polos' ? 'selected' : '' }}>Polos</option>
                                    <option value="motif" {{ old('type', $product->type) == 'motif' ? 'selected' : '' }}>Motif</option>
                                </select>
                                @error('type')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
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
