<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Repositories\Admin\RentalsRepo as Repo;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;

use App\Http\Repositories\Admin\ClientsRepo ;
use App\Http\Repositories\Admin\ModelsRepo ;

use Carbon\Carbon;
use Barryvdh\DomPDF\PDF;





class RentalsController extends Controller
{
    public $modelsRepo;
    
    public function  __construct(Request $request, Repo $repo, Route $route, ClientsRepo $clientsRepo, ModelsRepo $modelsRepo)
    {

        $this->request  = $request;
        $this->repo     = $repo;
        $this->route    = $route;

        $this->section          = 'rentals';
        $this->data['section']  = $this->section;

        $this->data['clients']  = $clientsRepo->ListAll('rentals')->orderBy('last_name','ASC')->get()->lists('fullName','id');
        $this->data['items']    = $modelsRepo->ListAll('models')->get();
        $this->modelsRepo = $modelsRepo;

    }


    public function AddItem()
    {
        $this->data['id'] = $this->route->getParameter('id');
        $model = $this->repo->find($this->route->getParameter('id'));

        $this->data['days'] = $model->days;
        //$q  = $this->route->getparameter('q');

        return view('admin.rentals.selectItems')->with($this->data);
    }

    public function store()
    {
        //validar los campos
        $this->validate($this->request,config('models.'.$this->section.'.validationsStore'));

        $from = new Carbon($this->request->from);
        $to = new Carbon($this->request->to);

        $this->request['days'] = $from->diffInDays($to);

        //crea a traves del repo con el request
        $model = $this->repo->create($this->request);

        return redirect()->route(config('models.'.$this->section.'.postStoreRoute'),$model->id)->withErrors(['Regitro Agregado Correctamente']);
    }

    public function PostAddItem()
    {
        $id = $this->route->getParameter('id');
        $items_id  = $this->route->getparameter('items_id');
        $total  = $this->route->getparameter('total');
        
        $rental = $this->repo->find($id);
        $models = $this->modelsRepo->find($items_id);

        $rental->RentalsItems()->create(['models_id'=>$items_id,'quantity'=>1 , 'amount' => $total ]);
       

        return redirect()->route('admin.rentals.edit' , $id)->withErrors(['Regitro Agregado Correctamente']);
    }

    public function recibo(PDF $PDF)
    {
        $id     = $this->route->getParameter('id');
        $model  = $this->repo->getModel()->with('Clients')->find($id);

        $PDF->loadView('admin.vouchers.reciboRental',compact('model'));

        return $PDF->stream();
    }

    public function reCalculate()
    {
        $id     = $this->route->getParameter('id');
        $model  = $this->repo->getModel()->find($id);

        foreach($model->RentalsItems as $ri )
        {
           $m  =  $this->modelsRepo->find($ri->models_id) ; 
           echo 'valor : '.  $m->ActiveListPrice->price_list .'<br>';
           echo 'dif : '. ( $model->process - $model->days ).'<br>';
           echo 'dif : '. ( $model->process - $model->days ) *  $m->ActiveListPrice->price_list.'<br>';

           $ri->amount = $ri->amount  + ( $model->process - $model->days ) *  $m->ActiveListPrice->price_list;
           $ri->save();
        }

        return redirect()->back();
    }

}
