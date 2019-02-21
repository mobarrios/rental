<?php
 namespace App\Entities\Admin;


 use App\Entities\Entity;
 use Carbon\Carbon;

 class Rentals extends Entity
 {

     protected $table = 'rentals';
     protected $fillable = ['from','to','status','days','clients_id'];

     protected $section = 'rentals';


     public function getFromAttribute($value)
     {
         return date('d-m-Y',strtotime($value));
     }

     public function setFromAttribute($value)
     {
          $this->attributes['from'] = date('Y-m-d',strtotime($value));
     }


     public function getToAttribute($value)
     {
         return date('d-m-Y',strtotime($value));
     }

     public function setToAttribute($value)
     {
          $this->attributes['to'] = date('Y-m-d',strtotime($value));
     }

     public function Items()
     {
         return $this->belongsToMany(Items::class ,'rentals_items');
     }

     public function RentalsItems()
     {
         return $this->hasMany(RentalsItems::class);
     }

     public function Clients()
     {
         return $this->belongsTo(Clients::class);
     }

     public function getProcessAttribute()
     {
         $from   = new Carbon($this->from);
         $to     = new Carbon($this->to);

         $tot  = $from->diffInDays($to);

         $diff   = $from->diffInDays();
        
        return $diff;
     }

     public function getTotalDiasAttribute()
     {
        $from   = new Carbon($this->from);
        $to     = new Carbon($this->to);

        return $from->diffInDays($to);

     }

 }


