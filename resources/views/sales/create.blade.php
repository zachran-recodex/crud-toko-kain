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
                            <!-- Input Nama Pelanggan -->
                            <div class="col-12">
                                <label for="customer_name">Nama Pelanggan</label>
                                <input type="text" name="customer_name" id="customer_name" class="form-control"
                                    placeholder="Masukkan Nama Pelanggan" required>
                            </div>

                            <!-- Dropdown Produk -->
                            <div class="col-12">
                                <label for="product_id">Produk yang Dijual</label>
                                <select id="product_id" class="form-control">
                                    <option value="" disabled selected>Pilih Produk</option>
                                    @foreach ($products as $product)
                                        <option value="{{ $product->id }}" data-name="{{ $product->name }}"
                                            data-stock="{{ $product->stock_quantity }}">
                                            {{ $product->name }} (Stock: {{ $product->stock_quantity }})
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Daftar Produk Terpilih -->
                            <div id="cart-container" class="col-12">
                                <div class="list-group" id="selected-products">
                                    <div class="list-group-item text-center text-muted">
                                        Belum ada produk yang dipilih.
                                    </div>
                                </div>
                            </div>

                            <!-- Submit -->
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary-600">Tambah</button>
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
                alert('Produk ini sudah ditambahkan.');
                return;
            }

            const emptyMessage = cartContainer.querySelector('.list-group-item.text-muted');
            if (emptyMessage) emptyMessage.remove();

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
                           name="quantities[${productId}]"
                           class="form-control me-2"
                           placeholder="Jumlah"
                           style="width: 150px;"
                           min="1"
                           max="${stockQuantity}"
                           required
                           data-stock="${stockQuantity}">
                    <input type="hidden" name="products[]" value="${productId}">
                    <button type="button" class="btn btn-danger btn-sm remove-product" data-id="${productId}">
                        Hapus
                    </button>
                </div>
            `;

            cartContainer.appendChild(div);

            div.querySelector('.remove-product').addEventListener('click', function() {
                div.remove();
                if (cartContainer.children.length === 0) {
                    const emptyDiv = document.createElement('div');
                    emptyDiv.className = 'list-group-item text-center text-muted';
                    emptyDiv.textContent = 'Belum ada produk yang dipilih.';
                    cartContainer.appendChild(emptyDiv);
                }
            });

            // Validasi input jumlah
            div.querySelector('input[type="number"]').addEventListener('input', function() {
                const quantity = parseInt(this.value);
                const maxStock = parseInt(this.getAttribute('data-stock'));
                if (quantity > maxStock) {
                    alert('Jumlah yang dimasukkan melebihi stok yang tersedia.');
                    this.value = maxStock;
                }
            });
        });
    </script>
@endsection
