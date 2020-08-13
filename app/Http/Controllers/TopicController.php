<?php

namespace App\Http\Controllers;

use App\Block;
use App\Topic;
use Illuminate\Http\Request;

class TopicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $topics = Topic::all();
        return view('topic.index', ['page'=>'Main page', 'topics'=>$topics, 'id'=>0]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $topic = new Topic;  // создаем экземпляр класса Topic (модель, отвечающая за работу с таблицей topics)
        // и передаем его в представление vie
        return view('topic.create', ['page'=>'Main page', 'topic'=>$topic]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // здесь запишем данные для взаимодействия с моделью
        $topic = new Topic;
        $topic->topicname = $request->topicnameform; // получили значенеи из поля формы и предали в модель

        // если данные записать не удалось
        if(!$topic->save()) {
            $err = $topic->getErrors();
            // после ошибки нас вернет на ту же страницу и покажет собщение об ошибке
            // withInput() - метод. Если у нас поля были заполнены верно а одно ошибочно ( не прошло валидацию ), то 
            //при редиректе корректные данные остануться 
            return redirect()->action('TopicController@create')->with('errors', $err)->withInput();
        }
        return redirect()->action('TopicController@create')->with('message', 'New topic ' . $topic->topicname . ' has been
        added with id= '.$topic->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $id - идентификатор из url , т.е выбранного топика
        $blocks = Block::where( 'topicid', $id)->get();
        // SELECT * FROM topics
        $topics = Topic::all();

        return view('topic.index', ['page'=>'Main page', 'topics'=>$topics, 'blocks'=>$blocks, 'id'=>$id]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
