@extends('template')
@section('sectionContent')

    <div class="box box-body">

        @if(isset($models))
            {!! Form::model($models,['route'=> [config('models.'.$section.'.updateRoute'),$models->id]]) !!}
        @else
            {!! Form::open(['route'=>config('models.'.$section.'.storeRoute')]) !!}
        @endif

        <div class="col-xs-2 form-group">
            {!! Form::label('Fecha Inicio') !!}
            {!! Form::text('from', null, ['class'=>'datePicker form-control','autocomplete'=>'off']) !!}
        </div>
        <div class="col-xs-2 form-group">
            {!! Form::label('Fecha Final') !!}
            {!! Form::text('to', null, ['class'=>'datePicker form-control','autocomplete'=>'off']) !!}
            </div>

        <div class="col-xs-7 form-group">
            {!! Form::label('Cliente') !!}
            {!! Form::select('clients_id',$clients ,null, ['class'=>'select2 form-control']) !!}
        </div>
        <div class="col-xs-1 form-group" style="padding-top:24px;">
            <button type="submit" class="btn btn-sm btn-default"><i class="fa fa-save"></i></button>
        </div>

    </div>

    @if(isset($models))
    <div class="box box-body">
            <div class="col-xs-12">
              @if($models->process > $models->days)
                    <a href="{{route('admin.rentals.reCalculate',$models->id)}}"  class="btn btn-sm btn-danger"><span class="fa fa-calculator"></span>  Calcular Mora</a>
              @else 
                    <a href="{{route('admin.rentals.addItem',$models->id)}}"  class="btn btn-sm btn-primary"><span class="fa fa-plus"></span>  Artículo</a>
              @endif

            </div>
            <hr>
            @if($models->RentalsItems->count() > 0)
                <div class=" col-xs-12 table-responsive">
                    <table class="table table-stripped">
                        <thead>
                            <th>#</th>
                            <th>Artículo</th>
                            <th>$ Unit.</th>
                            <th>$ Sub.Total</th>
                        </thead>
                        <tbody>
                            <?php $total = 0; ?>
                                @foreach($models->RentalsItems as $rItems)
                                    <tr>
                                        <td>#{{$rItems->models_id}}</td>
                                        <td> {{$rItems->Models->Brands->name}} : {{$rItems->Models->name}}</td>
                                        <td>$ {{number_format($rItems->amount,2)}}</td>
                                        <td>$ {{number_format(($rItems->quantity * $rItems->amount),2)}}</td>
                                        <?php 
                                         $total += $rItems->quantity * $rItems->amount;
                                        ?>
                                    </tr>
                                @endforeach
                        <tbody>
                        <tfoot>
                            <tr>
                                <td colspan="3"><strong>Total</strong></td>
                                <td><strong>  $ {{number_format(($total),2)}} </strong></td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            @endif
            <div class="box-footer pull-right">
            <a href="{{route('admin.rentals.recibo',$models->id)}}" class="btn btn-primary"><span class="fa fa-print"></span></a>
            </div>
        </div>
        
    @endif
    
@endsection