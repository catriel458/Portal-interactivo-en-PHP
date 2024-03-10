<?php

mysqli_report(MYSQLI_REPORT_ERROR|MYSQLI_REPORT_STRICT);

    require'fpdf.php';
    $mysqli= new mysqli("localhost","root","","colegio");
    if (mysqli_connect_errno()){
        echo 'conexion fallida :',mysqli_connect_error();
        exit();

    }

    $query ="SELECT
    apellido,	
    nombre,	
    dni,	
    telefono,	
    distrito,	
    fecha,	
    horario,	
    tramite,	
    profesion,	
    observacion FROM turnos WHERE dni=dni";

    $resultado=$mysqli->query($query);

    class PDF extends fpdf {
    function Header() {
    $this->Image('colegio.JPG',5,5,20);
    $this->SetFont('Arial','B',15);
    $this->Cell(30);
    $this->Cell(120,10,'Reporte de turnos',0,0,'D');
    $this->Ln(20); 
    }
    function Footer() 
    {
    $this->SetY(-15);
    $this->SetFont('Arial','I','8');
    $this->Cell(0,10,'Pagina '.$this->PageNo().'/{nb}',0,0,'D');

    }

    }
    $pdf=new PDF ();
    $pdf->AliasNbPages();
    $pdf->AddPage();
    $pdf->SetFillColor(232,232,232);
    $pdf->SetFont('Arial','B',10);
    $pdf->Cell(20,6,'apellido',1,0,'C',1);
    $pdf->Cell(20,6,'nombre',1,0,'C',1);
    $pdf->Cell(20,6,'dni',1,0,'C',1);
    $pdf->Cell(20,6,'telefono',1,0,'C',1);
    $pdf->Cell(20,6,'distrito',1,0,'C',1);
    $pdf->Cell(20,6,'fecha',1,0,'C',1);
    $pdf->Cell(20,6,'horario',1,0,'C',1);
    $pdf->Cell(20,6,'tramite',1,0,'C',1);
    $pdf->Cell(20,6,'profesion',2,0,'C',1);
    $pdf->Cell(20,6,'observacion',1,1,'C',1);
    $pdf->SetFont('Arial',"",10);
    while($row=$resultado->fetch_assoc())
    {
        $pdf->Cell(20,6,utf8_decode($row['apellido']),1,0,'c');
        $pdf->Cell(20,6,utf8_decode($row['nombre']),1,0,'c');
        $pdf->Cell(20,6,utf8_decode($row['dni']),1,0,'c');
        $pdf->Cell(20,6,utf8_decode($row['telefono']),1,0,'c');
        $pdf->Cell(20,6,utf8_decode($row['distrito']),1,0,'c');
        $pdf->Cell(20,6,utf8_decode($row['fecha']),1,0,'c');
        $pdf->Cell(20,6,utf8_decode($row['horario']),1,0,'c');
        $pdf->Cell(20,6,utf8_decode($row['tramite']),1,0,'c');
        $pdf->Cell(20,6,utf8_decode($row['profesion']),1,0,'c');
        $pdf->Cell(20,6,utf8_decode($row['observacion']),1,1,'c');
    }


    $pdf->Output();
    ?>
