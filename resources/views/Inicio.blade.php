<!DOCTYPE html>
<html lang="en" data-bs-theme="auto">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Renting de maquinaria de gimnasio">
    <meta name="author" content="RentFit">
    <title>Inicio · RentFit</title>
    <meta name="theme-color" content="#712cf9">

    @vite(['resources/js/app.js', 'resources/css/inicio.css',"resources/js/inicio.js"])
</head>

<body>
    {{-- ICONOS TEMA (MISMOS QUE EN SUSCRIPCIÓN) --}}
    <svg xmlns="http://www.w3.org/2000/svg" class="d-none">
        <symbol id="check2" viewBox="0 0 16 16">
            <path
                d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z">
            </path>
        </symbol>
        <symbol id="circle-half" viewBox="0 0 16 16">
            <path d="M8 15A7 7 0 1 0 8 1v14zm0 1A8 8 0 1 1 8 0a8 8 0 0 1 0 16z"></path>
        </symbol>
        <symbol id="moon-stars-fill" viewBox="0 0 16 16">
            <path
                d="M6 .278a.768.768 0 0 1 .08.858 7.208 7.208 0 0 0-.878 3.46c0 4.021 3.278 7.277 7.318 7.277.527 0 1.04-.055 1.533-.16a.787.787 0 0 1 .81.316.733.733 0 0 1-.031.893A8.349 8.349 0 0 1 8.344 16C3.734 16 0 12.286 0 7.71 0 4.266 2.114 1.312 5.124.06A.752.752 0 0 1 6 .278z">
            </path>
            <path
                d="M10.794 3.148a.217.217 0 0 1 .412 0l.387 1.162c.173.518.579.924 1.097 1.097l1.162.387a.217.217 0 0 1 0 .412l-1.162.387a1.734 1.734 0 0 0-1.097 1.097l-.387 1.162a.217.217 0 0 1-.412 0l-.387-1.162A1.734 1.734 0 0 0 9.31 6.593l-1.162-.387a.217.217 0 0 1 0-.412l1.162-.387a1.734 1.734 0 0 0 1.097-1.097l.387-1.162z">
            </path>
        </symbol>
        <symbol id="sun-fill" viewBox="0 0 16 16">
            <path
                d="M8 12a4 4 0 1 0 0-8 4 4 0 0 0 0 8zM8 0a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 0zm0 13a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 13zm8-5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2a.5.5 0 0 1 .5.5zM3 8a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2A.5.5 0 0 1 3 8zm10.657-5.657a.5.5 0 0 1 0 .707l-1.414 1.415a.5.5 0 1 1-.707-.708l1.414-1.414a.5.5 0 0 1 .707 0zm-9.193 9.193a.5.5 0 0 1 0 .707L3.05 13.657a.5.5 0 0 1-.707-.707l1.414-1.414a.5.5 0 0 1 .707 0zm9.193 2.121a.5.5 0 0 1-.707 0l-1.414-1.414a.5.5 0 0 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .707zM4.464 4.465a.5.5 0 0 1-.707 0L2.343 3.05a.5.5 0 1 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .708z">
            </path>
        </symbol>
    </svg>

    <div class="dropdown position-fixed bottom-0 end-0 mb-3 me-3 bd-mode-toggle">
        <button class="btn btn-bd-primary py-2 dropdown-toggle d-flex align-items-center" id="bd-theme" type="button"
            aria-expanded="false" data-bs-toggle="dropdown" aria-label="Toggle theme (auto)">
            <svg class="bi my-1 theme-icon-active" aria-hidden="true">
                <use href="#circle-half"></use>
            </svg>
            <span class="visually-hidden" id="bd-theme-text">Toggle theme</span>
        </button>
        <ul class="dropdown-menu dropdown-menu-end shadow" aria-labelledby="bd-theme-text">
            <li>
                <button type="button" class="dropdown-item d-flex align-items-center" data-bs-theme-value="light">
                    <svg class="bi me-2 opacity-50" aria-hidden="true">
                        <use href="#sun-fill"></use>
                    </svg>
                    Light
                    <svg class="bi ms-auto d-none" aria-hidden="true">
                        <use href="#check2"></use>
                    </svg>
                </button>
            </li>
            <li>
                <button type="button" class="dropdown-item d-flex align-items-center" data-bs-theme-value="dark">
                    <svg class="bi me-2 opacity-50" aria-hidden="true">
                        <use href="#moon-stars-fill"></use>
                    </svg>
                    Dark
                    <svg class="bi ms-auto d-none" aria-hidden="true">
                        <use href="#check2"></use>
                    </svg>
                </button>
            </li>
            <li>
                <button type="button" class="dropdown-item d-flex align-items-center active"
                    data-bs-theme-value="auto">
                    <svg class="bi me-2 opacity-50" aria-hidden="true">
                        <use href="#circle-half"></use>
                    </svg>
                    Auto
                    <svg class="bi ms-auto d-none" aria-hidden="true">
                        <use href="#check2"></use>
                    </svg>
                </button>
            </li>
        </ul>
    </div>

    @include('components.Header')

    {{-- ================= HERO A ANCHO COMPLETO ================= --}}
<section id="hero" class="position-relative" style="margin-top: 1px;"> 

    {{-- IMAGEN HERO FULL WIDTH --}}
    <img src="{{ asset('assets/images/HeroBanner.png') }}"
         class="img-fluid w-100"
         style="height: 480px; object-fit: cover; object-position: center;">

    {{-- BLOQUE TEXTO SUPERPUESTO --}}
   <div class="position-absolute"
     style="
         top: 54%;               /* MÁS ABAJO */
         left: 78%;              /* MÁS A LA DERECHA */
         transform: translate(-50%, -50%);
         background-color: #f6e7cf;
         padding: 55px 60px;
         border-radius: 18px;
         box-shadow: 0 6px 30px rgba(0,0,0,0.35);
         width: 520px;           /* UN POCO MÁS ANCHO */
     ">

        <h1 class="fw-bold mb-3" style="font-size: 2.8rem; line-height: 1.2;">
            Descubre nuestra<br>colección
        </h1>

        <p class="mb-4" style="font-size: 1.15rem;">
            Equipamiento, suscripciones y servicios de renting para tu gimnasio.
        </p>

        <a href="{{ route('suscripcion.vista') }}" 
           class="btn btn-dark btn-lg px-4">
            Ver suscripciones
        </a>

    </div>

</section>
            {{-- ================= NOVEDADES PREMIUM ================= --}}
<div class="container py-5 mt-4">

    <h2 class="text-center mb-5" style="font-size: 2.3rem; font-weight: 600;">
        Novedades
    </h2>

    <div class="row row-cols-1 row-cols-md-3 g-4">

        {{-- NOVEDAD 1 --}}
        <div class="col">
            <div class="card novedades-card h-100">
                <img src="{{ asset('assets/images/Pesas12,5.png') }}" 
                     class="card-img-top novedades-img"
                     alt="Novedad 1">

                <div class="card-body text-center">
                    <h5 class="card-title">Mancuernas 12.5 Kg</h5>
                    <p class="card-text">Descripción breve del producto.</p>
                </div>
            </div>
        </div>

        {{-- NOVEDAD 2 --}}
        <div class="col">
            <div class="card novedades-card h-100">
                <img src="{{ asset('assets/images/asiento.png') }}" 
                     class="card-img-top novedades-img"
                     alt="Novedad 2">

                <div class="card-body text-center">
                    <h5 class="card-title">Banco Ajustable</h5>
                    <p class="card-text">Descripción breve del producto.</p>
                </div>
            </div>
        </div>

        {{-- NOVEDAD 3 --}}
        <div class="col">
            <div class="card novedades-card h-100">
                <img src="{{ asset('assets/images/BarritaProte.png') }}" 
                     class="card-img-top novedades-img"
                     alt="Novedad 3">

                <div class="card-body text-center">
                    <h5 class="card-title">Barrita de Proteinas</h5>
                    <p class="card-text">Descripción breve del producto.</p>
                </div>
            </div>
        </div>

    </div>
</div>

 {{-- ================= ESPECIALIDADES – CARRUSEL INFINITO ================= --}}
<section id="especialidades" class="mb-5">
    <div class="container py-5">
        <h2 class="text-center mb-4">Especialidades</h2>

        <div class="carrusel-especialidades">
            <div class="carrusel-track">

                {{-- Items (puedes cambiar las imágenes) --}}
                <div class="carrusel-item">
                    <img src="{{ asset('assets/images/Maquina1.png') }}" alt="Especialidad 1">
                </div>
                <div class="carrusel-item">
                    <img src="{{ asset('assets/images/Maquina2.png') }}" alt="Especialidad 2">
                </div>
                <div class="carrusel-item">
                    <img src="{{ asset('assets/images/Maquina3.png') }}" alt="Especialidad 3">
                </div>
                <div class="carrusel-item">
                    <img src="{{ asset('assets/images/Maquina4.png') }}" alt="Especialidad 4">
                </div>
                <div class="carrusel-item">
                    <img src="{{ asset('assets/images/Maquina5.png') }}" alt="Especialidad 5">
                </div>
                <div class="carrusel-item">
                    <img src="{{ asset('assets/images/BalonFitness.png') }}" alt="Especialidad 6">
                </div>

                {{-- DUPLICADOS para que el bucle sea infinito y no se note el corte --}}
                <div class="carrusel-item">
                    <img src="{{ asset('assets/images/Maquina1.png') }}" alt="Especialidad 1 copia">
                </div>
                <div class="carrusel-item">
                    <img src="{{ asset('assets/images/Maquina2.png') }}" alt="Especialidad 2 copia">
                </div>
                <div class="carrusel-item">
                    <img src="{{ asset('assets/images/Maquina3.png')}}" alt="Especialidad 3 copia">
                </div>
                <div class="carrusel-item">
                    <img src="{{ asset('assets/images/Maquina4.png') }}" alt="Especialidad 4 copia">
                </div>
                <div class="carrusel-item">
                    <img src="{{ asset('assets/images/Maquina5.png')  }}" alt="Especialidad 5 copia">
                </div>
                <div class="carrusel-item">
                    <img src="{{ asset('assets/images/BalonFitness.png')  }}" alt="Especialidad 6 copia">
                </div>

            </div>
        </div>
    </div>
</section>

        </main>

        <footer class="pt-4 my-md-5 pt-md-5 border-top">
            @include('components.Footer')
        </footer>
    </div>
</body>

</html>