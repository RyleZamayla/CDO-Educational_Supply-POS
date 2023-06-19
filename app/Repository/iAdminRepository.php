<?php

  namespace App\Repository;
  use App\Models\User;

  interface iAdminRepository {

    public function adminGetAllProducts();

    public function adminGetAllUsers();

    public function adminGetAllComments();

    public function adminDeleteProduct($id);

    public function adminDeleteComment($id);

    public function adminToggleUser(User $user);

  }

?>
