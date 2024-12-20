<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>post and get fun</title>
    </head>

    <body>
        
        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="GET" >
        <fieldset>
            <legend>هنا سيتم العرض عند الارسال بواسطة GET</legend>
        <?php

        foreach ($_GET as $key => $value){
            echo "<div> $key :$value</div>";
        }

         ?>




            <input type="text" name="username" placeholder="your name here" >
            <input type="number" name="age" placeholder="your age here" >
            <input type="text" name="city" placeholder="your city here" >
            <input type="submit" value="GET submit">

        </fieldset>
    </form>


    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST" >
        <fieldset>
            <legend>هنا سيتم العرض عند الارسال بواسطة POST</legend>
        <?php

        foreach ($_POST as $key => $value){
            echo "<div> $key :$value</div>";
        }

         ?>




            <input type="text" name="username" placeholder="your name here" >
            <input type="number" name="age" placeholder="your age here" >
            <input type="text" name="city" placeholder="your city here" >
            <input type="submit" value="POST submit">

        </fieldset>
    </form>



      


    </body>

</html>

