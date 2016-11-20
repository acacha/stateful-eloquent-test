@extends('adminlte::layouts.app')

@section('htmlheader_title')
    Illegal state exception
@endsection


@section('main-content')
    <div class="container-fluid spark-screen">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Error. Illegal State Exception</div>

                    <div class="panel-body">
                        @if (count($exception->messages()   ) > 0)
                            <div class="alert alert-danger">
                                <strong>Whoops!</strong> No s'ha pogut modificat l'estat del model<br><br>
                                <ul>
                                    @foreach ($exception->messages()->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif





                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
