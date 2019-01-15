<?php
 namespace App\Entities\Admin;


 use App\Entities\Entity;

 class RentalsItems extends Entity
 {

     protected $table = 'rentals_items';

     protected $fillable = ['quantity','models_id','rentals_id','amount'];

     protected $section = 'rentals_items';


     public function Rentals()
     {
         return $this->belongsTo(Rentals::class);
     }

     public function Models()
     {
         return $this->belongsTo(Models::class);
     }


 }


