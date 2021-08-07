<?php
namespace App\Http\Repository;

interface UserRepositoryInterface 
{
    public function getAllUsers();

    public function getUserById($id);

    public function createOrUpdate( $id = null, $collection = [] );

    public function deleteUser($id);
}
?>