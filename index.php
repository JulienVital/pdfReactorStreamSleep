<?php
    // Include PDFreactor class
    // You can download the PDFreactor Web Service PHP client from: 
    // http://www.pdfreactor.com/download/get/?product=pdfreactor&type=webservice_clients&jre=false
    require_once("lib\PDFreactor.class.php");
    use com\realobjects\pdfreactor\webservice\client\PDFreactor as PDFreactor;
    // Create new PDFreactor instance
    $pdfReactor = new PDFreactor("https://cloud.pdfreactor.com/service/rest");
    var_dump('test');
    die();
    $config = array(
        // Specify the input document
        "apiKey"=>"abcd",
        "document"=> "http://www.pdfreactor.com/product/samples/textbook/textbook.html"
    );

    // Render document and save result to $result 
    $result = null;
    try {
        $result = $pdfReactor->convertAsBinary($config);
        header("Content-Type: application/pdf");
        echo $result;
    } catch (PDFreactorWebserviceException $e) {
        echo "<h1>An Error Has Occurred</h1>";
        echo "<h2>".$e->getMessage()."</h2>";
    }
?>