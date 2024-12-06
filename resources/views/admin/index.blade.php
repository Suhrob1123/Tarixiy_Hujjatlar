@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Tasdiqlanmagan hujjatlar</h2>
    <div class="row">
        @foreach($documents as $document)
            <div class="col-md-4">
                <div class="card">
                    <img src="{{ asset('storage/' . $document->file_path) }}" class="card-img-top" alt="{{ $document->title }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $document->title }}</h5>
                        <p>{{ $document->description }}</p>
                        <form action="{{ route('documents.approve', $document->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="btn btn-success">Tasdiqlash</button>
                        </form>
                        <form action="{{ route('documents.destroy', $document->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">O‘chirish</button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
