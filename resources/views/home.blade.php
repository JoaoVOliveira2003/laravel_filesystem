<x-main-layout>
    <div class="container mt-5">
        <div class="row">
            <div class="col">
                <p class="text-center display-3">laboratorio de filesystem</p>
                <hr>
                <div class="d-flex gap-5">
                    <a href="{{route('storageLocalCreate')}}" class="btn btn-primary">storageLocalCreate</a>
                    <a href="{{route('storageLocalAppend')}}" class="btn btn-primary">storageLocalAppend</a>
                    <a href="{{route('storageLocalRead')}}" class="btn btn-primary">storageLocalRead</a>
                    <a href="{{route('storageLocalReadMulti')}}" class="btn btn-primary">storageLocalReadMulti</a>
                </div>
                    <div class="d-flex gap-5 mt-4">
                    <a href="{{route('storageLocalCheckFile')}}" class="btn btn-primary">storageLocalCheckFile</a>
                    <a href="{{route('storageLocalStoreJson')}}" class="btn btn-primary">storageLocalStoreJson</a>
                    <a href="{{route('storageLocalReadJson')}}" class="btn btn-primary">storageLocalReadJson</a>
                    <a href="{{route('storageLocalList')}}" class="btn btn-primary">storageLocalList</a>
                </div>
                <div class="d-flex gap-5 mt-4">
                    <a href="{{route('storageLocalDelete')}}" class="btn btn-primary">storageLocalDelete</a>
                    <a href="{{route('storageFolderDelete')}}" class="btn btn-primary">storageFolderDelete</a>
                    <a href="{{route('storageFolderCreate')}}" class="btn btn-primary">storageFolderCreate</a>
                    <a href="{{route('storageLocalListFilesMetadados')}}" class="btn btn-primary">storageLocalListFilesMetadados</a>
                </div>
                <div class="d-flex gap-5 mt-4">
                    <a href="{{route('storageLocalListDownload')}}" class="btn btn-primary">Downloads</a>
                    <a href="{{route('storageLocalUpload')}}" class="btn btn-primary">storageLocalUpload</a>
                </div>                
            </div>
        </div>
        
        <div>
            <p class="display-6">Upload de download</p>
            <form action="{{route('storageLocalUpload')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="arquivo" class="form-label">Arquivo</label>
                    <input type="file" class="form-control" id="arquivo" name="arquivo">
                </div>
                <div class="text-end">
                    <button type="submit" class="btn btn-primary px-5">Submit</button>
                </div>
            </form>
        </div>
    </div>
</x-main-layout>