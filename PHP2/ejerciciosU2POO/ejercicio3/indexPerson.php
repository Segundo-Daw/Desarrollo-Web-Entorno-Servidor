<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        include_once $_SERVER["DOCUMENT_ROOT"] . "/clases/Employee.php";
        include_once $_SERVER["DOCUMENT_ROOT"] . "/clases/Manager.php";
        include_once $_SERVER["DOCUMENT_ROOT"] . "/clases/Person.php";
        include_once $_SERVER["DOCUMENT_ROOT"] . "/clases/PayLip.php";


        $empleade1 = new Employee("Carolina", "Ruescas Cruz",10000, []);
        $manager1 = new Manager("Yolanda", "Martinez Cruz", 25000, [], 3);
        

        //Añadimos los teléfonos
        $empleade1->addTelephone("618387331");
        $manager1->addTelephone("689429548");


        //EMPLEADO
        //con echo $empleade me muestra toda la infromación que hay en el __toString
        echo $empleade1 . "<br>";
        
        $sueldo = $empleade1->payTaxes();

        echo $sueldo == -1 ? "No tiene sueldo por lo que no paga impuestos." : "Impuestos a pagar: " . number_format($sueldo , 2) . " €";

        //Mostrar telefono si lo tiene
        $telefonos = $empleade1->listTelephones();
        if(!empty($telefonos)){
            echo "<br>Teléfonos: " . implode(", ", $telefonos);
        }
        echo "<br>";

        //Sueldo final
        $sueldoFinal = $empleade1->calculateSalary();
        echo "El sueldo final es: " . $sueldoFinal;



        echo "<br>";
        echo "<br>";
        //MANAGER
        //con echo $empleade me muestra toda la infromación que hay en el __toString
        echo $manager1. "<br>";
        
        $sueldo = $manager1->payTaxes();

        echo $sueldo == -1 ? "No tiene sueldo por lo que no paga impuestos." : "Impuestos a pagar: " . number_format($sueldo , 2) . " €";

        //Mostrar telefono si lo tiene
        $telefonos = $manager1->listTelephones();
        if(!empty($telefonos)){
            echo "<br>Teléfonos: " . implode(", ", $telefonos);
        }
        echo "<br>";


        //Sueldo final
        $sueldoFinal = $manager1->calculateSalary();
        echo "El sueldo final es: " . $sueldoFinal . "<br>";
        echo"<br>";


        //Nómina con la interfaz
        echo "Nómina: " . $empleade1->createPayslip($empleade1);

       








        

        

    ?>

    
    
</body>
</html>