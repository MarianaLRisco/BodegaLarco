<?php

include "../conexion.php";
    session_start();
 

    switch($_REQUEST["op"]){
        case 'agregar_detalle_venta':
            if(empty($_POST['producto']) || empty($_POST['cantidad'])){
                echo 0;
            }else{
                $id=$_POST['producto'];
                $cant = $_POST['cantidad'];
                $token = md5($_SESSION['iduser']);

                $query_detalle_tmp = mysqli_query($conection, "CALL add_detalle_temp('$id','$cant','$token')");
                $result = mysqli_num_rows($query_detalle_tmp);

                $detalletabla='';
                $subtotal = 0;
                $igv = 0;
                $total = 0;
                $arrayData = array();
                if ($result > 0) {
                    while($data = mysqli_fetch_assoc($query_detalle_tmp)){
                        $precioTotal = round($data['cantidad'] * $data['precio_venta'],2);
                        $subtotal = round($subtotal + $precioTotal,2);
                        $total = round($total + $precioTotal, 2);

                    $detalletabla .= '
                                        <tr>
                                            <td>'.$data['codproducto'].'</td>
                                            <td colspan="2">'.$data['nombre'].'</td>
                                            <td>'.$data['cantidad'].'</td>
                                            <td class="text-end">'.$data['precio_venta'].'</td>
                                            <td class="text-end">'.$precioTotal.'</td>
                                            <td><a class="btn btn-danger" href="#" role="button" onclick="">Eliminar</a></td>
                                        </tr>
                                    ';
                }
                $detalle_totales = '
                <tr>
                    <td colspan="5" class="text-end">total</td>
                    <td class="text-end">'.$subtotal.'</td>
                </tr>';

                $arrayData['detalle'] = $detalletabla;
                $arrayData['totales'] = $detalle_totales;

                echo json_encode($arrayData, JSON_UNESCAPED_UNICODE);
                } else {
                    echo 'error';
                }
                mysqli_close($conection);
            }
            break;

        case 'extrae_detalle_venta':
            if (empty($_POST['user'])) {
                echo 0;
            } else {
                
                $token = md5($_SESSION['iduser']);

                $query = mysqli_query($conection, "SELECT tmp.correlativo, tmp.cantidad, tmp.precio_venta, tmp.token_user, p.idproducto, p.nombre FROM detalle_temp tmp 
                inner join producto p on tmp.codproducto=p.idproducto WHERE token_user = '$token'");
                $result = mysqli_num_rows($query);

                $detalletabla = '';
                $subtotal = 0;
                $igv = 0;
                $total = 0;
                $arrayData = array();
                if ($result>0) {
                    while ($data = mysqli_fetch_assoc($query)) {
                        $precioTotal = round($data['cantidad'] * $data['precio_venta'], 2);
                        $subtotal = round($subtotal + $precioTotal, 2);
                        $total = round($total + $precioTotal, 2);

                        $detalletabla .= '
                            <tr>
                                <td>' . $data['idproducto'] . '</td>
                                <td colspan="2">' . $data['nombre'] . '</td>
                                <td>' . $data['cantidad'] . '</td>
                                <td class="text-end">' . $data['precio_venta'] . '</td>
                                <td class="text-end">' . $precioTotal . '</td>
                                <td><a class="btn btn-danger" href="#" role="button" onclick="">Eliminar</a></td>
                            </tr>';
                    }
                    $detalle_totales = '
                        <tr>
                            <td colspan="5" class="text-end">total</td>
                            <td class="text-end">' . $subtotal . '</td>
                        </tr>';

                    $arrayData['detalle'] = $detalletabla;
                    $arrayData['totales'] = $detalle_totales;

                    echo json_encode($arrayData, JSON_UNESCAPED_UNICODE);
                } else {
                    echo 'error';
                }
                mysqli_close($conection);
            }
            break;

    }




?>