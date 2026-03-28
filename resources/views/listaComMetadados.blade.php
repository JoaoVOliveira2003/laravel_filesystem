<x-main-layout>
    <class class="container">
        <p class="display-6 mt-5">Ficheiro e arquivos com metadados</p>
        <hr>
        <div class="row">
            @foreach ($files as $file )
                <div class="col-12 card-p-2">
                    <ul>
                        <li> Name: <strong>{{$file['name']}}</strong></li>
                        <li> Size: <strong>{{$file['size']}}</strong></li>
                        <li> last_modified: <strong>{{$file['last_modified']}}</strong></li>
                        <li> Type: <strong>{{$file['mime_type']}}</strong></li>
                    </ul>
                </div>
            @endforeach
        </div>
    </class>
</x-main-layout>