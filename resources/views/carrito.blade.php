{{-- Header --}}
@include('components.Header')
{{-- resources/views/carrito.blade.php --}}
@extends('layouts.app') {{-- Cambia esto si tu layout se llama distinto --}}

@section('content')
    {{-- Hero / Cabecera de página --}}
    <section class="position-relative">
        <div class="w-100"
            style="
                background: url('{{ asset('images/banners/cart-banner.jpg') }}') center center / cover no-repeat;
                min-height: 230px;
            ">
            <div class="container h-100">
                <div class="row h-100 align-items-center">
                    <div class="col-12 text-center text-white">
                        <h1 class="display-4 fw-bold mb-2">Carrito</h1>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb justify-content-center mb-0">
                                <li class="breadcrumb-item">
                                    <a href="{{ route('home') }}" class="text-decoration-none text-white-50">Inicio</a>
                                </li>
                                <li class="breadcrumb-item active text-white" aria-current="page">
                                    Carrito
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Contenido principal del carrito --}}
    <section class="py-5">
        <div class="container">
            <div class="row g-4">

                {{-- Tabla de productos --}}
                <div class="col-lg-8">
                    <div class="border rounded-3 p-4 bg-white">
                        <div class="row fw-semibold text-muted small mb-3 px-2">
                            <div class="col-md-6">Precio</div>
                            <div class="col-md-3 text-center">Cantidad</div>
                            <div class="col-md-3 text-end">Subtotal</div>
                        </div>

                        <hr class="mt-0 mb-3">

                        {{-- Ítem de carrito (ejemplo estático, cambia por tu bucle @foreach) --}}
                        <div class="row align-items-center gy-3">
                            <div class="col-md-6 d-flex align-items-center">
                                <img src="{{ asset('images/products/mancuerna-12-5kg.jpg') }}" alt="Mancuerna 12.5kg"
                                    class="img-fluid me-3" style="max-width: 80px; border-radius: 8px;">
                                <div>
                                    <p class="mb-0 fw-semibold small text-muted">Mancuerna 12.5kg</p>
                                    <p class="mb-0 small text-muted">2,99€/mes</p>
                                </div>
                            </div>

                            <div class="col-md-3 text-center">
                                <input type="number" min="1" value="1"
                                    class="form-control form-control-sm d-inline-block" style="max-width: 70px;">
                            </div>

                            <div class="col-md-3 d-flex justify-content-end align-items-center">
                                <span class="fw-semibold me-3">2,99€/mes</span>
                                <button class="btn btn-link text-muted p-0">
                                    <i class="bi bi-trash"></i> {{-- Bootstrap Icons --}}
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Resumen total del carrito --}}
                <div class="col-lg-4">
                    <div class="border rounded-3 p-4 bg-light">
                        <h5 class="fw-bold mb-4">Total del Carrito</h5>

                        <div class="d-flex justify-content-between mb-2 small">
                            <span class="text-muted">Subtotal</span>
                            <span class="text-muted">2,99€/mes</span>
                        </div>

                        <hr>

                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <span class="fw-semibold">Total</span>
                            <span class="fw-bold text-warning fs-5">2,99€/mes</span>
                        </div>

                        <button class="btn btn-dark w-100 py-2">
                            Verificar
                        </button>
                    </div>
                </div>

            </div>
        </div>
    </section>

    {{-- Banda de ventajas --}}
    <section class="py-4 bg-white border-top">
        <div class="container">
            <div class="row text-center gy-4">

                <div class="col-6 col-md-3">
                    <div class="d-flex flex-column align-items-center">
                        <i class="bi bi-trophy fs-2 mb-2"></i>
                        <h6 class="fw-semibold mb-1">Alta Calidad</h6>
                        <p class="small text-muted mb-0">Fabricado con lo mejor</p>
                    </div>
                </div>

                <div class="col-6 col-md-3">
                    <div class="d-flex flex-column align-items-center">
                        <i class="bi bi-shield-check fs-2 mb-2"></i>
                        <h6 class="fw-semibold mb-1">Garantía</h6>
                        <p class="small text-muted mb-0">A partir de 2 años</p>
                    </div>
                </div>

                <div class="col-6 col-md-3">
                    <div class="d-flex flex-column align-items-center">
                        <i class="bi bi-truck fs-2 mb-2"></i>
                        <h6 class="fw-semibold mb-1">Envío Gratis</h6>
                        <p class="small text-muted mb-0">Pedidos por encima 15 €</p>
                    </div>
                </div>

                <div class="col-6 col-md-3">
                    <div class="d-flex flex-column align-items-center">
                        <i class="bi bi-headset fs-2 mb-2"></i>
                        <h6 class="fw-semibold mb-1">24 / 7 Soporte</h6>
                        <p class="small text-muted mb-0">Soporte dedicado a ti</p>
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
