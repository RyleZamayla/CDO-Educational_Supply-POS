<?php

  namespace App\Repository;

  use App\Models\Product;
  use App\Models\Comment;
  use App\Models\User;


  class adminRepository implements iAdminRepository {

    public function adminGetAllProducts()
    {
        return Product::all();
    }

    public function adminGetAllUsers()
    {
        return User::all();
    }

    public function adminGetAllComments()
    {
        return Comment::all();
    }

    public function adminDeleteProduct($id)
    {
        $product = Product::find($id);
        if ($product) {
            $product->delete();
            return "Product soft deleted successfully.";
        } else {
            return "Product not found.";
        }
    }

    public function adminDeleteComment($id)
    {
      return Comment::find($id)->delete();
      if ($comment) {
            $comment->delete();
            return "Comment soft deleted successfully.";
        } else {
            return "Comment not found.";
        }
    }

    public function adminToggleUser(User $user)
    {
        $user->status = !$user->status;
        $user->save();
    }


  }


?>
