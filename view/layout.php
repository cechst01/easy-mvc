<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Správa uživatelů</title>
        <link rel="stylesheet" href="assets/css/style.css">
    </head>
    <body>
        
        <?php $messages = Controller::getMessages(); ?>

        <div class="messages">
            <?php foreach($messages as $message) :  ?>        
                <div class="message"><?php echo $message ?></div>       
            <?php endforeach ?> 
        </div>

        <?php    
          $router->processUrl();
        ?>
        <script src="assets/js/jquery-3.2.1.min.js"></script>
        <script src="assets/js/script.js"></script>
        
    </body>
</html>

