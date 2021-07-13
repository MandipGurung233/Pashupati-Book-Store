@extends('book.layout')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">

            @if (session('status'))
                <h6 class="alert alert-success">{{ session('status') }}</h6>                
            @endif

            <div class="card">
                <div class="card-header">
                    <h4>Read book with image
                        <a href="{{ url('books') }}" class="btn btn-danger float-end">Back</a>
                    </h4>
                </div>
                <div class="card-body">

                    <form action="{{ url('delete-book/'.$book->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="form-group mb-3">
                            <label for="">ISBN_NO:         </label>
                            {{ $book->isbn_no }}
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Title:           </label>
                            {{ $book->title }}
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Author:          </label>
                            {{ $book->author }}
                        </div>
                        <div class="form-group mb-3">
                                <label for="">Summary:</label>
                                {{ $book->detail }}     
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Image:</label>
                            <img src ="{{ asset('uploads/books/'.$book->book_image) }}" width="70px" height="70px" alt="image">
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Published year:</label>
                            {{ $book->published_year }}
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Price:</label>
                            {{ $book->price }}" 
                        </div>
                    

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection