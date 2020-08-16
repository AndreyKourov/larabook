@extends('layouts.master')

@section('menu')
    @parent
@endsection

@section('content')
<div class="row">
    <div class="col-3">
    <!-- Форма поиска по топикам -->
    {!! Form::open(['action'=>'TopicController@search', 'class'=>'form', 'method'=>'get']) !!}
            <div class="input-group">
                {!! Form::text('searchform', '', ['class'=>'form-control', 'placeholder'=>'Enter topic']) !!}
                <button class="d-inline btn btn-success" type="submit">Search</button>
            </div>
    {!! Form::close() !!}

    <!-- Список топиков -->
        <ul class="list-group">
            @foreach($topics as $topic) 
                <li>
                    {{-- При выборе топика будет срабатывать метод show --}}
                    <a href="{{url('topic/'.$topic->id)}}">
                        {{$topic->topicname}}
                    </a>
                </li>
            
            @endforeach    
        </ul>
    </div>
    <div class="col-9 bg-light">
    @if($id !=0)
        <h1 class="text-center text-break">{{$topicname}}</h1>
        <hr1>
        @if($id != 0)
            @foreach($blocks as $block)
                <div>
                    <div>
                        {{-- ЗАголовок блока --}}
                        <h2>{{$block -> title}}</h2>

                        {{-- изображение --}}
                        @if($block -> imagepath !== '')
                            <img src="{{ asset($block->imagepath) }}" class="img-fluid mr-3" style="height: 200px;" alt="" >
                        @endif

                        {{-- Текст блока --}}
                        <p class="lead">{{ $block->content }}</p>
                        
                        {{-- Кнопка удадения --}}
                        {!! Form::open(['route'=>['block.destroy', $block->id]]) !!}
                            {{ Form::hidden('_method', 'DELETE') }}
                            <button type="submit" class="btn btn-danger mb-2">Delete</button>
                        {!! Form::close() !!}

                        {{-- Кнопка редактирования --}}
                                                  
                        <a href="{{ url('block/'.$block->id.'/edit') }}" class="btn btn-success">Редактировать</a>

                        <hr>

                    </div>
                </div>
            @endforeach
        @endif
    </div>
</div>    
@endsection