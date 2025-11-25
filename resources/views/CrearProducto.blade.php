<!DOCTYPE html>
<html lang="es" data-bs-theme="auto">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Añadir producto · RentFit</title>

    @vite(['resources/js/app.js', 'resources/css/inicio.css'])
</head>

<body>
    @include('components.Header')

    <div class="container py-5 mt-4">
        <main>
            <div class="mb-4">
                <h2 class="fw-bold" style="font-size: 2rem;">Añadir producto</h2>
                <p class="text-muted mb-0">Completa los datos para crear un nuevo producto.</p>
            </div>

            {{-- Errores de validación --}}
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="card shadow-sm rounded-4">
                <div class="card-body p-4">

                    <form action="{{ route('productos.store') }}" method="POST">
                        @csrf

                        {{-- NOMBRE --}}
                        <div class="mb-3">
                            <label for="nombre" class="form-label">Nombre</label>
                            <input type="text"
                                   class="form-control @error('nombre') is-invalid @enderror"
                                   id="nombre"
                                   name="nombre"
                                   value="{{ old('nombre') }}"
                                   required>
                            @error('nombre')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- PRECIO --}}
                        <div class="mb-3">
                            <label for="precio" class="form-label">Precio (€)</label>
                            <input type="number"
                                   step="0.01"
                                   min="0"
                                   class="form-control @error('precio') is-invalid @enderror"
                                   id="precio"
                                   name="precio"
                                   value="{{ old('precio') }}"
                                   required>
                            @error('precio')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- CANTIDAD --}}
                        <div class="mb-3">
                            <label for="cantidad" class="form-label">Cantidad</label>
                            <input type="number"
                                   min="0"
                                   class="form-control @error('cantidad') is-invalid @enderror"
                                   id="cantidad"
                                   name="cantidad"
                                   value="{{ old('cantidad') }}"
                                   required>
                            @error('cantidad')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- IMAGEN (RUTA) --}}
                        <div class="mb-3">
                            <label for="imagen" class="form-label">Ruta de la imagen</label>
                            <input type="text"
                                   class="form-control @error('imagen') is-invalid @enderror"
                                   id="imagen"
                                   name="imagen"
                                   placeholder="assets/images/miProducto.png"
                                   value="{{ old('imagen') }}">
                            @error('imagen')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <div class="form-text">
                                Usa una ruta relativa dentro de <code>public/</code>, por ejemplo:
                                <code>assets/images/BarritaProte.png</code>
                            </div>
                        </div>

                        {{-- DESCRIPCIÓN (opcional) --}}
                        <div class="mb-4">
                            <label for="descripcion" class="form-label">Descripción (opcional)</label>
                            <textarea class="form-control @error('descripcion') is-invalid @enderror"
                                      id="descripcion"
                                      name="descripcion"
                                      rows="3">{{ old('descripcion') }}</textarea>
                            @error('descripcion')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="{{ route('productos.index') }}" class="btn btn-outline-secondary">
                                Volver a administrar productos
                            </a>
                            <button type="submit" class="btn btn-dark">
                                Guardar producto
                            </button>
                        </div>

                    </form>

                </div>
            </div>
        </main>

        <footer class="pt-4 my-md-5 pt-md-5 border-top">
            @include('components.Footer')
        </footer>
    </div>

</body>
</html>