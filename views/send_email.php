<h1>Contactez-nous</h1>
<div class="form-group">
    <?php include './views/msg_error_success.php' ?>
</div>
<form action="./controllers/send_email.php" method="post">
    <label for="name">Nom :</label>
    <input type="text" id="name" name="name"><br>
    <label for="email">Adresse e-mail :</label>
    <input type="email" id="email" name="email"><br>
    <label for="message">Message :</label>
    <textarea id="message" name="message"></textarea><br>
    <input type="submit" value="Envoyer">
</form>