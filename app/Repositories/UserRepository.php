<?php

namespace App\Repositories;

use App\Interfaces\UserRepositoryInterface;
use App\Models\User;

class UserRepository implements UserRepositoryInterface{

    public function getAll(
        ?string $search,
        ?int $limit,
        bool $execute
    ){
        $query = User::where(function ($query) use ($search){

            // jika ada parameter search maka dia akan dijalankan, yang kita definisikan di model user
            if($search){
                $query->search($search);
            }
        });

        if($limit){
            // take adalah data yang di ambil bebrapa berdasarkan limit
            $query->take($limit);
        }

        if($execute){
            return $query->get();
        }

        return $query;
    }

    public function getAllPaginated(
        ?string $search,
        ?int $rowPerPage
    ){
        $query = $this->getAll(
            $search,
            $rowPerPage,
            false
        );

        return $query->paginate($rowPerPage);
    }
}