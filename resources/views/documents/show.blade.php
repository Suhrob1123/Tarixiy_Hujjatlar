@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h3>{{ $document->title }}</h3>
                </div>
                <div class="card-body">
                    <img src="{{ asset('storage/' . $document->file_path) }}" alt="{{ $document->title }}" class="img-fluid d-block mx-auto">
                    <p class="mt-3"><strong>Tavsif:</strong> {{ $document->description }}</p>
                    <p><strong>Kategoriya:</strong> {{ ucfirst($document->category) }}</p>
                </div>
            </div>

            <!-- Fikrlar -->
            <div class="mt-4">
                <h5>Foydalanuvchi fikrlari</h5>
                @foreach($document->comments as $comment)
                    <div class="card mb-2">
                        <div class="card-body">
                            <strong>{{ $comment->user->name }}:</strong>
                            <p>{{ $comment->content }}</p>
                        </div>
                    </div>
                @endforeach

                @auth
                <form action="{{ route('documents.comment', $document->id) }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <textarea name="content" class="form-control" rows="3" placeholder="Fikr qoldiring..." required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary mt-2">Yuborish</button>
                </form>
                @endauth
            </div>
        </div>
    </div>
</div>
@endsection
