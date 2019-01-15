@extends('template')

    @section('sectionContent')
        
        <div class="box box-body">
            <div class="table-responsive">
                <table class="table table-stripped">
                    <thead>
                        <th>#</th>
                        <th>Artículo</th>
                        <th>$ Diario</th>
                        <th>C. Dias</th>
                        <th>Total</th>

                    </thead>
                    <tbody>
                        @foreach($items as $it)
                        <tr>
                        <td>{{$it->id}}</td>
                        <td>{{$it->Brands->name}} {{$it->name }} </td>
                        <td>
                            @if($it->activeListPrice)
                                  $ {{ number_format($it->activeListPrice->price_list , 2 ) }}
                            @endif
                        </td>  
                            <td>                                
                                @if($it->activeListPrice)
                                    <input class="dias"  type="number" value="{{$days}}" min="1" max="{{$days}}" 
                                        data-id="{{$it->id}}"  data-rental="{{$id}}" data-price="{{$it->activeListPrice->price_list}}">
                                @endif

                        </td>   
                        <td>
                                @if($it->activeListPrice)
                                    $  <input  class="total_{{$it->id}}" value="{{  number_format(($days * $it->activeListPrice->price_list) , 2 ) }}"   >                             
                                @endif
                        </td>
                        <td>
                                @if($it->activeListPrice)
                                <a href="{{route('admin.rentals.postAddItem',[$id,$it->id , $it->activeListPrice->price_list * $days ])}}" class="add_{{$it->id}} btn btn-xs btn-default"><span>Agregar</span></a>
                                @endif
                        </td>
                    
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        
    @endsection

    @section('js')
        <script>
            $('.dias').on('change',function(){
                var rental =  $(this).attr('data-rental');
                var id = $(this).attr('data-id');
                var price = $(this).attr('data-price');
                var total = price * $(this).val();
                $('.total_'+id).val(total);

                $('.add_'+id).attr('href','http://localhost/rental/public/admin/rentals/postAddItem/'+rental+'/'+id+'/'+total);
                
            })
        </script>
    @endsection 

