@extends('template.model_index')
    @section('table')
        @foreach($models as $model)
            <tr>
                <td style="width: 1%"><input class="id_destroy" value="{{$model->id}}" type="checkbox"></td>
                <td>{{$model->id}}</td>
                <td>{{$model->Clients->fullName }}</td>
                <td>{{$model->from}}</</td>
                <td>{{$model->to}}</</td>
                <td>
                    @if($model->process > $model->days)
                       <span class="label label-danger"> {{$model->Process}}  <small>de</small>   {{$model->days}} </span> 
                    @elseif (( $model->days - $model->process ) == 1 )
                        <span class="label label-warning"> {{$model->Process}}  <small>de</small>   {{$model->days}} </span>
                    @else
                        <span class="label label-success"> {{$model->Process}}  <small>de</small>   {{$model->days}} </span>
                    @endif
                </td>
                
                

            
                {{-- <td>
                    
                        <div class="progress">
                                <div class="progress-bar" 
                                        role="progressbar" 
                                        aria-valuemin="0" 
                                        aria-valuemax="{{$model->totalDias}}" 
                                        style="min-width: 2em; width: {{$model->Process}}%;"> {{$model->Process}}%
                                </div>
                              </div>  
                </td> --}}
            </tr>
        @endforeach

            <p><label class="label label-success">Activo</label>
            <label class="label label-warning">Último Día</label>
            <label class="label label-danger">Vencido</label></p>



    @endsection