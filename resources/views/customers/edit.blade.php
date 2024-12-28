@extends('layouts.dashboard')

@php
    $title = 'Customer';
    $subTitle = 'Customer';
@endphp

@section('content')
    <div class="row gy-4">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h6 class="card-title mb-0">Ubah Customer</h6>
                </div>
                <div class="card-body">
                    <form action="{{ route('customers.update', $customer->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="row gy-3">
                            <div class="col-4">
                                <label for="name" class="form-label">Nama</label>
                                <input type="text" name="name" id="name" class="form-control"
                                       value="{{ $customer->name ?? '' }}">
                            </div>
                            <div class="col-4">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" name="email" id="email" class="form-control"
                                       value="{{ $csustomer->email ?? '' }}">
                            </div>
                            <div class="col-4">
                                <label for="phone" class="form-label">Nomor</label>
                                <input type="number" name="phone" id="phone" class="form-control"
                                       value="{{ $customer->phone ?? '' }}">
                            </div>
                            <div class="col-12">
                                <label for="address" class="form-label">Alamat</label>
                                <textarea name="address" id="address" class="form-control"></textarea>
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
