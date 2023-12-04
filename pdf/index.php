<?php


include('config.php');

$sql = "SELECT * FROM usuario";

$res = $coon->query($sql);



if($res->num_rows > 0){
  $html = "<table border='1'>";
  while($row = $res->fetch_object()){
      $html.= "<tr>";
      $html.= "<td>".$row->id."</td>";
      $html.= "<td>".$row->nome."</td>";
      $html.= "<td>".$row->email."</td>";
      $html.= "<td>".$row->fone."</td>";
      $html.= "</tr>";
  }
  $html.="</table>";
  
}else{
  $html.='Nenhum dado registrado';
}

//gerar o pdf

      use Dompdf\Dompdf;

      require_once 'dompdf/autoload.inc.php';

      $dompdf = new Dompdf();

      $dompdf->loadHtml($html);

      $dompdf->set_option('defaulFont', 'sans');

      $dompdf->setPaper('A4','landscape');

      $dompdf->render();

      $dompdf->stream();

?>