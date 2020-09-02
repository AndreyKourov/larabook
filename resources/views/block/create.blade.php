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

    {!! Form::model($block, ['action'=>'BlockController@store', 'method'=>'post', 'files'=>true, 'class'=>'form']) !!}
    <div class="form-group row">
        {!! Form::label('topicid', 'Select Topic', ['class'=>'col-md-2']) !!}
        {!! Form::select('topicid', $topics, '', ['class'=>'col-md-8']) !!}
        <a href="{{url('topic/create')}}" class="btn btn-info col-md-2" type="submit">Add new Topic</a>
    </div>
    
    
    <div class="form-group row">
        {!! Form::label('title', 'Block Title', ['class'=>'col-md-2']) !!}
        {!! Form::text('title', '', ['class'=>'form-control col-md-10', 'placeholder'=>'Enter block name']) !!}
    </div>

    <div class="form-group row"> 
        {!! Form::label('block_content', 'Add content', ['class'=>'col-md-2']) !!}
        {!! Form::textarea('block_content', '', ['class'=>'col-md-10']) !!}
    </div>

    <div class="form-group row">
        {!! Form::label('imagepath', 'Add Image', ['class'=>'col-md-2']) !!}
        {!! Form::file('imagepath', '', ['class'=>'form-control col-md-10']) !!}
    </div>

    <button type="submit" class="btn btn-primary">Add Block</button>
    {!! Form::close() !!}
@endsection