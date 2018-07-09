<?php


      foreach ($servicios as $servicio){
        echo "----------------------------<br>";
        echo "SERVICIO:$servicio->servicio<br>";
        echo "----------------------------<br><br>";
            foreach ($servicio->enunciado as $enunciado){
                echo "->Enunciado:$enunciado->enunciado<br>";
            }
                //echo "-----Categorias de Problemas/Soluciones y Facturables-------<br>";
                    echo "<br>";
            foreach ($servicio->categoria as $categoria){
                echo "->Categoria:$categoria->categoria<br><br>";

                foreach ($categoria->problema as $problema)
                    echo "---->Problema:$problema->problema<br>";

                echo "<br>";

                foreach ($categoria->solucion as $solucion)
                    echo "---->Solucion:$solucion->solucion<br>";

                echo "<br>";

                foreach ($categoria->facturable as $facturable)
                    echo "---->Facturable:$facturable->facturable<br>";

                echo "<br>";


            }
       }