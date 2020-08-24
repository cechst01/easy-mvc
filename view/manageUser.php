<?php 
    if(isset($user)){        
        extract($user);
    }
    else{
       $id = $first_name = $last_name = $email = $city = $street = $postal_code = '';
       
    }
?>
<form method="post" action="<?php echo BASE_PATH . '/user/save'?>">
    <table>
        <tr>
            <td><label for="first_name">Jméno:</label></td>
            <td><input type="" name="first_name" id="first_name" value="<?php echo $first_name?>"></td>
        </tr>
         <tr>
            <td><label for="last_name">Příjmení:</label></td>
            <td><input type="text" name="last_name" id="last_name" value="<?php echo $last_name?>"></td>
        </tr>
         <tr>
            <td><label for="email">Email:</label></td>
            <td><input type="email" name="email" id="email" value="<?php echo $email?>"></td>
        </tr>
         <tr>
            <td><label for="password">Heslo:</label></td>
            <td><input type="password" name="password" id="password"></td>
        </tr>
         <tr>
            <td><label for="again">Heslo pro kontrolu:</label></td>
            <td><input type="password" name="again" id="again"></td>
        </tr>
         <tr>
            <td><label for="city">Město:</label></td>
            <td><input type="text" name="city" id="city" value="<?php echo $city?>"></td>
        </tr>
         <tr>
            <td><label for="street">Ulice a ČP:</label></td>
            <td><input type="text" name="street" id="street" value="<?php echo $street?>"></td>
        </tr>
         <tr>
            <td><label for="postal_code">PSČ:</label></td>
            <td><input type="text" name="postal_code" id="postal_code" value="<?php echo $postal_code?>"></td>
        </tr>
         <tr>
            <td><input type="hidden" name="id" value="<?php echo $id ?>"></td>
            <td><input type="submit" value="Odeslat"></td>
        </tr>
         
    </table>
</form>


