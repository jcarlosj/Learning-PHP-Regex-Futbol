<?php

$match = 0;
$nomatch = 0;

# Abre el archivo
$file = fopen( './files/results.csv', 'r' );

# Itera cada uno de las líneas del archivo
while( !feof( $file ) ) {          # feof — Comprueba si el puntero a un archivo está al final del archivo
    $line = fgets( $file );        # fgets — Obtiene una línea desde el puntero a un fichero
    # Valida nuestra expresión regular
    if( preg_match(                # preg_match — Realiza una comparación con una expresión regular
            '/^2018\-01\-(\d{2,2}),.*$/',    # Expresión Regular, debe ir entre comillas sencillas (es lo recomendado) y slashes /
            $line,                            # Línea
            $matches                          # Matches
        )
    ) {
        print_r( $matches );
        $match++;
    }
    else {
        $nomatch++;
    }
}

# Cierra el archivo
fclose( $file );

printf( "\n\naciertos: %d \ndesaciertos: %d\n", $match, $nomatch );
