<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite(['resources/js/app.js', 'resources/js/Carrito.js'])
</head>

<style>
    .product-img-wrapper {
        height: 260px; 
        width: 100%;
        overflow: hidden;
        border-radius: 12px 12px 0 0;
    }

    .product-img {
        height: 100%;
        width: 100%;
        object-fit: contain; 
        object-position: center;
    }
</style>


{{-- Header --}}
@include('components.Header')
<body>
     {{-- HERO / CABECERA DE PÁGINA --}}
     <section class="position-relative">
        <div
            class="w-100"
            style="
            background: url('{{ asset('assets/images/HeroProducto.png') }}') center center / cover no-repeat;
            min-height: 280px;
        "
        >
            <div class="container h-100">
                <div class="row h-100 align-items-center">
                    <div class="col-12 text-center text-white">
                        <h1 class="display-4 fw-bold mb-2"></h1>
                        <nav aria-label="breadcrumb">
                            
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- BARRA DE FILTROS / OPCIONES SUPERIORES --}}
    <section class="py-3" style="background-color: #f6e8d7;">
        <div class="container">
            <div class="row align-items-center gy-2">

                <div class="col-md-4 d-flex align-items-center">
                    <button class="btn btn-outline-dark btn-sm me-3">
                        <i class="bi bi-funnel me-1"></i> Filter
                    </button>

                    <div class="btn-group btn-group-sm me-3" role="group">
                        <button type="button" class="btn btn-outline-secondary active">
                            <i class="bi bi-grid-3x3-gap-fill"></i>
                        </button>
                        <button type="button" class="btn btn-outline-secondary">
                            <i class="bi bi-list"></i>
                        </button>
                    </div>

                    <span class="small text-muted d-none d-md-inline">
                        Showing 1–16 of 32 results
                    </span>
                </div>

                <div class="col-md-8 d-flex justify-content-md-end justify-content-start align-items-center flex-wrap gap-2">
                    <div class="d-flex align-items-center me-3">
                        <span class="small me-2">Show</span>
                        <select class="form-select form-select-sm" style="width: 80px;">
                            <option selected>16</option>
                            <option>32</option>
                            <option>48</option>
                        </select>
                    </div>

                    <div class="d-flex align-items-center">
                        <span class="small me-2">Short by</span>
                        <select class="form-select form-select-sm" style="min-width: 130px;">
                            <option selected>Default</option>
                            <option>Precio: menor a mayor</option>
                            <option>Precio: mayor a menor</option>
                            <option>Nombre A-Z</option>
                            <option>Nombre Z-A</option>
                        </select>
                    </div>
                </div>

            </div>
        </div>
    </section>

    {{-- GRID DE PRODUCTOS --}}
    <section class="py-5">
        <div class="container">
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4">

                {{-- EJEMPLO DINÁMICO: usa tu colección $products --}}
                {{-- @foreach($products as $product)
                    <div class="col">
                        <div class="card border-0 h-100 shadow-sm">
                            <div class="position-relative">
                                <img
                                    src="{{ $product->image_url ?? asset('images/products/placeholder.jpg') }}"
                                    class="card-img-top"
                                    alt="{{ $product->name }}"
                                    style="object-fit: cover; height: 220px;"
                                >
                                @if($product->discount_percent ?? false)
                                    <span class="badge bg-danger position-absolute top-0 end-0 m-2">
                                        -{{ $product->discount_percent }}%
                                    </span>
                                @endif
                            </div>

                            <div class="card-body">
                                <p class="small text-muted mb-1">
                                    {{ $product->category->name ?? 'Maquinaria' }}
                                </p>
                                <h6 class="fw-semibold mb-2">{{ $product->name }}</h6>

                                <div class="d-flex flex-column">
                                    <span class="fw-bold">
                                        {{ number_format($product->price, 2, ',', '.') }}€/mes
                                    </span>

                                    @if(!empty($product->old_price))
                                        <small class="text-muted text-decoration-line-through">
                                            {{ number_format($product->old_price, 2, ',', '.') }}€/mes
                                        </small>
                                    @endif
                                </div>
                            </div>

                            <div class="card-footer bg-white border-0 pt-0">
                                <a href="" class="btn btn-outline-dark w-100 btn-sm">
                                    Ver detalle
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach --}}

                {{--SI TODAVÍA NO TIENES MODELO/DB, PUEDES PONER TARJETAS ESTÁTICAS COMO EJEMPLO:--}}
                
                <div class="col">
                    <div class="card border-0 h-100 shadow-sm d-flex flex-column">
                
                        {{-- Imagen uniforme --}}
                        <div class="product-img-wrapper">
                            <img src="{{ asset('assets/images/CintaCorrer.png') }}"
                                 class="product-img"
                                 alt="Cinta para cardio">
                        </div>
                
                        {{-- Contenido --}}
                        <div class="card-body d-flex flex-column">
                            <p class="small text-muted mb-1">Maquinaria</p>
                            <h6 class="fw-semibold mb-2">Cinta para cardio</h6>
                
                            <div class="mt-auto">
                                <span class="fw-bold">14,99€/mes</span>
                                <small class="text-muted text-decoration-line-through d-block">
                                    20,99€/mes
                                </small>
                            </div>
                        </div>
                
                    </div>
                </div>
                
                
                <div class="col">
                    <div class="card border-0 h-100 shadow-sm d-flex flex-column">
                
                        <div class="product-img-wrapper">
                            <img src="{{ asset('assets/images/BalonFitness.png') }}"
                                 class="product-img"
                                 alt="Balón de fitness">
                        </div>
                
                        <div class="card-body d-flex flex-column">
                            <p class="small text-muted mb-1">Balon Fitness</p>
                            <h6 class="fw-semibold mb-2"></h6>
                
                            <div class="mt-auto">
                                <span class="fw-bold">9,99€/mes</span>
                                <small class="text-muted text-decoration-line-through d-block">
                                    12,99€/mes
                                </small>
                            </div>
                        </div>
                
                    </div>
                </div>



                <div class="col">
                    <div class="card border-0 h-100 shadow-sm d-flex flex-column">
                
                        <div class="product-img-wrapper">
                            <img src="{{ asset('assets/images/Maquina1.png') }}"
                                 class="product-img"
                                 alt="Balón de fitness">
                        </div>
                
                        <div class="card-body d-flex flex-column">
                            <p class="small text-muted mb-1">Maquinaria</p>
                            <h6 class="fw-semibold mb-2">Multifuncional</h6>
                
                            <div class="mt-auto">
                                <span class="fw-bold">19,99€/mes</span>
                                <small class="text-muted text-decoration-line-through d-block">
                                    25,99€/mes
                                </small>
                            </div>
                        </div>
                
                    </div>
                </div>

            </div>

            {{-- PAGINACIÓN --}}
            <div class="d-flex justify-content-center mt-5">
                {{-- Si usas paginación de Laravel --}}
                {{-- {{ $products->links() }} --}}

                {{-- Si lo quieres estático tipo diseño:--}}
                <nav>
                    <ul class="pagination">
                        <li class="page-item active"><span class="page-link border-0 rounded-0 px-3">1</span></li>
                        <li class="page-item"><a class="page-link border-0 rounded-0 px-3" href="#">2</a></li>
                        <li class="page-item"><a class="page-link border-0 rounded-0 px-3" href="#">3</a></li>
                        <li class="page-item"><a class="page-link border-0 rounded-0 px-3" href="#">Próxima</a></li>
                    </ul>
                </nav>
                
            </div>
        </div>
    </section>

    {{-- BANDA DE VENTAJAS --}}
    <section class="py-4 border-top" style="background-color:rgb(246, 232, 215)">
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
    
</body>
<hr style="margin: 0">
@include('components.Footer')
</html>


   

