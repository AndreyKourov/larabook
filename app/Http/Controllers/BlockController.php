<?php

namespace App\Http\Controllers;

use App\Block;
use App\Topic;
use Illuminate\Http\Request;

class BlockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $block = new Block;
        $topics = Topic::pluck('topicname', 'id');
        return view('block.create', ['block'=>$block, 'topics'=>$topics, 'page'=>'Forms']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $block = new Block;
        // обрабатываем изображение из формы
        $fname = $request->file('imagepath');
        // если картинка была загружена
        if($fname !== null) {
            // берем из файла
            $original_name = $fname->getClientOriginalName();
            $fname->move(public_path().'/images', $original_name);
            // перенос в таблицу blocks путь к картинки imagepath
            $block->imagepath='/images/'.$original_name;    
        } else {
            $block->imagepath='';
        }

        $block->topicid=$request->topicid;
        $block->title=$request->title;
        $block->content=$request->block_content;

        if(!$block -> save()) {
            $err = $block->getErrors();
            return redirect('BlockController@create')->with('errors', $err)->withInput();
        }
        return redirect()->action('BlockController@create')->with('message', 'New block '.$block->title.' has benn added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $block = Block::find($id);
        $topics = Topic::pluck('topicname', 'id');

        return view('block.edit', ['page'=>'Main page', 'block'=>$block, 'topics'=>$topics]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // $request - Это данные из формы
        $block = Block::find($id);
        $block->topicid = $request->topicid;
        $block->title = $request->title;
        $block->content = $request->_content;

        $fname = $request->file('imagepath');
        if($fname !== null) {
            $original_name = $request->file('imagepath')->getClientOriginalName();
            $request->file('imagepath')->move(public_path().'/images', $original_name);
            $block->imagepath = 'images/'.$original_name;
        }
        $block->save();
        return redirect('topic/'.$block->topicid);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Найти все данные в таблице по переданному в метод id
        $block = Block::find($id);
        $block->delete();
        return redirect('topic');
    }
}
