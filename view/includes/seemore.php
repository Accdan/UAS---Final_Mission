<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ASCII Art</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="./output.css" rel="stylesheet">
    <style>
        body {
            font-family: monospace;
            background-color: #000;
            color: #0f0;
            text-align: center;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        pre {
            line-height: 1.2;
        }
    </style>
</head>
<body>
    <?php
        $asciiArt = "▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒\n" .
                    "▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒████▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒\n" .
                    "▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒██████████▒▒▒▒▒▒▒▒▒▒▒▒▒\n" .
                    "▒▒▒▒▒▒▒▒▒▒▒▒▒▒██████████████▒▒▒▒▒▒▒▒▒▒▒\n" .
                    "▒▒▒▒▒▒▒▒▒▒▒▒█████████████████▒▒▒▒▒▒▒▒▒▒\n" .
                    "▒▒▒▒▒▒▒▒▒▒▒███████████████████▒▒▒▒▒▒▒▒▒\n" .
                    "▒▒▒▒▒▒▒▒▒▒█████████████████████▒▒▒▒▒▒▒▒\n" .
                    "▒▒▒▒▒▒▒▒▒██████████████████████▒▒▒▒▒▒▒▒\n" .
                    "▒▒▒▒▒▒▒▒████████████████████████▒▒▒▒▒▒▒\n" .
                    "▒▒▒▒▒▒▒▒█████████████████████████▒▒▒▒▒▒\n" .
                    "▒▒▒▒▒▒▒███████████████████████████▒▒▒▒▒\n" .
                    "▒▒▒▒▒▒████████████████████████████████▒\n" .
                    "▒▒▒▒▒▒███████████████──███████████████▒\n" .
                    "▒▒▒▒▒████████████████──███████████████▒\n" .
                    "▒███████████████████────██████████████▒\n" .
                    "▒███████████████████─────█████████████▒\n" .
                    "▒██████████████████──────█████████████▒\n" .
                    "▒█████████████████─────────███████████▒\n" .
                    "▒███████████───────────────────███████▒\n" .
                    "▒▒████████────────────────────███─████▒\n" .
                    "▒▒███████────────────────────███───███▒\n" .
                    "▒▒██████─────██──────────────██────██▒▒\n" .
                    "▒▒█████─────████─────────────██────██▒▒\n" .
                    "▒▒▒███─────████─███──────────██────██▒▒\n" .
                    "▒▒▒███─────███────█──────────███──███▒▒\n" .
                    "▒▒▒▒██─────███────█──────────███──██▓▒▒\n" .
                    "▒▒▒▒███────███────█───────────██████▒▒▒\n" .
                    "▒▒▒▒▒██────███────█────────────█████▒▒▒\n" .
                    "▒▒▒▒▒██────████──██──────────────██▒▒▒▒\n" .
                    "▒▒▒▒▒▒██────███████──────────────██▒▒▒▒\n" .
                    "▒▒▒▒▒▒██────██████─────────────████▒▒▒▒\n" .
                    "▒▒▒▒▒▒▒██────█████──█─────────████▒▒▒▒▒\n" .
                    "▒▒▒▒▒▒▒▒██─────██───███───────███▒▒▒▒▒▒\n" .
                    "▒▒▒▒▒▒▒▒▒██────────█████─────██─█▒▒▒▒▒▒\n" .
                    "▒▒▒▒▒▒▒▒▒████──────███──────██──█▒▒▒▒▒▒\n" .
                    "▒▒▒▒▒▒▒▒██──█──────██──────██───█▒▒▒▒▒▒\n" .
                    "▒▒▒▒▒▒▒██────██───────────██────█▒▒▒▒▒▒\n" .
                    "▒▒▒▒▒▒▒█─────████───────████────█▒▒▒▒▒▒\n" .
                    "▒▒▒▒▒▒▒█────██▒▒█████████▒▒█────█▒▒▒▒▒▒\n" .
                    "▒▒▒▒▒▒▒█────█▒▒▒██─────██▒▒██──██▒▒▒▒▒▒\n" .
                    "▒▒▒▒▒▒▒██──██▒▒▒██─────██▒▒▒████▒▒▒▒▒▒▒\n" .
                    "▒▒▒▒▒▒▒▒████▒▒▒▒█████████▒▒▒▒▒▒▒▒▒▒▒▒▒▒\n" .
                    "▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒█████████▒▒▒▒▒▒▒▒▒▒▒▒▒▒\n" .
                    "▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒█───────█▒▒▒▒▒▒▒▒▒▒▒▒▒▒\n" .
                    "▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒█───────█▒▒▒▒▒▒▒▒▒▒▒▒▒▒\n" .
                    "▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒█████████▒▒▒▒▒▒▒▒▒▒▒▒▒▒\n" .
                    "▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒█████████▒▒▒▒▒▒▒▒▒▒▒▒▒▒\n" .
                    "▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▄█───────█▄▒▒▒▒▒▒▒▒▒▒▒▒▒\n" .
                    "▒▒▒▒▒▒▒▒▒▒▒▒▒▒█───████───█▒▒▒▒▒▒▒▒▒▒▒▒▒\n" .
                    "▒▒▒▒▒▒▒▒▒▒▒▒▒▒█───█▒▒█───█▒▒▒▒▒▒▒▒▒▒▒▒▒\n" .
                    "▒▒▒▒▒▒▒▒▒▒▒▒▒▒█───█▒▒█───█▒▒▒▒▒▒▒▒▒▒▒▒▒\n" .
                    "▒▒▒▒▒▒▒▒▒▒▒▒▒▒█───█▒▒█───█▒▒▒▒▒▒▒▒▒▒▒▒▒\n" .
                    "▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒███▒▒▒▒███▒▒▒▒▒▒▒▒▒▒▒▒▒▒\n" .
                    "▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒";

        echo "<pre>$asciiArt</pre>";
    ?>
</body>
</html>
