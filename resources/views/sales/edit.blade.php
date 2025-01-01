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
                    <h5 class="card-title mb-0">Edit Penjualan</h5>

                    <a href="{{ route('sales.index') }}"
                       class="btn btn-primary text-sm btn-sm px-12 py-12 radius-8 d-flex align-items-center gap-2">
                        <iconify-icon icon="material-symbols:arrow-back-rounded" class="icon text-xl line-height-1"></iconify-icon>
                        Kembali
                    </a>
                </div>
                <div class="card-body">
                    <form action="{{ route('sales.update', $sale->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="row gy-3">
                            <!-- Input Nama Pelanggan -->
                            <div class="col-12">
                                <label for="customer_name">Nama Pelanggan</label>
                                <input type="text" name="customer_name" id="customer_name" class="form-control"
                                       placeholder="Masukkan Nama Pelanggan" value="{{ $sale->customer_name }}" required>
                            </div>

                            <!-- Dropdown Produk -->
                            <div class="col-12">
                                <label for="product_id">Produk yang Dijual</label>
                                <select id="product_id" class="form-control">
                                    <option value="" disabled selected>Pilih Produk</option>
                                    @foreach ($products as $product)
                                        <option value="{{ $product->id }}" data-name="{{ $product->name }}"
                                                data-stock="{{ $product->stock_quantity }}"
                                            {{ $sale->product_id == $product->id ? 'selected' : '' }}>
                                            {{ $product->name }} (Stock: {{ $product->stock_quantity }})
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Daftar Produk Terpilih -->
                            <div id="cart-container" class="col-12">
                                <div class="list-group" id="selected-products">
                                    <div class="list-group-item d-flex justify-content-between align-items-center" id="cart-item-{{ $sale->product_id }}">
                                        <div>
                                            <strong>{{ $sale->product->name }}</strong><br>
                                            <small>Stok Tersedia: {{ $sale->product->stock_quantity }}</small>
                                        </div>
                                        <div class="d-flex align-items-center">
                                            <input type="number"
                                                   name="quantity"
                                                   class="form-control me-2"
                                                   placeholder="Jumlah"
                                                   style="width: 150px;"
                                                   min="1"
                                                   max="{{ $sale->product->stock_quantity + $sale->quantity }}"
                                                   value="{{ $sale->quantity }}"
                                                   required
                                                   data-stock="{{ $sale->product->stock_quantity + $sale->quantity }}">
                                            <input type="hidden" name="product_id" value="{{ $sale->product_id }}">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Submit -->
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary-600">Simpan Perubahan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div><!-- card end -->
        </div>
    </div>

    <!-- Script -->
    <script>
        const productDropdown = document.getElementById('product_id');
        const cartContainer = document.getElementById('selected-products');

        productDropdown.addEventListener('change', function() {
            const selectedOption = this.options[this.selectedIndex];

            const productId = selectedOption.value;
            const productName = selectedOption.getAttribute('data-name');
            const stockQuantity = selectedOption.getAttribute('data-stock');

            if (document.getElementById(`cart-item-${productId}`)) {
                alert('Produk ini sudah dipilih.');
                return;
            }

            const div = document.createElement('div');
            div.id = `cart-item-${productId}`;
            div.classList.add('list-group-item', 'd-flex', 'justify-content-between', 'align-items-center');

            div.innerHTML = `
                <div>
                    <strong>${productName}</strong><br>
                    <small>Stok Tersedia: ${stockQuantity}</small>
                </div>
                <div class="d-flex align-items-center">
                    <input type="number"
                           name="quantity"
                           class="form-control me-2"
                           placeholder="Jumlah"
                           style="width: 150px;"
                           min="1"
                           max="${stockQuantity}"
                           required
                           data-stock="${stockQuantity}">
                    <input type="hidden" name="product_id" value="${productId}">
                </div>
            `;

            cartContainer.innerHTML = '';
            cartContainer.appendChild(div);
        });
    </script>
@endsection