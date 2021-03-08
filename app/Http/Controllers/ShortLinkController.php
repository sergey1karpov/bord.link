<?php

namespace App\Http\Controllers;

use App\Link;
use Illuminate\Http\Request;

class ShortLinkController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     *
     * $chars - набор символов для генерации uri
     *
     * Метод возвращает пользователю короткую ссылку на запись вида 'bord.link/cc/ry74RyR42o'
     *
     */
    public function generateShortLink(Request $request) {

        $chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

        $short = new Link();
        $short->old_link = $request->old_link;
        $short->short_link = substr(str_shuffle($chars), 0, 10);
        $short->save();

        return response()->json('bord.link/cc/'. $short->short_link);
//        return response()->json('127.0.0.1:8000/cc/'. $short->short_link);
    }

    /**
     * @param $link Принимает короткую ссылку вида bord.link/cc/рандомные10символов
     * @return \Illuminate\Http\RedirectResponse Редирект на старую ссылку
     *
     * Метод принимает в качестве параметра $link рандомные 10 символов, которые сгенерировал метод generateShortLink.
     * bord.link/cc/{ry74RyR42o}
     *
     * Делее, мы лезем в таблицу links и берем там первую запись, в которой $link == значению из столбца 'short_link' и
     * все это дело присваиваем переменной $findUrl
     *
     * Потом из найденой записи, мы берем значение 'old_link' и присваиваем его переменной $old_link
     *
     * Если $findUrl == true, то мы делаем редирект на $old_link, в которой лежит полная ссылка на запись, иначе 404
     *
     */
    public function shortLink($link) {

        $findUrl = Link::where('short_link', $link)->first();
        $old_link = $findUrl->old_link;

        if($findUrl) {
            return redirect()->to($old_link);
        } else {
            abort(404);
        }
    }
}
