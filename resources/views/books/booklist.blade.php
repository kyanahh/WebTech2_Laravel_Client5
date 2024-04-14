@extends('layout.books')

@section('main')

<div class="col-sm-9 mx-auto">
    <div class="card shadow mt-4" style="height: 500px;">
    <div class="card-header fw-bold h5 text-center">Book List</div>
        <div class="card-body">
            <table class="table table-hover table-striped mx-auto" style="width: 950px; ">
                <thead>
                    <tr>
                      <th class="col-sm-1">BookID</th>
                      <th>Title</th>
                      <th>Author</th>
                      <th>Year</th>
                      <th class="col-sm-2 text-center">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach ($books as $book)
                    <tr>
                        <td>{{ $loop->index+1 }}</td>
                        <td>{{ $book->title }}</td>
                        <td>{{ $book->author }}</td>
                        <td>{{ $book->yearbook }}</td>
                        <td class="text-center">
                            <a href="{{ route('edits', $book->id) }}" class="btn btn-primary">Edit</a> 
        
                            <form method="POST" class="d-inline" action="{{ route('delete', $book->id) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                  </tbody>
            </table>
            {{ $books->links() }}
        </div>
    </div>
</div>

@endsection