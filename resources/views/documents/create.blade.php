@extends('layouts.app')

@section('title', 'Hujjat Yuklash')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Hujjat Yuklash</div>
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="{{ route('documents.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="title">Hujjat Nomi</label>
                            <input type="text" name="title" class="form-control" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="description">Tavsif</label>
                            <textarea name="description" class="form-control" rows="3" required></textarea>
                        </div>
                        <div class="form-group mb-3">
                            <label for="category">Kategoriya</label>
                            <select name="category" class="form-control" required>
                                <option value="rasmiy">Rasmiy</option>
                                <option value="shaxsiy">Shaxsiy</option>
                                <option value="harbiy">Harbiy</option>
                                <option value="diniy">Diniy</option>
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label for="file">Fayl Yuklash</label>
                            <input type="file" name="file" class="form-control" accept=".jpg,.jpeg,.png,.pdf" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Yuklash</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
