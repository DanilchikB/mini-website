<!DOCTYPE HTML>
<html>
   <head>
      <meta charset="utf-8">
      <title>  <?= $page->title ?> </title>
      <link rel="stylesheet" href="/css/style.css">
      
   </head>
   <body>
      <div id="header">
         <div class = "header-content">
            <div class = "logo">
               <a class = "white" href="">Logo</a>
            </div>
            <div class = "search">
               <input class = "input-search">
               <a href = "" class = "button-search white">Поиск</a>
            </div>
            <div class = "signin">
               <a class = "white" href="">Войти</a>
            </div>
         </div>
      </div>
      
      <div id="content">
         <?php echo $content?>
      </div>

      <div id="footer">

      </div>
      
      
   </body>
</html>
