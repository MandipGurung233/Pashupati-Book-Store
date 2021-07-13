@extends('book.layout')

@section('content')

<!--
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
-->

<div class="container">
    <div class="row">
        <div class="col-md-12">

            @if (session('status'))
                <h6 class="alert alert-success">{{ session('status') }}</h6>                
            @endif

            

            <div class="card">
                <div class="card-header">
                    <h4>Add book with image
                        <a href="{{ url('books') }}" class="btn btn-danger float-end">Back</a>
                    </h4>
                </div>
                <div class="card-body">
                    
                    <form action="{{ url('add-book') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group mb-3">
                            <label for="">ISBN_NO</label>
                            <input type="text" name="isbn_no" class="form-control" placeholder="isbn_no">
                            <span style="color: red">@error('isbn_no'){{ $message }} @enderror</span>
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Title</label>
                            <input type="text" name="title" class="form-control" placeholder="title">
                            <span style="color: red">@error('title'){{ $message }} @enderror</span>
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Author</label>
                            <input type="text" name="author" class="form-control" placeholder="author">
                            <span style="color: red">@error('author'){{ $message }} @enderror</span>
                        </div>
                        <div class="form-group mb-3">
                                <label for="">Summary</label>
                                <textarea class="form-control" style="height:150px" name="detail" placeholder="detail"></textarea>     
                                <span style="color: red">@error('detail'){{ $message }} @enderror</span>
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Image</label>
                            <input type="file" name="book_image" class="form-control">
                            <span style="color: red">@error('book_image'){{ $message }} @enderror</span>
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Published year</label>
                            <input type="text" name="published_year" class="form-control" placeholder="published_year">
                            <span style="color: red">@error('published_year'){{ $message }} @enderror</span>
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Price</label>
                            <input type="text" name="price" class="form-control" placeholder="price">
                            <span style="color: red">@error('price'){{ $message }} @enderror</span>
                        </div>
                        <div class="form-group mb-3">
                            <button type="submit" class="btn btn-primary"> Save Book </button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection