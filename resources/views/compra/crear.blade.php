@extends('layouts.panelControl')

@section('areaPrincipal')

<h2 class="tituloSeccion">CREAR COMPRA</h2>

<div class="formulario">
    <form action="/compra" method="POST">
        @csrf

        <div class="form-group">
            <label for="fechaCompra">Fecha de Compra</label>
            <input type="date" class="form-control" name="fechaCompra" id="fechaCompra">
        </div>

        <div class="form-group">
            <label for="numeroFactura">Numero de Factura</label>
            <input type="number" class="form-control" name="numeroFactura" id="numeroFactura">
        </div>

        <div class="form-group">
            <label for="idProveedor">Proveedor</label>
            <select class="form-control" id="idProveedor" name="idProveedor">
                @foreach ($proveedores as $proveedor)
                <option value="{{ $proveedor->id }}">
                    {{ $proveedor->nombreProveedor }}
                </option>
                @endforeach
            </select>
        </div>

        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Ingrediente</th>
                    <th scope="col">Cantidad</th>
                    <th scope="col">Precio Und</th>
                    <th scope="col">Total Ingrediente</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($ingredientes as $ingrediente)
                <tr>
                    <td>
                        {{ $ingrediente->nombreIngrediente }}
                    </td>
                    <td>
                        <input type="number" name="{{ 'cantidad' . $ingrediente->id }}">
                    </td>
                    <td>
                        <input type="number" name="{{ 'precio' . $ingrediente->id }}">
                    </td>
                    <td>
                        <input type="number" disabled name="{{ 'totalIngrediente' . $ingrediente->id }}">
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <div class="form-group">
            <label for="totalFactura">Total Faturado</label>
            <input type="number" disabled class="form-control" name="total" id="totalFactura">
        </div>

        <button type="submit" class="btn btn-success">CREAR</button>
    </form>
</div>

@endsection