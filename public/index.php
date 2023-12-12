<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
    .error {color: #FF0000;}
    </style>
</head>
<body>
<?php
$code = $user_name = $first_name = $last_name = $email = $date_of_birth = $gender = $hobbies = "";
$code_err = $user_name_err = $first_name_err = $last_name_err = $email_err = $date_of_birth_err = $gender_err = $hobbies_err = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["code"])) {
        $code_err = "Code is required";
    } else {
        $name = test_input($_POST["name"]);
    }


}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
        <label for="code">Code</label>
        <input type="text" name="code" id="">
        <span class="error">* <?php echo $code_err;?></span>
        <br><br>
        <label for="code">User Name</label>
        <input type="text" name="user_name" id="">
        <span class="error">* <?php echo $user_name_err;?></span>
        <br><br>
        <label for="code">First Name</label>
        <input type="text" name="first_name" id="">
        <span class="error">* <?php echo $user_name_err;?></span>
        <br><br>
        <label for="code">Last Name</label>
        <input type="text" name="last_name" id="">
        <span class="error">* <?php echo $user_name_err;?></span>
        <br><br>
        <label for="code">Email</label>
        <input type="email" name="email" id="">
        <span class="error">* <?php echo $user_name_err;?></span>
        <br><br>
        <label for="code">Date Of Birth</label>
        <input type="date" name="date_of_birth" id="">
        <span class="error">* <?php echo $user_name_err;?></span>
        <br><br>
        Gender:
        <input type="radio" name="gender" value="female">Female
        <input type="radio" name="gender" value="male">Male
        <input type="radio" name="gender" value="other">Other
        <br><br>
        <label for="hobby">Hobby</label>
        <select name="hobbies" id="hobby" multiple>
        </select> 
        <button type="button" id="add_hobby">New Hobby</button>
        <br><br>
        <div id="add_new" style="display: none;">
            <label for="code">Add Hobyy</label>
            <input type="text" name="new_hobby" id="hobby_value">
            <button type="button" id="create_hobby">Add Hobby</button>
            <br><br>
        </div>
        <input type="submit" name="submit" value="Submit">
    </form>
</body>
<script>
    var hobbies = ['game', 'football', 'golf'];
    function createNewOption(value) {
        var select = document.getElementById('hobby');
        var element = document.createElement('option');
        element.textContent = value;
        element.value = value;
        select.appendChild(element);
    }
    function showHobby() {
        for (var i = 0; i < hobbies.length; i++) {
            createNewOption(hobbies[i]);
        }
    }
    this.showHobby();

    var add_hobby = document.getElementById('add_hobby');
    add_hobby.addEventListener('click', function (e) {
        var new_hobby = document.getElementById('add_new');
        if(new_hobby.style.display === "none") {
            document.getElementById('add_new').style.display = "block";
        }
        else {
            document.getElementById('add_new').style.display = "none";
        }
    });
    var create_hobby = document.getElementById('create_hobby');
    create_hobby.addEventListener('click', function (e) {
        var value = document.getElementById('hobby_value').value;
        createNewOption(value);
    });
</script>
</html>