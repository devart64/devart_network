<?php
/**
 * Created by PhpStorm.
 * User: steph
 * Date: 28/10/2017
 * Time: 11:34
 */

$title = 'Inscription';
include'partials/_header.php'; ?>

    <main role="main" class="container">
        <h1 class="text-center" style="color: #007bff;">Devenez dès à présent membre!</h1><br />
        <form method="post" class="jumbotron col-md-6 offset-3">
            <!-- Name field -->
            <div class="form-group">
                <label class="control-label" for="name">Nom: </label>
                <input type="text" class="form-control" id="name" name="name" required="required"/>
            </div>
            <!-- Pseudo field -->
            <div class="form-group">
                <label class="control-label" for="pseudo">Pseudo: </label>
                <input type="text" class="form-control" id="pseudo" name="pseudo" required="required"/>
            </div>
            <!-- Email field -->
            <div class="form-group">
                <label class="control-label" for="email">Adresse Email: </label>
                <input type="email" class="form-control" id="Email" name="Email" required="required"/>
            </div>
            <!-- Password field -->
            <div class="form-group">
                <label class="control-label" for="password">Mot de passe: </label>
                <input type="password" class="form-control" id="password" name="password" required="required"/>
            </div>
            <!-- Password confirmation field -->
            <div class="form-group">
                <label class="control-label" for="passwordconfirmation">Confirmer votre mot de passe: </label>
                <input type="password" class="form-control" id="passwordconfirmation" name="passwordconfirmation" required="required"/>
            </div>
            <input type="submit" class="btn btn-primary" value="Inscription" name="register"/>
        </form>
    </main><!-- /.container -->

<?php include 'partials/_footer.php'; ?>