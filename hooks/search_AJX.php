<?php
header('Content-type: application/json');
$currDir = dirname(__FILE__);
$base_dir = realpath("{$currDir}/..");  
include("$base_dir/lib.php");
use Elasticsearch\ClientBuilder;
require '../vendor/autoload.php';


if (isset($_POST['cmd']) && isset($_POST['s']) ){
    $cmd = makeSafe($_POST['cmd']); 
    $s = makeSafe($_POST['s']);
    if ($cmd === 'search'){
        // $vowels = array("á", "é", "í", "ó", "ú", "Á", "É", "í", "Ó", "ú","ñ","Ñ");
        // $s = str_replace($vowels, "?", $s);

        echo json_encode(processRequest($s),true);
    }
    if ($cmd === 'erase'){
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
            echo json_encode($response);
        }
            //Si no se pudo realizar la conexion mostramos este otro mensaje y nos salimos
        else{
            echo 'Conexion fallida</br>';
            exit;
        }
    }
    return;
}    

function processRequest($s){
    
    $client = ClientBuilder::create()->build();
    if ($client) {

        //https://packagist.org/packages/elasticsearch/elasticsearch

        $params = [
            'index' => 'documento',
            'type' => 'documento',
            "from" => 0, 
            "size" => 50,
            'body' => [
                'query' => [
                    'multi_match' => [
                        'query' =>"$s",
                        "fields"=> ["contenido"],
                        "fuzziness" => "AUTO"
                    ]
                    ],
                "_source" => ["contenido"],
                "size"=> 1
            ]

        ];

        $response = $client->search($params);

        return($response['hits']);
    }
}