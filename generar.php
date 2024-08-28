<?php
require('fpdf/fpdf.php'); // Reemplaza con la ubicación correcta de la biblioteca FPDF
include('conexion_bd.php');

class PDF extends FPDF
{
    // Cabecera de página
    function Header()
    {
        // Arial bold 15
        $this->SetFont('Arial', 'B', 15);
        // Título
        $this->Cell(0, 10, 'Recibo de Productos', 0, 1, 'C');
        // Salto de línea
        $this->Ln(10);
    }

    // Pie de página
    function Footer()
    {
        // Posición: a 1,5 cm del final
        $this->SetY(-15);
        // Arial italic 8
        $this->SetFont('Arial', 'I', 8);
        // Número de página
        $this->Cell(0, 10, 'Página ' . $this->PageNo(), 0, 0, 'C');
    }
}

// Crear instancia de PDF
$pdf = new PDF();

// Agregar página
$pdf->AddPage();

// Configurar fuente y tamaño para el contenido
$pdf->SetFont('Arial', '', 12);

// Contenido de la tabla
$pdf->Cell(30, 10, 'Producto', 1);
$pdf->Cell(30, 10, 'Talla', 1);
$pdf->Cell(30, 10, 'Color', 1);
$pdf->Cell(30, 10, 'Marca', 1);
$pdf->Cell(30, 10, 'Precio', 1);
$pdf->Ln(); // Salto de línea

// Consulta SQL
$sql = "SELECT * FROM productos"; // Reemplaza 'tu_tabla' con el nombre real de tu tabla
$resultado = mysqli_query($conexion, $sql);

$precioTotal = 0;

if (mysqli_num_rows($resultado) > 0) {
    while ($fila = mysqli_fetch_assoc($resultado)) {
        $pdf->Cell(30, 10, $fila['producto'], 1);
        $pdf->Cell(30, 10, $fila['talla'], 1);
        $pdf->Cell(30, 10, $fila['color'], 1);
        $pdf->Cell(30, 10, $fila['marca'], 1);
        $pdf->Cell(30, 10, $fila['precio'], 1);
        $pdf->Ln();
        
        $precioTotal += $fila['precio'];
    }
} else {
    $pdf->Cell(150, 10, 'No se encontraron productos.', 1);
    $pdf->Ln();
}

// Precio total
$pdf->Cell(150, 10, 'Precio Total:', 1);
$pdf->Cell(30, 10, '$' . number_format($precioTotal, 2), 1);

// Salida del PDF
$pdf->Output();
mysqli_close($conexion);
?>
