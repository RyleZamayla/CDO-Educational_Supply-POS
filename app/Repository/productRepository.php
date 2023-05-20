<?php

  namespace App\Repository;

  use App\Models\Product;

  class productRepository implements iProductRepository {

    public function getAllProducts()
    {
      return Product::all();
    }

    public function createProduct(array $data)
    {
        Product::create([
            'picture' => $data['picture'],
            'title' => $data['title'],
            'price' => $data['price'],
            'description' => $data['description'],
            'barcode' => $data['barcode'],
        ]);
    }

    public function getSingleProduct($id)
    {
      return Product::find($id);
    }

    public function editProduct($id)
    {
      return Product::find($id);
    }

    // ProductRepository.php

    public function updateProduct($id, array $data)
    {
        Product::find($id)->update([
            'picture' => $data['picture'],
            'title' => $data['title'],
            'price' => $data['price'],
            'description' => $data['description'],
            'created_at' => $data['created_at']
        ]);
    }




  }


?>
