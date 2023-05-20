<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Repository\iProductRepository;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public $product;

    public function __construct(iProductRepository $product)
    {
        $this->product = $product;
    }

    public function addComment(Request $request, $id) {

        $request->validate([
            'comment' => 'required',
            'rating' => 'required'
        ]);

        $data =  Comment::create([
            'product_id' => $id,
            'comment' => $request->comment,
            'rating' => $request->rating,
        ]);


        $product = $this->product->getSingleProduct($id);
        return view('product.show')->with('product', $product);


    }

}
