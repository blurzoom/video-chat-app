<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doc extends Model
{
    use HasFactory;

    protected $fillable = [
        'correspondent', 'address', 'fromDate', 'fromNumber', 'title', 'sign', 'search', 'district', 'numberPC',
        /*
        'korespondent',// "Відділ примусового виконання рішень Управління забезпечення примусового виконання рішень у Полтавській області Східного МУ МЮ",
        'adress',// "36014, Полтавська обл., м. ПОЛТАВА, Героїв - пожежників, 13",
        'from_date',// "04.08.2023",
        'title',// "Постанова про відкриття виконавчого провадження по справі Ігнатова В.С.",
        'sign',//"Нікогосян Г.М.",
        'from_number',// "17432",
        'search',// "Ігнатова%В%С%%",
        'district',//"Октябрськ.",
        'numberPC',// "59270"*/
    ];
}
