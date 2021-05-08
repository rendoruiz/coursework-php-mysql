<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Summer</title>
    <style type="text/css">
        body {
            font-family: Arial, Helvetica, sans-serif;
        }
        div.container {
            width: 800px;
            margin: 50px auto;
            padding: 20px 40px 40px;
            background-color: #eee;
            border-radius: 5px;
        }
        p, li {
            font-size: 16px;
            line-height: 1.5;
        }
        li:not(:last-of-type) {
            margin-bottom: 10px;
        }
        img {
            width: 100%;
            border-radius: 5px;
        }
        h2 {
            margin-top: 30px;
        }
    </style>
</head>
<body>
<?php
    /*
        Multi-line comments
    */
    echo "\n<div class=\"container\">";
    echo "\n<h1>What I Did on My Summer Vacation</h1>";


    echo "\n<p>Since I took some spring courses at NAIT, I basically did not have time to have a \"vacation\".</p>";
    echo "\n<p>However, I was able to do a few things that might be worth mentioning:</p>";
    echo "\n<ol>";
    echo "\n<li>After learning JavaScript on the previous Fall term, I was able to finally make userscripts that I have been wanting to make that will and has tremendously improved my workflow. By that, I mean instead of having to type and click a lot of things, I was to automate most of them to work automatically or within a single click.</li>";
    echo "\n<li>Despite the demand, I was able to procure a reasonably priced high-grade desktop hard drive ($21/TB) that helped me sort out my files that was previously all over the place. The price was an absolute steal with the current economy.</li>";
    echo "\n</ol>";
    echo "\n</div>";

    echo "\n<div class=\"container\">";
    echo "\n<h2>Here's an onion to tear up your day.</h2>";
    echo "\n<img src=\"onion.jpg\">";
    echo "\n</div>";
    
?>
</body>
</html>