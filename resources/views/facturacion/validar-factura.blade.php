<?php
declare(strict_types=1);

use PhpCfdi\SatEstadoCfdi\Soap\SoapConsumerClient;
use PhpCfdi\SatEstadoCfdi\Soap\SoapClientFactory;
use PhpCfdi\SatEstadoCfdi\Consumer;

$xml = simplexml_load_file("FA34012.xml");
$ns = $xml->getNamespaces(true);
$xml->registerXPathNamespace('c', $ns['cfdi']);
$xml->registerXPathNamespace('t', $ns['tfd']);
$uuid='';
$emisor='';
$receptor='';
$total='';
$sello='';


//EMPIEZO A LEER LA INFORMACION DEL CFDI E IMPRIMIRLA
foreach ($xml->xpath('//cfdi:Comprobante') as $cfdiComprobante){
      echo $cfdiComprobante['Total'];
      echo "<br />";
      $total= (string)$cfdiComprobante['Total'];
}
foreach ($xml->xpath('//cfdi:Comprobante//cfdi:Emisor') as $Emisor){
   echo $Emisor['Rfc'];
   echo "<br />";
   $emisor= (string)$Emisor['Rfc'];
}

foreach ($xml->xpath('//cfdi:Comprobante//cfdi:Receptor') as $Receptor){
   echo $Receptor['Rfc'];
   echo "<br />";
   $receptor= (string)$Receptor['Rfc'];

}

//ESTA ULTIMA PARTE ES LA QUE GENERABA EL ERROR
foreach ($xml->xpath('//t:TimbreFiscalDigital') as $tfd) {
   echo $tfd['SelloCFD'];
   echo "<br />";
   $sello= (string)$tfd['SelloCFD'];
   echo $tfd['UUID'];
   $uuid= (string)$tfd['UUID'];
}

$udsello=substr($sello,-8);




// creamos la fábrica dándole los parámetros de los objetos \SoapClient que fabricará
$factory = new SoapClientFactory([
    'user_agent' => 'Mozilla/5.0 (X11; Linux x86_64; rv:66.0) Gecko/20100101 Firefox/66.0'
]);

// le pasamos la fábrical al cliente
$client = new SoapConsumerClient($factory);

// creamos el consumidor del servicio para poder hacer las consultas
$consumer = new Consumer($client);



// consumimos el webservice!
$response = $consumer->execute('https://verificacfdi.facturaelectronica.sat.gob.mx/default.aspx?&id='.$uuid.'&re='.$emisor.'&rr='.$receptor.'&tt='.$total.'&fe='.$udsello);

// usamos el resultado
if ($response->cancellable()->isNotCancellable()) {
    echo 'CFDI no es cancelable';
}
echo "<br />";
echo "Estatus de consulta: ";
echo $response->query();
echo "<br />";
echo "Cancelable: ";
echo $response->cancellable();
echo "<br />";
echo "Estatus de la factura: ";
echo $response->document();
echo "<br />";
echo "Estatus de cancelacion: ";
echo $response->cancellation();
echo "<br />";
echo "Estatus de efos: ";
echo $response->efos();
dd($response);
