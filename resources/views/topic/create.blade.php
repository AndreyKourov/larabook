{{-- Пожгрузим заготовку странницы из файла /layouts/master.blade.php --}}

@extends('layouts.app')


@section('content')
    <h1 class="label label-info">{{$page}}</h1>

    {{-- обрабатываем данные из TopicController@store если ошибка в добовлении в таблицу или успеное событие --}}
    @if(session('errors'))
        <div class="alert alert-danger">
            @foreach(session('errors') -> all() as $error )
                {{$error}} <br>
            @endforeach
        </div>
    @endif    

    @if(session('message'))
        <div class="alert alert-success">
            {{session('message')}}
        </div>
    @endif

    {!! Form::model($topic, ['action'=>'TopicController@store', 'method'=>'post']) !!}
    <div class="form-group">
        {!! Form::label('topicnameform', 'Topic Name') !!}
        {!! Form::text('topicnameform', '', ['class'=>'form-control', 'placeholder'=>'topic name']) !!}
    </div>
    <button type="submit" class="btn btn-primary">Add topics</button>
    {!! Form::close() !!}
@endsection