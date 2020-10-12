@extends('layouts.panelControl')

@section('areaPrincipal')
<h2 class="tituloSeccion">CREAR PRODUCTO</h2>

<div class="formulario">
    <form action="/producto" method="post">
        @csrf

        <div class="form-group">
            <label for="codigo">Codigo del Producto</label>
            <input type="number" class="form-control" name="codigo" id="codigo">
        </div>

        <div class="form-group">
            <label for="nombreProducto">nombreProducto</label>
            <input type="text" class="form-control" name="nombreProducto" id="nombreProducto">
        </div>

        <div class="form-group">
            <label for="precio">Precio</label>
            <input type="number" class="form-control" name="precio" id="precio">
        </div>

        <div class="form-group">
            <label for="preparacion">Preparacion</label>
            <select name="preparacion" id="preparacion" class="form-control">
                <option value="1">SI</option>
                <option value="0">NO</option>
            </select>
        </div>

        <div class="form-group">
            <label for="categoria">Categoria</label>
            <select name="idCategoria" id="categoria" class="form-control">
                @foreach ($categorias as $categoria)
                <option value="{{ $categoria->id }}">{{ $categoria->nombreCategoria }}</option>
                @endforeach
            </select>
        </div>

        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Ingrediente</th>
                    <th scope="col">Cant Ingrediente</th>
                    <th scope="col">Cant Producto</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($ingredientes as $ingrediente)
                <tr>
                    <td>
                        {{ $ingrediente->nombreIngrediente }}
                    </td>
                    <td>
                        <input type="number" name="{{ 'cantidadIngrediente' . $ingrediente->id }}">
                        {{ $ingrediente->unidadMedida }}
                    </td>
                    <td>
                        <input type="number" name="{{ 'cantidadProducto' . $ingrediente->id }}">
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <button type="submit" class="btn btn-success">CREAR</button>

    </form>
</div>
@endsection