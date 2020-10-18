@extends('layouts.panelControl')

@section('areaPrincipal')
<h2 class="tituloSeccion">CREAR ADICION</h2>

<div class="formulario">
    <form action="/adicion" method="post">
        @csrf

        <div class="form-group">
            <label for="nombreAdicion">NOMBRE</label>
            <input type="text" class="form-control" name="nombreAdicion" id="nombreAdicion">
        </div>
        <div class="form-group">
            <label for="precio">PRECIO</label>
            <input type="number" class="form-control" name="precio" id="precio">
        </div>

        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Ingrediente</th>
                    <th scope="col">Cant Ingrediente</th>
                    <th scope="col">Cant Adicion</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($ingredientes as $ingrediente)
                <tr>
                    <td>{{ $ingrediente->nombreIngrediente }}</td>
                    <td><input type="text" name="{{ 'cantidadIngrediente'.$ingrediente->id }}"></td>
                    <td><input type="text" name="{{ 'cantidadAdicion'.$ingrediente->id }}"></td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <button type="submit" class="btn btn-success">CREAR</button>

    </form>
</div>
@endsection