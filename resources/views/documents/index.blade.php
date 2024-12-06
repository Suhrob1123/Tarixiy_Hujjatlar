@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        @foreach($documents as $document)
            <div class="col-md-4">
                <div class="card">
                    <img src="{{ asset('storage/' . $document->file_path) }}" class="card-img-top" alt="{{ $document->title }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $document->title }}</h5>
                        <a href="{{ route('documents.show', $document->id) }}" class="btn btn-primary">Ko‘rish</a>
                        @can('delete documents')
                            <form action="{{ route('documents.destroy', $document->id) }}" method="POST" onsubmit="return confirm('Siz rostdan ham o‘chirmoqchimisiz?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-link text-danger float-end p-0" title="O‘chirish">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form>
                        @endcan
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
