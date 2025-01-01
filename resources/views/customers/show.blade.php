@extends('layouts.dashboard')

@php
    $title = 'Customer';
    $subTitle = 'Customer';
@endphp

@section('content')
    <div class="card">
        <div class="card-header d-flex align-items-center flex-wrap justify-content-between">
            <h5 class="card-title mb-0">Detail Pelanggan</h5>

            <a href="{{ route('customers.index') }}"
               class="btn btn-primary text-sm btn-sm px-12 py-12 radius-8 d-flex align-items-center gap-2">
                <iconify-icon icon="material-symbols:arrow-back-rounded" class="icon text-xl line-height-1"></iconify-icon>
                Kembali
            </a>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <tbody>
                <tr>
                    <th>Nama</th>
                    <td>{{ $customer->name }}</td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td>{{ $customer->email }}</td>
                </tr>
                <tr>
                    <th>Telepon</th>
                    <td>{{ $customer->phone ?? 'Tidak tersedia' }}</td>
                </tr>
                <tr>
                    <th>Alamat</th>
                    <td>{{ $customer->address ?? 'Tidak tersedia' }}</td>
                </tr>
                <tr>
                    <th>Dibuat pada</th>
                    <td>{{ $customer->created_at->translatedFormat('l, d F Y H:i') }}</td>
                </tr>
                <tr>
                    <th>Diubah pada</th>
                    <td>{{ $customer->updated_at->translatedFormat('l, d F Y H:i') }}</td>
                </tr>
                </tbody>
            </table>
            <a href="{{ route('customers.index') }}" class="btn btn-secondary mt-3">Kembali</a>
        </div>
    </div>
@endsection
