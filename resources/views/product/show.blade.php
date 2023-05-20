@extends('layouts.app')

@section('content')

<h1 class="text-center mt-2">{{ $product->title }} | Detail</h1>
<hr>
<br>


<div class="container">
    <div class="row">
        <div class="col-md-7" style="display:flex">

            <div class="container m-2 p-2">
                <center>
                    <img src="{{ asset('images/' . $product->picture) }}" height="450px" alt="...">
                </center>
                <div class="container m-2 p-2">
                  <h2>{{ $product->title }}</h2>
                  <h3>Price: ₱ {{ $product->price }}</h3>
                  <hr>
                  <h5>{{ $product->description }}</h5>
                  <a href="{{ route('products.index') }}" class="btn btn-success">Go Home</a>
                </div>
            </div>

        </div>


        <div class="col-md-5">
            <div class="col-md-12">
                <h3>All Comments</h3>
                <div class="comments p-2 m-2" style="background-color: rgba(211, 211, 211, 0.295); max-height: 200px; overflow-y: auto;">
                    @foreach ($product->comments as $comment)
                        <p>{{ $comment->comment }} <br> ( {{ $comment->rating }} )</p>
                        <hr>
                    @endforeach
                </div>
            </div>
            <div class="col-md-12">
                <h3>Add Comment...</h3>
                <div class="container m-2 p-2">

                    <form action="" method="POST">
                        @csrf

                        <input type="hidden" id="id" name="id" value="{{ $product->id }}">

                        <div class="mb-3">
                            <label for="comment" class="form-label">Comment</label>
                            <input type="text" class="form-control" name="comment" id="comment" placeholder="Enter Comment">
                        </div>

                        <div class="mb-3">
                            <label for="rating" class="form-label">Rating</label>
                            <input type="number" class="form-control" name="rating" id="rating" placeholder="Enter Rating">
                        </div>

                            <button type="submit" id="addCommentBtn" class="btn btn-success">submit</button>

                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

<script>
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')
    }
});

$("#addCommentBtn").click(function(e){
    var comment = $('#comment').val();
    var rating =  $('#rating').val();
    var id = $('#id').val();

    var data = {
        comment: comment,
        rating: rating,
        created_at: new Date().toISOString(), // Set created_at
        updated_at: new Date().toISOString(), // Set updated_at
        _token: '{{ csrf_token() }}'
    };

    $.ajax({
        type: "POST",
        dataType: "json",
        data: data,
        url: "/products/" + id,
        success: function(data) {
            console.log('Added Comment');
        },
        error: function(error) {
            console.log(error.responseJSON.errors.comment);
            console.log(error.responseJSON.errors.rating);
        }
    });
});

</script>

@endsection

