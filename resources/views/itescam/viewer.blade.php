<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mostrar DOM</title>
    <script
            src="https://code.jquery.com/jquery-3.7.1.min.js"
            integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo="
            crossorigin="anonymous"></script>
    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

</head>
<body>
    <pre id="domPlane">{{ $dom }}</pre>
    <div id="log"></div>
</body>
</html>
<script>
    $( document ).ready(function() {
        
        html = $.parseHTML( $("#domPlane").text() )
        console.log(html);
        $("#log").append( html );
        nodeNames = [];
        
        // Append the parsed HTML
        
        
    });

    
</script>