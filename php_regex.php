<?php

$tiempo = time();
$match = 0;
$nomatch = 0;

# Abre el archivo
$file = fopen( './files/results.csv', 'r' );

# Itera cada uno de las líneas del archivo
while( !feof( $file ) ) {          # feof — Comprueba si el puntero a un archivo está al final del archivo
    $line = fgets( $file );        # fgets — Obtiene una línea desde el puntero a un fichero
    # Valida nuestra expresión regular
    if( preg_match(                # preg_match — Realiza una comparación con una expresión regular
            '/^(\d{4}\-\d{2}\-\d{2,2}),(.+),(.+),(\d+),(\d+).*$/i',    # Expresión Regular, agrega el flag i (indica que es case sentitive))
            $line,                            # Línea
            $matches                          # Matches
        )
    ) {
        if( $matches[ 4 ] == $matches[ 5 ] ) {
            printf( "Empate:  " );
        }
        else if( $matches[ 4 ] > $matches[ 5 ] ) {
            echo 'Local:  ';
        }
        else {
            echo "Visitante:";
        }
        printf( "\t%s, %s [%d-%d] \n", $matches[ 2 ], $matches[ 3 ], $matches[ 4 ], $matches[ 5 ] );
        $match++;
    }
    else {
        $nomatch++;
        # echo $line;
    }
}

# Cierra el archivo
fclose( $file );

printf( "\n\naciertos: %d \ndesaciertos: %d\n", $match, $nomatch );
printf( "tiempo de ejecución: %d segundos: \n", time() - $tiempo );
