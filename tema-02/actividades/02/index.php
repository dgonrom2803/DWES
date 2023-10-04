<?php 

    $var = 5;

    // Conversion mediante las funciones
    $var1 = strval($var);
    $var2 = intval($var);
    $var3 = floatval($var);

    // Muestra el tipo de datos y el valor
    var_dump($var1);
    var_dump($var2);
    var_dump($var3);

    echo "<BR>";

    // Conversión variable
    $var1=(int) $var;
    $var1=(float) $var;
    $var1=(string) $var;

    // Muestra el tipo de datos y el valor
    var_dump($var1);
    var_dump($var2);
    var_dump($var3);

    echo "<BR>";

    // Usando settype
    settype ($var1, "integer");
    settype ($var2, "float");
    settype ($var3, "string");

    // Muestra el tipo de datos y el valor
    var_dump($var1);
    var_dump($var2);
    var_dump($var3);


?>