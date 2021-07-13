@extends('book.layout')

@section('content')

@if ($errors->any())
    <div class="alert alert-danger">
            <strong>Sorry!</strong> There were some problems with your input.<br><br>
            <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
            </ul>
    </div>
@endif

<div class="container">
    <div class="row">
        <div class="col-md-12">

            @if (session('status'))
                <h6 class="alert alert-success">{{ session('status') }}</h6>                
            @endif

            <div class="card">
                <div class="card-header">
                    <h4>Edit book with image
                        <a href="{{ url('books') }}" class="btn btn-danger float-end">Back</a>
                    </h4>
                </div>
                <div class="card-body">

                    <form action="{{ url('update-book/'.$book->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="form-group mb-3">
                            <label for="">ISBN_NO</label>
                            <input type="text" name="isbn_no" value="{{ $book->isbn_no }}" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Title</label>
                            <input type="text" name="title" value="{{ $book->title }}" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Author</label>
                            <input type="text" name="author" value="{{ $book->author }}" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                                <label for="">Summary</label>
                                <textarea class="form-control" style="height:150px" name="detail" placeholder="detail">{{ $book->detail }}</textarea>     
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Image</label>
                            <input type="file" name="book_image" class="form-control">
                            <img src ="{{ asset('uploads/books/'.$book->book_image) }}" width="70px" height="70px" alt="image">
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Published year</label>
                            <input type="text" name="published_year" value="{{ $book->published_year }}" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Price</label>
                            <input type="text" name="price" value="{{ $book->price }}" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <button type="submit" class="btn btn-primary">Update Book </button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection