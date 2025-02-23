@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Téléverser un fichier</h1>

        <form action="{{ route('files.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="file" class="form-label">Choisir un fichier</label>
                <input type="file" name="file" id="file" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Téléverser</button>
        </form>
    </div>
@endsection
