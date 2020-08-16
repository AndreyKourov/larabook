@extends('layouts.master')

@section('menu')
    @parent
@endsection

@section('content')
    {!! Form::model($block, ['route'=>['block.update', $block->id], 'method'=>'PUT', 'files'=>true]) !!}
        <div class="form-group">
            {!! Form::label('topicid', 'Select Topic') !!}
            {!! Form::select('topicid', $topics, $block->topicid, ['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('title', 'Edit title') !!}
            {!! Form::text('title', $block->title, ['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('_content', 'Edit content') !!}
            {!! Form::textarea('_content', $block->content, ['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('imagepath', 'Edit image') !!}
            {!! Form::file('imagepath', '', ['class'=>'form-control']) !!}
        </div>

        {!! Form::submit('Save edit block', ['class'=>'btn btn-primary']) !!}

    {!! Form::close() !!}
@endsection   


@section('footer')
    @parent
@endsection