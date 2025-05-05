@extends('layouts.app')

@section('content')
<div class="container py-5">

    <h1 class="mb-4">Crea Nuova Nota</h1>
    <div class="row">
        <div class="col-12">
            @if ($message = Session::get('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    <strong>{{ $message }}</strong>
                </div>
            @endif
            @if (count($errors) > 0)
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    <ul class="mb-0 p-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
    </div>
    <div class="row">
    <div class="card shadow-sm">
        <div class="card-body">
            <form method="POST" action="{{ route('notes-store') }}"enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label for="title" class="form-label">Titolo</label>
                    <input
                        type="text"
                        name="title"
                        id="title"
                        class="form-control"
                        placeholder="Inserisci il titolo"
                        required>
                </div>

                <div class="mb-3">
                    <label for="body" class="form-label">Corpo</label>
                    <textarea
                        name="body"
                        id="body"
                        class="form-control"
                        rows="5"
                        placeholder="Scrivi qui il contenuto della nota..."
                        required></textarea>
                </div>

                <div class="mb-3">

                            <label for="formFileLg" class="form-label">File input example</label>
                            <input name="image" class="form-control form-control-lg" id="formFileLg" type="file">

                        <div class="mb-3">
                            <button type="submit" value="submit" class="btn btn-primary">Upload</button>
                        </div>

                </div>

                <button type="submit" class="btn btn-success">💾 Salva Nota</button>
                <a href="{{ route('notes-index') }}" class="btn btn-secondary ms-2">🔙 Torna alla lista</a>
            </form>
        </div>
    </div>

</div>
@endsection
