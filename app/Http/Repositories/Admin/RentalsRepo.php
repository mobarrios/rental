<?php
namespace App\Http\Repositories\Admin;

use App\Entities\Admin\Rentals;
use App\Http\Repositories\BaseRepo;


class RentalsRepo extends BaseRepo {
    
    public function getModel()
    {
        return new Rentals();
    }

    

}