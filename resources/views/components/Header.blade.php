 <header class="hd">
        @vite(['resources/js/header.js'])
        <img class="" src="{{ asset('assets/images/LogoMarca.png') }}">
        <h1>RentFit</h1>

        <div class="dv_hd">
            <a href="index.html"><button>Inicio</button></a>
            <a href="producto.html"><button>Productos</button></a>
            <a href="suscripcion.html"><button>Suscripción</button></a>
            <a href="contacto.html"><button>Contacto</button></a>
        </div>

        <!-- poner los src -->
        <div class="dv_interacciones">
            <div class="dv_atencion">
                <button class="btn_atencion"><img src="{{ asset('assets/images/Atencion.png') }}"></button>
            </div>

            <div class="dv_busqueda">
                <button class="btn_busqueda"><img src="{{ asset('assets/images/Busqueda.png') }}"></button>
            </div>

            <div class="dv_fav">
                <button class="btn_fav"><img src="{{ asset('assets/images/Favorito.png') }}"></button>
            </div>

            <div class="dv_carrito">
                <button class="btn_carrito"><img src="{{ asset('assets/images/Carrito.png') }}"></button>
            </div>
        </div>

</header>