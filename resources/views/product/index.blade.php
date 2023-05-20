@extends('layouts.app')

@section('content')

<h1 class="text-center mt-2">All Products</h1>
<hr>
<br>

<div class="container">
    <div class="row">
        @foreach ($products as $product)
            @if ($loop->iteration % 4 == 1)
                </div>
                <br><br>
                <div class="row">
            @endif
            <div class="col-md-3">
                <div class="card m-2 p-2" style="width: 100%; height: 105%; border: 1px solid #e6e6e6;">
                    <img src="images/{{ $product->picture }}" class="card-img-top" alt="...">
                    <div class="card-body">
                      <h5 class="card-title">{{ $product->title }}</h5>
                      <h5 class="card-title" style="color: #007bffa8;">Price: ₱ {{ $product->price }}</h5>
                      <hr style="border-color: #ccc;">
                      <p class="card-text" style="overflow: hidden; text-overflow: ellipsis; white-space: nowrap; color: #555;">{{ $product->description }} </p>
                      <div class="card-footer" style="width:94%; text-align:right; position: absolute; bottom: 0; right: 0; margin: 10px;">
                        <a href="{{ route('products.show', $product->id) }}" class="btn btn-primary" style="background-color: rgb(0, 192, 10); border-color: #007bff;">View Details...</a>
                    </div>
                  </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
<br><br>
<footer class="footer mt-auto py-3 text-center" style="background-color: #f8f9fa;">
  <div class="container">
      <span class="text-muted">WEB-Based_POS &copy; 2023. All rights reserved.</span>
  </div>
</footer>

@endsection
