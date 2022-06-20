<?php
    // Include PDFreactor class
    require_once("./lib/PDFreactor.class.php");

use com\realobjects\pdfreactor\webservice\client\ColorSpace;
use com\realobjects\pdfreactor\webservice\client\PDFreactor as PDFreactor;
    use com\realobjects\pdfreactor\webservice\client\PDFreactorWebserviceException as PDFreactorWebserviceException;
    use com\realobjects\pdfreactor\webservice\client\LogLevel as LogLevel;
    use com\realobjects\pdfreactor\webservice\client\ViewerPreferences as ViewerPreferences;

    // The content to render
    // $content = implode(file('../../resources/contentPHP.html'));

    date_default_timezone_set('CET');

    // Create new PDFreactor instance
    $pdfReactor = new PDFreactor("http://localhost:9423/service/rest");
    // $pdfReactor = new PDFreactor("https://cloud.pdfreactor.com/service/rest");
    $pdfReactor->apiKey = "abcd";
    $content = 'https://fr.wikipedia.org/wiki/Clint_Eastwood';
    $config = array(
        // Specify the input document
        "document"=> $content,
        // Set a base URL for images, style sheets, links
        // Set an appropriate log level
        "logLevel"=> LogLevel::DEBUG,
        // Set the title of the created PDF
        "title"=> "Demonstration of PDFreactor PHP API",
        // Sets the author of the created PDF
        "author"=> "Myself",
        // Set some viewer preferences

        // Add user style sheets
        "userStyleSheets"=> array(
            array(
                "content" => "* { -ro-image-resampling: 50dpi; -ro-image-recompression: jpeg(10%) }"
            ),
            array(
                "content" => "@page {
                    margin: 20mm;
                    background-image: url('http://localhost:8000/background.jpg');
                    @top-left{
                        content : element(footerIdentifier) 
                    }"
            )
        )
    );
    $config["colorSpaceSettings"] = array(
        // When converting to RGB the profile is used for accurate conversion from CMYK
        // Not necessary to set in this case (default), but recommended
        "targetColorSpace" => ColorSpace::RGB,
        // Enable conversion of CMYK colors and images to RGB
        "conversionEnabled" => true
    );


    try {
        // Connection settings are required when using the PDFreactor Cloud Service or if the PDFreactor Web Service is behind a load balancer
        $connectionSettings = array();
        // Start document conversion
        $documentId = $pdfReactor->convertAsync($config, $connectionSettings);
        $progress = null;

        do {
            // Poll conversion progress
            sleep(ini_get('max_execution_time') + 10);
            $progress = $pdfReactor->getProgress($documentId, $connectionSettings);
        } while (!$progress->finished);
        
        $file = $pdfReactor->getDocumentAsBinary($documentId, $stream, $connectionSettings);
        // Streaming is more efficient for larger documents
        header('Content-type: application/pdf');
        header('Content-Disposition: inline; filename="stream-async.pdf"');
  

          
        echo $file;
    } catch (PDFreactorWebserviceException $e) {
        header("Content-Type: text/html");
        echo "<h1>An Error Has Occurred</h1>";
        echo "<h2>".$e->getMessage()."</h2>";
    }
?>
