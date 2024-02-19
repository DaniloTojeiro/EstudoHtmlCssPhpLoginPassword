<?php

    include('config_connect.php');

    // Obtendo os dados da database

    $sql = "SELECT * FROM cadastro";

    $res = $conn -> query($sql);

    if ($res -> num_rows > 0) {
        
        // Cria a variável $html + atribui o código html para a variável
        $html = "";
        $html .= "<center><h1>RELATÓRIO DE CLIENTES</h1></center>";
        $html .= "</center><table border = '1'>";
        
        while ($row = $res -> fetch_object()) {
            // Como ela será repetida, será feita uma atribuição de concatenação ".="
            $html .= "<tr>";
            $html .= "<td>".$row -> id."</td>";
            $html .= "<td>".$row -> nomeCliente."</td>";
            $html .= "<td>".$row -> sobrenomeCliente."</td>";
            $html .= "<td>".$row -> cpf."</td>";
            $html .= "<td>".$row -> sexo."</td>";
            $html .= "<td>".$row -> tipo."</td>";
            $html .= "<tr>";
        }
        $html .= "<table></center>";
    } else {
        $html = 'Nenhum dado registrado';
    }

    // Gerando o pdf

    use Dompdf\Dompdf;
    use Dompdf\Options;

    require_once './autoload.inc.php';

    $dompdf = new Dompdf();
    $options = new Options();
    // $options = $dompdf->getOptions(); 

    $options -> set('defaultFont', 'Courier');
    $options -> setDefaultPaperSize('A4');
    $options -> setDefaultPaperOrientation('portrait');
    
    $dompdf -> addInfo('Attachment', '0');

    $dompdf -> loadHtml($html);

    $dompdf -> setOptions($options);

    $dompdf -> render();

    $dompdf -> stream('Relatorio', array("Attachment" => 1));

?>