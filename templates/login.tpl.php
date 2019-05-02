<h1>Belépés - vagy regisztráció</h1>
<hr class="my-4">
<div class="container">
    <div class="row">
        <div class="col-sm">
            <p>Ha Ön már regisztrált felhasználó, akkor az alábbi űrlap kitöltésével és beküldésével <strong>beléphet</strong> a weboldal jelszóval védett részére.</p>
            <form action="/login.php" method="post">
                <fieldset>
                    <div class="form-group row">
                        <label for="lusername" class="col-sm-3 col-form-label">Felhasználónév</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="lusername" name="username" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="luserpass" class="col-sm-3 col-form-label">Jelszó</label>
                        <div class="col-sm-9">
                            <input type="password" class="form-control" id="luserpass" name="userpass" required>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary float-right">Küldés</button>
                </fieldset>
            </form>
        </div>
        <div class="col-sm">
            <p>Ha Ön még nem regisztrált oldalunkon, akkor az alábbi űrlap kitöltésével és beküldésével <strong>regisztrálhat</strong>.</p>
            <form action="/registration.php" method="post">
                <fieldset>
                    <div class="form-group row">
                        <label for="lastname" class="col-sm-3 col-form-label">Vezetéknév</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="lastname" name="lastname" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="firstname" class="col-sm-3 col-form-label">Keresztnév</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="firstname" name="firstname" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="rusername" class="col-sm-3 col-form-label">Felhasználónév</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="rusername" name="username" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="ruserpass" class="col-sm-3 col-form-label">Jelszó</label>
                        <div class="col-sm-9">
                            <input type="password" class="form-control" id="ruserpass" name="userpass" required>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary float-right">Küldés</button>
                </fieldset>
            </form>
        </div>
    </div>
</div>
