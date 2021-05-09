@extends('layouts.base')
<br>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <h2 class="text-center mb-10">Lista de estudiantes</h2>
            <a class="btn btn-success mb-4" href="{{url('/forms')}}">Agregar estudiante</a>
            @if(session('eliminado'))
                <div  class="alert alert-success">
                    {{ session('eliminado')}}
                </div>
            @endif
            <table class="table table-bordered table-striped text-center">
                <thead>
                    <tr>
                       <th>Nombre</th>
                       <th>Direccion</th>
                       <th>Tel</th>
                        <th>Aciones</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($students as $student)
                    <tr>
                        <td>{{$student->name}}</td>
                        <td>{{$student->direction}}</td>
                        <td>{{$student->phone}}</td>
                        <td>
                            <a href="{{route('editforms',$student->id)}}" class="btn btn-primary mb-1">
                                <i class="fas fa-pencil-alt"></i>
                            </a>
                            <form action="{{route('deletes',$student->id)}}" method="post">
                                @csrf @method('DELETE')
                                <button type="submit" onclick="return confirm('borrar?');" class="btn btn-danger">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>

            </table>
            {{$students->links()}}
        </div>
    </div>
</div>

