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
                        <div class="progress">
                                <div class="progress-bar" 
                                        role="progressbar" 
                                        aria-valuenow="50" 
                                        aria-valuemin="0" 
                                        aria-valuemax="100" 
                                        style="min-width: 2em; width: 50%;">
                                  50%
                                </div>
                              </div>  
                </td>
            </tr>
        @endforeach
    @endsection