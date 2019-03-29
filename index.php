<?php
  require_once 'include/init.php';
?>
<!doctype html>
<html>
  
  <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta name="description" content="Share live code snippets with anyone, anywhere. Aand keep control of it.">

      <title><?= $slug ?> :: ShareCode</title>

      <link rel="icon" type="image/png" href="res/img/favicon.png">
      
      <link rel="stylesheet" href="res/vendor/css-reset/reset.min.css">
      <link rel="stylesheet" href="res/vendor/codemirror/lib/codemirror.css">
      <link rel="stylesheet" href="res/vendor/codemirror/theme/monokai.css">
      <link rel="stylesheet" href="res/css/main.css">
  </head>

  <body>
    
    <textarea id="code" name="code"></textarea>
      
    <!-- Code Mirror -->
    <script src="res/vendor/codemirror/lib/codemirror.js"></script>
    <script src="res/vendor/codemirror/mode/css/css.js"></script>
    <script src="res/vendor/codemirror/mode/clike/clike.js"></script>
    <script src="res/vendor/codemirror/mode/htmlmixed/htmlmixed.js"></script>
    <script src="res/vendor/codemirror/mode/javascript/javascript.js"></script>
    <script src="res/vendor/codemirror/mode/php/php.js"></script>
    <script src="res/vendor/codemirror/mode/xml/xml.js"></script>
    <script src="res/vendor/codemirror/addon/edit/matchbrackets.js"></script>

    <!-- jQuery -->
    <script src="res/vendor/jquery/dist/jquery.min.js"></script>

    <!-- Functions -->
    <script src="res/js/checkCode.function.js"></script>
    <script src="res/js/getCode.function.js"></script>
    <script src="res/js/loadCodeMirror.function.js"></script>
    <script src="res/js/updateCode.function.js"></script>

    <!-- Main script -->
    <script src="res/js/main.js"></script>

    <script>
      // PHP to JS URL slug
      var urlSlug = '<?= $slug ?>';
    </script>

  </body>

</html>
