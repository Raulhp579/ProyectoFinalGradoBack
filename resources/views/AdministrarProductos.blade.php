<!DOCTYPE html>
<html lang="es" data-bs-theme="auto">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Productos · RentFit</title>

    @vite(['resources/js/app.js', 'resources/css/inicio.css'])
</head>

<body>

    {{-- Header --}}
    @include('components.Header')

    <div class="container py-5 mt-4">
        <main>

            {{-- TÍTULO + BOTÓN --}}
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2 class="mb-0 fw-bold" style="font-size: 2rem;">Productos</h2>

               <a href="{{ route('productos.create') }}" class="btn btn-dark btn-lg">
                Añadir producto
               </a>
            </div>

            {{-- TABLA DE PRODUCTOS --}}
            <div class="table-responsive bg-white shadow-sm rounded-4 p-3">
                <table class="table table-hover align-middle productos-table mb-0">

                    <thead class="table-light">
                        <tr>
                            <th>Imagen</th>
                            <th>Nombre</th>
                            <th>Precio</th>
                            <th>Cantidad</th>
                            <th class="text-end">Acciones</th>
                        </tr>
                    </thead>

                    <tbody>

                        @foreach ($productos as $producto)
                            <tr>
                                <td style="width: 90px;">
                                    @if($producto->imagen)
                                        <img src="{{ asset($producto->imagen) }}" 
                                             class="img-fluid rounded productos-img"
                                             alt="{{ $producto->nombre }}">
                                    @else
                                        <span class="text-muted small">Sin imagen</span>
                                    @endif
                                </td>

                                <td class="fw-semibold">{{ $producto->nombre }}</td>

                                <td>{{ number_format($producto->precio, 2) }} €</td>

                                <td>{{ $producto->cantidad }}</td>

                                <td class="text-end">

                                    {{-- BOTÓN ELIMINAR --}}
                                    <form action="{{ route('productos.destroy', $producto->id) }}"
                                          method="POST"
                                          class="d-inline"
                                          onsubmit="return confirm('¿Seguro que quieres eliminar este producto?');">
                                        @csrf
                                        @method('DELETE')

                                        <button class="btn btn-sm btn-outline-danger">
                                            Eliminar
                                        </button>
                                    </form>

                                </td>
                            </tr>
                        @endforeach

                        @if($productos->isEmpty())
                            <tr>
                                <td colspan="5" class="text-center py-4 text-muted">
                                    No hay productos todavía.
                                </td>
                            </tr>
                        @endif

                    </tbody>

                </table>
            </div>
        </main>

        {{-- Footer --}}
        <footer class="pt-4 my-md-5 pt-md-5 border-top">
            @include('components.Footer')
        </footer>
    </div>

</body>
</html>