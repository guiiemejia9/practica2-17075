@extends('layouts.base')
<br>
<div class="container mt-5">
    <div class=" row justify-content-center">
        <div class="col-md-7 mt-5">

            <!-- mesajes de confirmacion -->
            @if(session('guardado'))
                <div class="alert alert-success">
                    {{session('guardado')}}
                </div>
            @endif

            <!-- errores de validaciones -->
            @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors-> all() as $errors)
                            <li>{{$errors}}</li>
                        @endforeach

                    </ul>
                </div>
            @endif
            <!--fin error -->
            <div class="card">
                <form action="{{url('/saves')}}" method="post">
                    @csrf
                    <div class="card-header text-center">
                        Agragar estudiante
                    </div>
                    <div class="card-body">
                        <div class="row form-group">
                            <label for="" class="col-5">Nombre del estudiante</label>
                            <input type="text" name="name" class="form-control col-md-9">
                        </div>
                         <div class="row form-group">
                            <label for="" class="col-5">Direccion</label>
                            <input type="text" name="direction" class="form-control col-md-9">
                        </div>
                         <div class="row form-group">
                            <label for="" class="col-5">Tel</label>
                            <input type="text" name="phone" class="form-control col-md-9">
                        </div>
                        <br>
                        <div class="row form-group">
                            <button type="submit" class="btn btn-success col-md-5 offset-4">Guardar</button>
                        </div>
                    </div>

                </form>

            </div>
            <a class="btn btn-light btn-xs mt-5" href="{{url('/lists')}}">Lista de estudiantes</a>
        </div>
    </div>
</div>
