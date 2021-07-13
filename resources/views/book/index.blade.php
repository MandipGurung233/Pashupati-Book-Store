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
                    <h4>Pashupati Book Store
                        <a href="{{ url('add-book') }}" class="btn btn-primary float-end">Add Book</a>
                    </h4>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>ISBN_NO</th>
                                <th>Title</th>
                                <th>Author</th>
                                <th>Summary</th>
                                <th>Image</th>
                                <th>Published year</th>
                                <th>Price</th>
                                <th>Read</th>
                                <th>Update</th>
                                <th>Delete</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($book as $item)  
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->isbn_no }}</td>
                                <td>{{ $item->title }}</td>
                                <td>{{ $item->author }}</td>
                                <td>{{ $item->detail }}</td>
                                <td>
                                   <img src ="{{ asset('uploads/books/'.$item->book_image) }}" width="70px" height="70px" alt="image">
                                </td>
                                <td>{{ $item->published_year }}</td>
                                <td>{{ $item->price }}</td>
                                <td>
                                    <a href="{{ url('view-book/'.$item->id) }}" class="btn btn-primary btn-sm">Read</a>
                                </td>
                                <td>
                                    <a href="{{ url('edit-book/'.$item->id) }}" class="btn btn-primary btn-sm">Update</a>
                                </td>
                                <td>
                                    <form action="{{ url('delete-book/'.$item->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                    </form>
                                    
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection