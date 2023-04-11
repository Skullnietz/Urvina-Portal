
<?php
header("Content-Type: application/vnd.ms-excel; charset=iso-8859-1");
header("Content-Disposition: attachment; filename=datos-usuario.xls");
?>
<table class="table table-striped">
    
                            <tr class="bg-secondary">
                                <th>{{__('Articulo')}}</th>
                                <th>{{__('Descripcion')}}</th>
                                <th>{{__('Cantidad')}}</th>
                                <th>{{__('Importe')}}</th>
                            </tr>

                                @foreach ($dataConsulta as $dataD)
                                <tr>
                                <td>{{$dataD->Articulo}}</td>
                                <td>{{__($dataD->Descripcion)}}</td>
                                <td>{{number_format($dataD->Cantidad)}}</td>
                                <td>{{number_format($dataD->Importe, 2, '.', '')}}</td>
                                </tr>
                                @endforeach

                        </table>
