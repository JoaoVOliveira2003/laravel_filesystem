<x-main-layout>
    <class class="container">
        <p class="display-6 mt-5">Ficheiro e arquivos para downloads</p>
        <hr>
        <div class="row">
            @foreach ($files as $file)
                <div class="col-12 card-p-2">
                    <ul>
                        <li> Name: <strong>{{ $file['name'] }}</strong></li>
                        <li> Size: <strong>{{ $file['size'] }}</strong></li>
                        <li>
                            Download:
                            <a href="{{ route('download', ['file' => $file['file']]) }}">
                                baixar
                            </a>
                        </li>
                    </ul>
                </div>
            @endforeach
        </div>
    </class>
</x-main-layout>
