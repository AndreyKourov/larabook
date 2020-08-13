@extends('layouts.master')

@section('menu')
    @parent
@endsection

@section('content')
<div class="row">
    <div class="col-3">
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
                        {!! Form::model($block, ['route'=>['block.update', $block->id]]) !!}
                            {{ Form::hidden('_method', 'PUT') }}
                            <a href="{{ url('block/'.$block->id.'/edit') }}" class="btn btn-success">Редактировать</a>
                        {!! Form::close() !!}
                        <hr>

                    </div>
                </div>
            @endforeach
        @endif
    </div>
</div>    
@endsection