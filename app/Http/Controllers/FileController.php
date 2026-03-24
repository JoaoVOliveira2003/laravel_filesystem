<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class FileController extends Controller
{
    public function index(){
        return view('home');
    }

public function storageLocalCreate(){
    Storage::put('file1.txt','conteudo vindo');

    if (Storage::exists('file1.txt')) {
        $echo = 'Arquivo criado com sucesso!';
        $echo .= '<hr>';
        $echo .= Storage::get('file1.txt');
        $echo .= '<br>';
        return $echo;
    }

    $echo = 'Não criou ';

    return $echo;
}
}
