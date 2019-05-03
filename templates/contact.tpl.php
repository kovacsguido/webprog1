<?php
// Load stored messages
$sqlSelect = "SELECT * FROM messages ORDER BY created DESC";
$sth = $dbh->prepare($sqlSelect);
$sth->execute();
$messages = $sth->fetchAll(PDO::FETCH_ASSOC);
?>
<h1>Kapcsolat</h1>
<hr class="my-4">

<?php if ($action == 'list'): ?>
<div class="container">
    <div class="row">
        <?php if (!empty($messages)): ?>
        <div class="col-sm-12">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">Név</th>
                    <th scope="col">E-mail cím</th>
                    <th scope="col">Üzenet</th>
                    <th scope="col">Dátum</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($messages as $message): ?>
                <tr>
                    <th><?php echo $message['fullname']; ?></th>
                    <td><?php echo $message['email']; ?></td>
                    <td><?php echo $message['message']; ?></td>
                    <td><?php echo $message['created']; ?></td>
                </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <?php else: ?>
        <div class="col-sm-12">
            <div class="alert alert-danger mt-3" role="alert">
                Jelenleg még egy üzenet sincs tárolva az adatbázisban.
            </div>
        </div>
        <?php endif; ?>
    </div>
    <div class="row">
        <div class="col-sm pt-3">
            <button type="button" class="btn btn-primary float-right" onclick="location.href='/?page=contact';">Vissza az űrlaphoz</button>
        </div>
    </div>
</div>
<?php else: ?>
<div class="container">
    <div class="row">
        <div class="col-sm">
            <form name="kapcsolat" action="contact.php" method="post">
                <fieldset>
                    <div class="form-group row">
                        <label for="name" class="col-sm-3 col-form-label">Az Ön neve</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="fullname" name="fullname" size="20" minlength="5" maxlength="20" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="email" class="col-sm-3 col-form-label">E-mail címe</label>
                        <div class="col-sm-9">
                            <input type="email" class="form-control" id="email" name="email" size="40" minlength="6" maxlength="40" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="message" class="col-sm-3 col-form-label">Üzenet szövege</label>
                        <div class="col-sm-9">
                            <textarea id="message" name="message" rows="6" required style="min-width: 100%; max-width: 100%;"></textarea>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary float-right">Küldés</button>
                </fieldset>
            </form>
        </div>
    </div>
    <div class="row">
        <div class="col-sm pt-3">
            <button type="button" class="btn btn-primary float-right" onclick="location.href='/?page=contact&action=list';">Korábbi üzenetek listázása</button>
        </div>
    </div>
</div>
<?php endif; ?>
