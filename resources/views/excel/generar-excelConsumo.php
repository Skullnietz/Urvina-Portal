
<?php
header("Content-Type: application/vnd.ms-excel; charset=iso-8859-1");
header("Content-Disposition: attachment; filename=consumo".$pFrom."-".$pTo.".xls");
?>
<table border="1">

                            <tr class="bg-secondary">
                                <th> <?php echo __('Articulo') ?> </th>
                                <th><?php echo __('Descripcion')?></th>
                                <th><?php echo __('Cantidad')?></th>
                                <th><?php echo __('Importe')?></th>
                            </tr>

                            <?php foreach ($dataConsulta as $dataD){ echo '
                                <tr>
                                <td>'.$dataD->Articulo.'</td>
                                <td>'.__($dataD->Descripcion).'</td>
                                <td>'.number_format($dataD->Cantidad).'</td>
                                <td>'.number_format($dataD->Importe, 2, '.', '').'</td>
                                </tr> ';
                            }
                                ?>

</table>
