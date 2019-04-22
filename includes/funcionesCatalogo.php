<?php
    function artesanas($sql){
        echo '<fieldset>';
                echo '<legend>Procedencia</legend>';
                if (isset($_POST['artesana'])) {
                    echo '<input type="checkbox" name="artesana" checked>Artesanas';
                    $sql = $sql . 'and artesana = 1 ';
                } else {
                    echo '<input type="checkbox" name="artesana">Artesanas';
                }
                if (isset($_POST['nacional'])) {
                    echo '<input type="checkbox" name="nacional" checked>Nacionales';
                    $sql = $sql . 'and pais = "España" ';
                } else {
                    echo '<input type="checkbox" name="nacional">Nacionales';
                }
        echo '</fieldset>';
        return $sql;
    }

    function grado($sql){
        echo '<fieldset>';
                echo '<legend>Grado</legend>';
                $grados = array("Todos" => "",
                                "Menor de 5" => " grado <= 5 ",
                                "Entre 5 y 7" => " grado >= 5 and grado <= 7 ",
                                "Mayor de 7" => " grado >= 7 ");
                $grado = isset($_POST['grado'])?$_POST['grado']:"Todos";
                foreach ($grados as $i => $v) {
                    if ($grado == $i) {
                        echo '<input type="radio" name="grado" value="'.  $i .'" checked>' . $i . '</option>';
                        if (strcmp($v, "") != 0) {
                            $sql = $sql . 'and ' . $v;
                        }
                    } else {
                        echo '<input type="radio" name="grado" value="'.  $i .'">' . $i . '</option>';
                    }
                }
        echo '</fieldset>';
        return $sql;
    }

    function color($sql){
        $colores = array("Rubia", "Negra", "Roja", "Tostada", "Blanca", "Ambar");
        $sqlColor = '';
        echo '<fieldset>';
            echo '<legend>Color</legend>';
            foreach ($colores as $i) {
                if (isset($_POST[$i])) {
                    echo '<input type="checkbox" name="' . $i . '" checked>' . $i . '';
                    if (strcmp($sqlColor, "") == 0) {
                        $sqlColor = $sqlColor . '(color = "' . $i . '" ';
                    } else {
                        $sqlColor = $sqlColor . 'or color = "' . $i . '" ';
                    }
                } else {
                    echo '<input type="checkbox" name="' . $i . '">' . $i . '';
                }
            }
            if (strcmp($sqlColor, "") != 0) {
                $sql = $sql . 'and ' . $sqlColor . ') ';
            }
        echo '</fieldset>';
        return $sql;
    }

    function grano($sql){
        $granos = array("Cebada", "Trigo", "Avena");
        $sqlGranos = '';
        echo '<fieldset>';
        echo '<legend>Grano</legend>';
        foreach ($granos as $i) {
            if (isset($_POST[$i])) {
                echo '<input type="checkbox" name="' . $i . '" checked>' . $i . '';
                if (strcmp($sqlGranos, "") == 0) {
                    $sqlGranos = $sqlGranos . '(grano = "' . $i . '" ';
                } else {
                    $sqlGranos = $sqlGranos . 'or grano = "' . $i . '" ';
                }
            } else {
                echo '<input type="checkbox" name="' . $i . '">' . $i . '';
            }
        }
        if (strcmp($sqlGranos, "") != 0) {
            $sql = $sql . 'and ' . $sqlGranos . ') ';
        }
        echo '</fieldset>';
        $sql =''. $sql;
        return $sql;
    }

    function tipo($sql){
        $tipos = array("Lager", "Ale", "Pilsner");
        $sqlTipos = '';
        echo '<fieldset>';
        echo '<legend>Tipo</legend>';
        foreach ($tipos as $i) {
            if (isset($_POST[$i])) {
                echo '<input type="checkbox" name="' . $i . '" checked>' . $i . '';
                if (strcmp($sqlTipos, "") == 0) {
                    $sqlTipos = $sqlTipos . '(tipo = "' . $i . '" ';
                } else {
                    $sqlTipos = $sqlTipos . 'or tipo = "' . $i . '" ';
                }
            } else {
                echo '<input type="checkbox" name="' . $i . '">' . $i . '';
            }
        }
        if (strcmp($sqlTipos, "") != 0) {
            $sql = $sql . 'and ' . $sqlTipos . ') ';
        }
        echo '</fieldset>';
        $sql =''. $sql;
        return $sql;
    }

    function orden(){
        $orden = array("" => "",
                        /*"Mas vendidas" => " order by cervezasVendidas desc",*/
                        "Precio de mayor a menor" => " order by precio desc",
                        "Precio de menor a mayor" => " order by precio",
                        "Alfabeticamente" => " order by nombre",
                        "Mejor valoradas" => " order by valoracionMedia desc",
                        "Grado de mayor a menor" => " order by grado desc",
                        "Grado de menor a mayor" => " order by grado");
        echo ' Ordernar por: <select name="ordenar">';
        foreach ($orden as $i => $v) {
            if ($_POST['ordenar'] == $i) {
                echo '<option value="'.  $i .'" selected="true">' . $i . '</option>';
                $sqlOrden = $v;
            } else {
                echo '<option value="'.  $i .'">' . $i . '</option>';
            }
        }
        echo '</select>';
        return $sqlOrden;
    }
?>