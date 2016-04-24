<div>
    <form method="post">
        <label>Please provide a password:</label>
        <br />
        <input type="text" name="pass" required/>
        <br />
        <input type="submit" value="Submit" name="submit">
    </form>
</div>
<br />

<?
    if (isset($_POST['submit'])) {
        echo "The hashed password is: <br />";
        echo password_hash($_POST['pass'], PASSWORD_DEFAULT, array('cost' => 13));   
    }

?>
