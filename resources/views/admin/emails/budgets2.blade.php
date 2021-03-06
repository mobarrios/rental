<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Presupuesto</title>

    <style>
        *{
            font-family: Arial, Verdana, sans-serif;
            margin: 0 !important;
            padding: 0 !important;
            /*position: relative;*/
            font-size: 11px;
            box-sizing: border-box;
            -moz-box-sizing: border-box;
            -webkit-box-sizing: border-box;
        }

        table {
            border-collapse: collapse;
        }

        body{
            border-top: 5px solid #eb1f37;
            width: 500px;
            margin:auto !important;
            /*position: relative;*/
        }


        header{
            border-top: 30px solid #0187cd;
            /*border-bottom: 3px solid #ddd;*/
            display: inline-block;
            height: 140px;
            width: 100%;
        }

        img{
            margin-left: 20px !important;
        }

        header *{
            height: 50px !important;
        }

        header tr td:first-child{
            width: 200px !important;
            height: auto !important;
        }

        header tr td:first-child img{
            height: auto !important;
        }

        header td:nth-child(2){
            vertical-align: middle;
            margin-top: 20px;
        }


        .fecha span{
            border: 1px solid #bcbcbc;
            color: #4f4f4f;
            -webkit-border-radius: 5px;
            -moz-border-radius: 5px;
            border-radius: 5px;
            width: 40px;
            height: 40px !important;
            display:inline-block;
            vertical-align: middle;
            font-size: 15px;
            line-height: 40px;
            /*margin:0 3px;*/
        }

        header table{
            /*margin-top: -50px !important;*/
            height: 50px !important;
            padding: 25px !important;
            width: 100%;
        }

        header table tr{
            margin-top: -80px;
        }

        .inline{
            display: inline-block !important;
            margin: 0 3px;
            width: 200px;
        }

        .inline-b{
            display: inline-block !important;
            margin: 0 3px;
        }

        .espacio{
            width: 100%;
            height: 1px;
        }

        .footer{
            border-bottom: 5px solid #eb1f37;
            background-color: #0187cd;
            color: rgb(255,255,255) !important;
            /*position: absolute;*/
            /*bottom:0;*/
            /*left:0;*/
            width: 500px;
            padding: 20px !important;
            height: 100px;
            text-align: left;
        }

        .footer>.col-xs-8{
            margin-top: 10px !important;
        }

        .container{
            color: #4f4f4f;
        }

        .container b{
            color: rgb(0,0,0);
        }

        .padding{
            display: block;
            width:100%;
            height: 1px;
            border-top: 1px dashed #4f4f4f;
        }

        .container>div{
            padding: 8px 25px !important;
        }

        .col-4{
            width: 50%;
            display: inline-block !important;
            /*margin: 0 3px !important;*/
        }

        .col-4 p{
            margin: -20px 0!important;
            display: inline-block;
        }

        .col-xs-4{
            width: 25%;
            float: left;
            position: relative;
            min-height: 1px;
            padding-right: 15px;
            padding-left: 15px;
        }

        .col-xs-6{
            width: 50%;
            float: left;
            position: relative;
            min-height: 1px;
            padding-right: 15px;
            padding-left: 15px;
        }

        .col-xs-8{
            width: 75%;
            float: left;
            position: relative;
            min-height: 1px;
            padding-right: 15px;
            padding-left: 15px;
        }
        
        .inline p{
            margin: -5px 0!important;
            display: inline-block;
        }

        .text-right{
            text-align: right;
        }

        .text-left{
            text-align: left;
        }

        .pull-right{
            float: right;
        }

        .pull-left{
            float: left;
        }

        .absolute{
            /*position: absolute;*/
        }

        .bottom{
            margin-top:20px !important;
        }

    </style>

</head>
<body>
    <header>
        <table width="100%">
            <tr>
                <td>
                    <img src="http://motonet.com.ar/assets/web/img/logo.png" alt="Logo" width="100">
                </td>
                <td>
                    <h2 align="center">PRESUPUESTO #  {!!  $model->id !!}</h2>
                </td>
                <th class="fecha">
                    <span>{!! date('d',strtotime($model->date)) !!}</span><span>{!! date('m',strtotime($model->date)) !!}</span><span>{!! date('Y',strtotime($model->date)) !!}</span>
                </th>
            </tr>
        </table>

    </header>

    <div class="container">
        <div class="col-xs-6">
            <p><b>Cliente: </b> {!! $model->Clients->fullName !!}</p>
        </div>

        <div class="col-xs-6">
            <p><b>DNI: </b> {!! $model->Clients->dni !!}</p>
        </div>

        <div class="col-xs-6">
            <p><b>Sexo: </b> {!! $model->Clients->sexo !!}</p>
        </div>

        <div class="espacio"></div>

        <div class="col-xs-6">
            <p><b>Mail: </b> {!! $model->Clients->email !!}</p>
        </div>

        <div class="col-xs-6">
            <p><b>Nacionalidad: </b> {!! $model->Clients->nacionality !!}</p>
        </div>

        <div class="col-xs-6">
            <p><b>Teléfono: </b> {!! $model->Clients->phone1 !!}</p>
        </div>

        <div class="espacio"></div>

        <div class="inline">
            <p><b>Dirección: </b> {!! $model->Clients->address !!}</p>
        </div>

        <div class="inline">
            <p><b>Ciudad: </b> {!! $model->Clients->localidad !!}</p>
        </div>

        <hr>

        @foreach($model->allItems as $item)
            <div class="col-xs-6">
                <p><b>Producto: </b> {!! $item->name !!}</p>
            </div>

            <div class="col-xs-6">
                <p><b>Marca: </b> {!! $item->brands->name !!}</p>
            </div>

            <div class="espacio"></div>

            <div class="col-xs-6">
                <p><b>Precio de lista: </b> ${!! $item->activeListPrice->price_list or '0' !!}</p>
            </div>

            <div class="col-xs-6">
                <p><b>Contado: </b> ${!! $item->activeListPrice->price_net or '0' !!}</p>
            </div>

            <div class="espacio"></div>

            <div class="col-xs-6">
                <p><b>Patentamiento: </b> ${!! $item->patentamiento or '0' !!}</p></p>
            </div>

            <div class="col-xs-6">
                <p><b>Pack Service: </b> ${!! $item->pack_service or '0' !!}</p></p>
            </div>

        @endforeach

        <span class="padding"></span>


        <div class="col-xs-6">
            <p><b>Seguro: </b> ${!! $model->seguro or '0' !!}</p>
        </div>

        <div class="espacio"></div>

        <div class="col-xs-6">
            <p><b>Flete: </b> ${!! $model->flete or '0' !!}</p>
        </div>

        <div class="col-xs-6">
            <p><b>Formularios: </b> ${!! $model->formularios or '0' !!}</p>
        </div>

        <div style="width: 100%;height: 1px;clear: both;"></div>


        <div class="footer" style="position:relative;">

                <div class="col-xs-8">

                    <div class="col-xs-6">
                        <p><b>Total Final: </b> ${!! $model->total or '0' !!}</p>
                    </div>

                    <div class="col-xs-6">
                        <p><b>Anticipo: </b> ${!! $model->anticipo or '0' !!}</p>
                    </div>

                    {{--<div class="espacio"></div>--}}

                    <div class="col-xs-6">
                        <p><b>A financiar: </b> ${!! $model->a_financiar or '0' !!}</p>
                    </div>

                    <div class="col-xs-6">
                        <p><b>Atendido por:</b> Manuel Barrios</p>
                    </div>
                </div>

                {{--<span style="clear: both"></span>--}}
                {{--<div class="inline-b" style="margin-left: 40px !important;vertical-align: top;">--}}
                <div style="position: absolute;right:20px;top:15px">
                    {!!  DNS2D::getBarcodeHTML($model->id, "QRCODE",3.3,3.3,'white') !!}
                </div>

                <div class="inline-b" style="position: absolute;left:150px;bottom:5px">
                    {!!  DNS1D::getBarcodeHTML($model->id, "EAN13",2,33, 'white') !!}
                </div>

        </div>


    </div>
</body>
</html>
