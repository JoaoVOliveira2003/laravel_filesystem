<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class FileController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function storageLocalCreate()
    {
        Storage::put('file1.txt', 'conteudo vindo');

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

    public function storageLocalAppend()
    {
        // Storage::append('file3.txt',Str::random(100));
        Storage::disk('local')->append('file3.txt', Str::random(100));
        return redirect()->route('home');
    }

    public function storageLocalRead()
    {
        $conteudo = Storage::get('file1.txt');
        // ou
        $conteudo = Storage::disk('local')->get('file1.txt');
        echo $conteudo;
    }

    public function storageLocalReadMulti()
    {
        $conteudo = Storage::get('file3.txt');
        $conteudo = explode(PHP_EOL, $conteudo);
        foreach ($conteudo as $linha) {
            echo '<p>' . $linha . '</p>';
        }
    }

    public function storageLocalCheckFile()
    {
        $exist = Storage::exists('file10.txt');

        if ($exist) {
            echo 'Existe';
        } else {
            echo 'Não existe';
        }

        echo '<br>';

        if (Storage::exists('file1.txt')) {
            echo 'Existe';
        } else {
            echo 'Não existe';
        }
    }

    public function storageLocalStoreJson()
    {
        $dados = [
            [
                'nome' => 'joao',
                'email' => 'joao@gmail.com'
            ],

            [
                'nome' => 'vivi',
                'email' => 'vivi@gmail.com'
            ],
            [
                'nome' => 'tauha',
                'email' => 'tauha@gmail.com'
            ],
        ];

        Storage::put('data.json', json_encode($dados));
        echo 'salvou';
    }

    public function storageLocalReadJson()
    {
        $data = Storage::json('data.json');
        echo '<pre>';
        print_r($data);
    }

    public function storageLocalList()
    {
        $arquivos = Storage::disk()->files(null, true);
        echo '<pre>' . print_r($arquivos);
    }

    public function storageLocalDelete()
    {
        Storage::delete('file1.txt');
        echo 'Ficheiro removido com sucesso.';

        //deletar todos os arquivos.
        Storage::delete(Storage::files());
    }

    public function storageFolderDelete()
    {
        Storage::makeDirectory('documents');
    }

    public function storageFolderCreate()
    {
        Storage::deleteDirectory('documents');
    }

    public function storageLocalListFilesMetadados()
    {
        $list_files = Storage::allFiles();

        $files = [];

        foreach ($list_files as $file) {
            $files[] = [
                'name' => $file,
                'size' => round(Storage::size($file) / 1024, 2) . 'kb',
                'last_modified' => Carbon::createFromTimestamp(
                    Storage::lastModified($file)
                )->format('d/m/Y H:i:s'),
                'mime_type' => Storage::mimeType($file)
            ];
        }

        return view('listaComMetadados', compact('files'));
    }

    public function storageLocalListDownload(){
        $lista_files = Storage::allFiles();
        $files = [];
        foreach($lista_files as $file){
            $files[] = [
                'name'=>$file,
                'size'=>round(Storage::Size($file)/1024,2). 'kb',
                'file' => basename($file)
            ];
        }
        return view('listFilesWithDownload',compact('files'));
    }

    public function storageLocalUpload(Request $arquivo){
        // $arquivo->file('arquivo')->stores('public');
        // $filename = $arquivo->file('arquivo')->getClientOriginalName();
        // $arquivo->file('arquivo')->storeAs('public',$filename);

        $arquivo->validate(['arquivo'=>'required|mimes:pdf,jpg,png|max:10']);
        $arquivo->file('arquivo')->store('public');

        echo 'salvo com sucesso';
    }
}
