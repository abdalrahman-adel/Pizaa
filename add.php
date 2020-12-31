<?php  

$errors=array("email"=>"", "title"=>"", "ingredients"=>"");

$email = $title = $ingredients ='';

if(isset($_POST["submit"])){

    // check email
		if(empty($_POST['email'])){
			$errors["email"] =  "An email is required <br />";
		} else{
			$email = $_POST['email'];
			if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
			$errors["email"] = "Email must be a valid email address";
			
		}
    }
    // title check
    if(empty($_POST["title"])){
        $errors["title"] = "A Title is Required!!" . "<br>";
    }else{
        $title = $_POST["title"];
        if(!preg_match("/^[a-zA-Z-' ]*$/",$title)){
            $errors["title"] ="title must be letters and spaces only";
        }
    }
    // ingredients check
    if(empty($_POST["ingredients"])){
        $errors["ingredients"] = "ingredients are Required!!" . "<br>";
    }else{
        $ingredients = $_POST['ingredients'];
        if(!preg_match("/^[a-zA-Z-' ]*$/", $ingredients)){
            $errors["ingredients"] = 'Ingredients must be a comma separated list';
        }

    }

    if(!array_filter($errors)){
      
        header("location: index.php");
    }

} // end of post check
?>

<!DOCTYPE html>
<html lang="en">

<?php include("header.php"); ?>
<section class="container">

<h4 class="center"> Add New Pizaa</h4>
<form id="form" action="add.php" method="POST" >
    <label for="email">Email</label>
    <input type="text" name="email" value=" <?php echo htmlspecialchars($email); ?> " >
    <div class="red-text"><?php echo $errors['email']; ?></div>
    <label for="title">Title</label>
    <input type="text" name="title" value=" <?php echo htmlspecialchars($title); ?> ">
    <div class="red-text"><?php echo $errors['title']; ?></div>
    <label for="ingredients">Ingredients ( comma separated )</label>
    <input type="text" name="ingredients" value=" <?php echo htmlspecialchars($ingredients); ?> ">
    <div class="red-text"><?php echo $errors['ingredients']; ?></div>
    <div class="center">
        <input type="submit" name="submit" value="Submit" class="btn brand z-depth-0">
    </div>
</form>
</section>

<?php include("footer.php"); ?>


</html>