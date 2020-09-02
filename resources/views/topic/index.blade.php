@extends('layouts.app')


@section('content')
<div class="container">
    <div class="row">
        <div class="col-3">
            {{-- форма поиска по топикам --}}
            {!! Form::open(['action'=>'TopicController@search', 'class'=>'form', 'method'=>'get']) !!}
            <div class="input-group mb-3">
                {!! Form::text('searchform', '', ['class'=>'form-control', 'placeholder'=>'Enter topic']) !!}
                <button class="d-inline btn btn-success" type="submit">Search</button>
            </div>
            {!! Form::close() !!}

            {{--  Список топиков --}}
            <ul class="list-unstyled">
                @foreach($topics as $topic)
                    <li>
                        {{-- при выборе топика будет срабатывать метод show--}}
                        <a href="{{url('topic/'.$topic->id)}}">
                            {{$topic->topicname}}
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>

        <div class="col-9">
            @if($id != 0)
                <h1 class="text-center text-info">{{ $topicname }}</h1>
                <hr>
                @foreach($blocks as $block)
                    <div>
                        <div class="p-2">
                            {{-- заголовок блока  --}}
                            <h2 class="text-center">{{ $block -> title}}</h2>

                            {{-- изображение  --}}
                            @if($block -> imagepath !== '')
                                <img src="{{ asset($block->imagepath) }}" class="img-fluid mr-3"
                                     style="height: 200px;" alt="">
                            @endif

                            {{-- текст блока  --}}
                            <p class="lead">{{ $block->content }}</p>

                            {{-- кнопка удаления --}}
                            {!! Form::open(['route'=>['block.destroy', $block->id]]) !!}
                                {{ Form::hidden('_method', 'DELETE') }}
                                <button type="submit" class="btn btn-danger float-left mr-2">Удалить</button>
                            {!! Form::close() !!}

                            {{-- кнопка редактирования --}}
                            <a href="{{ url('block/'.$block->id.'/edit') }}" class="btn btn-success">Редактировать</a>

                            <hr class="my-4">
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
</div>    
@endsection