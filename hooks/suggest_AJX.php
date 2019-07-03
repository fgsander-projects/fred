<?php
header('Content-type: application/json');
$currDir = dirname(__FILE__);
$base_dir = realpath("{$currDir}/..");  
include("$base_dir/lib.php");
use Elasticsearch\ClientBuilder;
require '../vendor/autoload.php';

$mi = getMemberInfo();
if(!$mi['username'] || $mi['username'] == 'guest'){
    echo "Access denied";
    exit;
}

if (isset($_REQUEST['cmd']) && isset($_REQUEST['s']) ){
    $cmd = makeSafe($_REQUEST['cmd']); 
    $s = makeSafe($_REQUEST['s']);
    if ($cmd === 'search'){

        echo json_encode(processRequest($s),true);
    }
    if ($cmd === 'erase'){
        echo json_encode(deleteDocument(),true);
    }
    if ($cmd === 'create'){
        echo json_encode(createDocument(),true);
    }

    return;
}    
function createDocument(){
    system("/usr/share/logstash/bin/logstash -f import.conf");
    return;
}
function deleteDocument(){
 //delete document
 $client = ClientBuilder::create()->build();
 //Si la conexion fue exitosa mostramos este mensaje
 if ($client) {
     //Cargamos el array con los parametros del documento a borrar
     $params = [
         //Nombre del index (bd)
         'index' => 'documento',
     ];
     //Pasamos los parametros a la funcion delete de elasticseach
     $response = $client->indices()->delete($params);
     //Mostramos la respuesta
     return $response;
 }
     //Si no se pudo realizar la conexion mostramos este otro mensaje y nos salimos
 else{
     return 'Falha na conexão</br>';
 }
}
function processRequest($s){
    
    $client = ClientBuilder::create()->build();
    if ($client) {

        //https://packagist.org/packages/elasticsearch/elasticsearch

        $params = [
            'index' => 'documento',
            'type' => 'documento',
            "from" => 0, 
            "size" => 100,
            'body' => [
                'query' => [
					
                    'suggest' => [
                        'query' =>"$s",
						'type' =>"completition",
                        "fields"=> ["contenido"],
                        "fuzziness" => "AUTO",
                      //  "minimum_should_match" => "100%",
					 //	"operator" => "and"
                    ],
                ],
                "_source" => ["contenido","identificador"],
                "size"=> 10
            ]

        ];

        $response = $client->suggest($params);

        return($response['hits']);
    }
}