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
        $vowels = array("á", "é", "í", "ó", "ú", "Á", "É", "í", "Ó", "ú","ñ","Ñ");
        $s = str_replace($vowels, "?", $s);

        echo json_encode(processRequest($s),true);
    }
    return;
}    

function processRequest($s){
    
    $client = ClientBuilder::create()->build();

    // $params = [
    //     'index' => 'documento',
    //     'type' => 'documento',
    //     'id' => 'codigo'
    // ];
    
    // $response = $client->get($params);


        //https://packagist.org/packages/elasticsearch/elasticsearch

        $params = [
            'index' => 'documento',
            'type' => 'documento',
            "from" => 0, 
            "size" => 50,
            'body' => [
                'query' => [
                    'query_string' => [
                        'query' =>"*$s*",
                        "fields"=> ["contenido"],
                        "fuzziness" => "AUTO"
                    ]
                ]
            ]
        ];

        $response = $client->search($params);
        return($response['hits']);
    
}