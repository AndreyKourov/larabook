<?php

namespace App;

// use Illuminate\Database\Eloquent\Model;  // ORM для работы с СУБД

// модуль для валидации данных
use \Esensi\Model\Model;

class Topic extends Model
{
    // переопределяем св-ва унаследованого класса Model - $primaryKey, $table, $fillable
    protected $primaryKey='id';   // ключевое поле
    protected $table='topics';   // имя таблицы с которой работает ORM Eloquent
    protected $fillable = ['topicname', 'created_at', 'updated_at']; // поля, в которые мы можем заносить значения

    // через esensi задаем ограничения для поля topicname
    protected $rules = ['topicname'=>['required', 'max: 100', 'unique']];
}
