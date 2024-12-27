@extends('layouts.dashboard')

@php
    $title = 'Dashboard';
    $subTitle = 'Toko Kain';
@endphp

@section('content')
    <div class="row mt-24 gy-0">
        <!-- Total Produk -->
        <div class="col-xxl-3 col-sm-6 pe-0">
            <div class="card-body p-20 bg-base border h-100 d-flex flex-column justify-content-center border-end-0">
                <div class="d-flex flex-wrap align-items-center justify-content-between gap-1 mb-8">
                    <div>
                        <span
                            class="mb-12 w-44-px h-44-px text-primary-600 bg-primary-light border border-primary-light-white flex-shrink-0 d-flex justify-content-center align-items-center radius-8 h6">
                            <iconify-icon icon="gridicons:product" class="icon"></iconify-icon>
                        </span>
                        <span class="mb-1 fw-medium text-secondary-light text-md">Total Produk</span>
                        <h6 class="fw-semibold text-primary-light mb-1">{{ $totalProducts }}</h6>
                    </div>
                </div>
            </div>
        </div>
        <!-- Total Penjualan -->
        <div class="col-xxl-3 col-sm-6 px-0">
            <div class="card-body p-20 bg-base border h-100 d-flex flex-column justify-content-center border-end-0">
                <div class="d-flex flex-wrap align-items-center justify-content-between gap-1 mb-8">
                    <div>
                        <span
                            class="mb-12 w-44-px h-44-px text-yellow bg-yellow-light border border-yellow-light-white flex-shrink-0 d-flex justify-content-center align-items-center radius-8 h6">
                            <iconify-icon icon="material-symbols:point-of-sale" class="icon"></iconify-icon>
                        </span>
                        <span class="mb-1 fw-medium text-secondary-light text-md">Total Penjualan</span>
                        <h6 class="fw-semibold text-primary-light mb-1">{{ $totalSales }}</h6>
                    </div>
                </div>
            </div>
        </div>
        <!-- Total Supplier -->
        <div class="col-xxl-3 col-sm-6 px-0">
            <div class="card-body p-20 bg-base border h-100 d-flex flex-column justify-content-center border-end-0">
                <div class="d-flex flex-wrap align-items-center justify-content-between gap-1 mb-8">
                    <div>
                        <span
                            class="mb-12 w-44-px h-44-px text-lilac bg-lilac-light border border-lilac-light-white flex-shrink-0 d-flex justify-content-center align-items-center radius-8 h6">
                            <iconify-icon icon="material-symbols:partner-exchange" class="icon"></iconify-icon>
                        </span>
                        <span class="mb-1 fw-medium text-secondary-light text-md">Total Supplier</span>
                        <h6 class="fw-semibold text-primary-light mb-1">{{ $totalSuppliers }}</h6>
                    </div>
                </div>
            </div>
        </div>
        <!-- Total Pendapatan -->
        <div class="col-xxl-3 col-sm-6 ps-0">
            <div class="card-body p-20 bg-base border h-100 d-flex flex-column justify-content-center">
                <div class="d-flex flex-wrap align-items-center justify-content-between gap-1 mb-8">
                    <div>
                        <span
                            class="mb-12 w-44-px h-44-px text-pink bg-pink-light border border-pink-light-white flex-shrink-0 d-flex justify-content-center align-items-center radius-8 h6">
                            <iconify-icon icon="ri:discount-percent-fill" class="icon"></iconify-icon>
                        </span>
                        <span class="mb-1 fw-medium text-secondary-light text-md">Total Pendapatan</span>
                        <h6 class="fw-semibold text-primary-light mb-1">{{ format_rupiah($totalRevenue, 2, ',', '.') }}</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
