<?php 

session_start();

require_once '../controllers/name.php'

?>

<style>
    /* General form styling */
form {
  max-width: 400px;
  margin: 2rem 20px;
  padding: 2rem;
  background-color: #f9f9f9;
  border-radius: 12px;
  box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
  font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
}

/* Label styling */
label {
  display: block;
  margin-bottom: 0.5rem;
  font-weight: 600;
  color: #333;
}

label span {
  color: red;
  margin-left: 4px;
}

.error {
    color: red;
    margin-bottom: 10px;
}

/* Input styling */
input.name {
  width: 100%;
  padding: 0.75rem;
  font-size: 1rem;
  border: 1px solid #ccc;
  border-radius: 8px;
  margin-bottom: 1.5rem;
  box-sizing: border-box;
  transition: border-color 0.3s ease;
}

input.name:focus {
  border-color: #007BFF;
  outline: none;
}

/* Button styling */
button[type="submit"] {
  display: block;
  width: 100%;
  padding: 0.75rem;
  background-color: #007BFF;
  color: white;
  font-size: 1rem;
  font-weight: 600;
  border: none;
  border-radius: 8px;
  cursor: pointer;
  transition: background-color 0.3s ease;
}

button[type="submit"]:hover {
    background-color: #0056b3;
}

</style>

<form action="" method="post">
    <label for="name">Name<span>*</span></label>
    <input class="name" type="text" name="name" id="name" maxlength="50"/>
        <?php foreach($error_statement as $error): ?>
            <div class="error"><?=$error?></div>
        <?php endforeach; ?>
    <button type="submit">submit</button>
</form>

<?php if(!empty($_SESSION['success'])): ?>
    <p style="color:green;"><?= $_SESSION['success']?></p>
    <?php unset($_SESSION['success'])?>
<?php endif; ?>