<aside class="sidebar">
    <button type="button" class="sidebar-close-btn">
        <iconify-icon icon="radix-icons:cross-2"></iconify-icon>
    </button>
    <div>
        <a href="{{ route('dashboard.index') }}" class="sidebar-logo">
            <span class="sidebar-title">TOKO KAIN</span>
        </a>
        <style>
            .sidebar-title {
                font-size: 24px;
                font-weight: bold;
                color: #333;
                display: block;
                text-align: center;
                margin: 20px 0;
            }
        </style>
    </div>
    <div class="sidebar-menu-area">
        <ul class="sidebar-menu" id="sidebar-menu">
            <li>
                <a href="{{ route('dashboard.index') }}">
                    <iconify-icon icon="solar:home-smile-angle-outline" class="menu-icon"></iconify-icon>
                    <span>Dashboard</span>
                </a>
            </li>
            <li class="sidebar-menu-group-title">CRUD</li>
            <li>
                <a href="{{ route('suppliers.index') }}">
                    <iconify-icon icon="material-symbols:partner-exchange" class="menu-icon"></iconify-icon>
                    <span>Supplier</span>
                </a>
            </li>
            <li>
                <a href="{{ route('customers.index') }}">
                    <iconify-icon icon="ix:customer-filled" class="menu-icon"></iconify-icon>
                    <span>Customer</span>
                </a>
            </li>
            <li>
                <a href="{{ route('products.index') }}">
                    <iconify-icon icon="gridicons:product" class="menu-icon"></iconify-icon>
                    <span>Produk</span>
                </a>
            </li>
            <li>
                <a href="{{ route('sales.index') }}">
                    <iconify-icon icon="material-symbols:point-of-sale" class="menu-icon"></iconify-icon>
                    <span>Penjualan</span>
                </a>
            </li>
        </ul>
    </div>
</aside>
