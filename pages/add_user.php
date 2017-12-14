<div class="container theme-showcase" role="main">
    <br>
    <div class="page-header">
        <h1>Ajouter utilisateur</h1>
    </div>
    <div class="row">
        <div class="col-md-6">
        <form action="log.php?action=add" method="post" role="form">
            <div class="form-group">
                <label for="nom">Nom</label>
                <input type="text" id="nom" name="firstname" class="form-control" placeholder="Nom">
            </div>
            <div class="form-group">
                <label for="prenom">Prenom</label>
                <input type="text" id="prenom" name="lastname" class="form-control" placeholder="Prenom">
            </div>
            <div class="form-group">
                <label for="e-mail">E-mail</label>
                <input type="email" id="e-mail" name="email" class="form-control" placeholder="E-mail">
            </div>
            <div class="form-group">
                <label for="ipaswd">Mot de passe</label>
                <input type="password" id="ipaswd" name="password" class="form-control" placeholder="Mot de passe">
            </div>
            <button type="submit" class="btn btn-success">Envoyer</button>
            <a class="btn btn-primary" href="index.php">Annuler</a>
        </form>
        </div>
    </div>
</div>
