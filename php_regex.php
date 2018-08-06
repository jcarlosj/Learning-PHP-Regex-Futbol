<?php

# Abre el archivo
$file = fopen( './files/results.csv', 'r' );

# Itera cada uno de las líneas del archivo
while( !feof( $file ) ) {          # feof — Comprueba si el puntero a un archivo está al final del archivo
    $line = fgets( $file );        # fgets — Obtiene una línea desde el puntero a un fichero
    echo $line;
}

# Cierra el archivo
fclose( $file );
