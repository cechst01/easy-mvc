<h1>Správa uživatelů</h1>
<form method="post" action="<?php echo BASE_PATH . '/sign'  ?>">
    <table>
        <tr>
            <td><label for="email">Email:</label></td>
            <td><input type="email" name="email" id="email"></td>
        </tr>
        <tr>
            <td><label for="password">Heslo:</label></td>
            <td><input type="password" name="password" id="password"></td>
        </tr>
        <tr>
            <td></td>
            <td><input type="submit" value="Přihlásit"></td>
        </tr>
    </table>
</form>
