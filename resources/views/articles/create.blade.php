@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <a href="{{ URL::previous() }}"><button class="btn btn-primary"><i class="glyphicon glyphicon-chevron-left"></i> Retour</button></a><br /><br />
                <div class="panel panel-default">
                    <div class="panel-heading"><h2>Ajouter un nouvel article</h2></div>

                    <div class="panel-body">
                        {!! Form::open(array('action' => 'PostController@store', 'method'  =>  'post')) !!}
                        {{ csrf_field() }}
                        {!! Form::label('Titre') !!}
                        {!! Form::text('title', null, ['class'    =>  'form-control']) !!}<br /><br />
                        {!! Form::label("Contenu de l'article") !!}
                        {!! Form::textarea('description', null, ['class'    =>  'form-control']) !!}<br /><br />
                        {!! Form::submit('Ajouter', ['class'    =>  'btn btn-primary btn-lg btn-block']) !!}
                        {!! Form::close() !!}
                        @if($errors)
                            <br />
                            <ul style="list-style: none;">
                                @foreach($errors->all() as $error)
                                        <li style="color:red;">--> {{$error}}</li>
                                @endforeach
                            </ul>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection