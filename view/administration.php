<h1>Administrace</h1>
<a href="<?php echo BASE_PATH . '/user/add' ?>">Vložit uživatele</a>
<a href="<?php echo BASE_PATH . '/sign/out' ?>">Odhlásit se</a>
<?php if($users) : ?>
    <table class="user-table">
        <tr>
            <td>Id</td>
            <td>Jméno</td>
            <td>Příjmení</td>
            <td>Email</td>
            <td>Město</td>
            <td>Ulice</td>
            <td>Psč</td>
            <td>Akce</td>
        </tr>
        <?php foreach ($users as $user) : ?>        
        <tr class="user-<?php echo $user['id'] ?>">
            <td><?php echo $user['id'] ?></td>
            <td><?php echo $user['first_name'] ?></td>
            <td><?php echo $user['last_name'] ?></td>
            <td><?php echo $user['email'] ?></td> 
            <td><?php echo $user['city'] ?></td>
            <td><?php echo $user['street'] ?></td>
            <td><?php echo $user['postal_code'] ?></td>
            <td>
                <a href="<?php echo BASE_PATH . '/user/edit/'.$user['id'] ?>" >Upravit</a>
                <a href="<?php echo BASE_PATH . '/user/delete/'.$user['id'] ?>" class="ajax-delete">Smazat</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
<?php endif; ?>

