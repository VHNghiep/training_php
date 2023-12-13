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
$code = $user_name = $first_name = $last_name = $email = $date_of_birth = $gender = $hobby = "";
$code_err = $user_name_err = $first_name_err = $last_name_err = $email_err = $date_of_birth_err = $gender_err = $hobby_err = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["code"])) {
        $code_err = "Code is required";
    } else {
        $code = test_input($_POST["code"]);
        if (!preg_match("/^THOR000[a-z][0->9]{1,7}+$/", $code)) {
            $code_err = "THOR000 + a->z có 1 ký tự + number có 1->9 ký tự. Max 15 ký tự";
        }
    }

    if (empty($_POST["user_name"])) {
        $user_name_err = "User name is required";
    } else {
        $user_name = test_input($_POST["user_name"]);
        if (!preg_match("/^[^\s\d]{1,20}$/", $user_name)) {
            $user_name_err = "Không được chứa khoảng trắng, không có chữ số, tối đa 20 ký tự";
        }
    }

    if (empty($_POST["first_name"])) {
        $first_name_err = "First name is required";
    } else {
        $first_name = test_input($_POST["first_name"]);
        if (!preg_match("/^[^\d]{1,255}$/", $first_name)) {
            $first_name_err = "Không có chữ số, max 255, min 1";
        }
    }

    if (empty($_POST["last_name"])) {
        $last_name_err = "Last name is required";
    } else {
        $last_name = test_input($_POST["last_name"]);
        if (!preg_match("/^[^\d]{1,255}$/", $last_name)) {
            $last_name_err = "Không có chữ số, max 255, min 1";
        }
    }

    if (empty($_POST["email"])) {
        $email_err = "Email is required";
    } else {
        $email = test_input($_POST["email"]);
        if (!preg_match("/^\S+@\S+\.\S+$/", $email)) {
            $email_err = "Phải là định dạng email";
        }
    }

    if (empty($_POST["date_of_birth"])) {
        $date_of_birth_err = "Date of birth is required";
    } else {
        $date_of_birth = test_input($_POST["date_of_birth"]);
        if (!preg_match("/^(0?[1-9]|[12][0-9]|3[01])[\/\-](0?[1-9]|1[012])[\/\-]\d{4}$/", $date_of_birth)) {
            $date_of_birth_err = "Phải là định dạng dd/mm/yyyy";
        }
    }

    if (empty($_POST["gender"])) {
        $gender_err = "Gender is required";
    }

}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>
    <form action="" method="post">
        <label>Code</label>
        <input type="text" name="code" id="">
        <span class="error">* <?php echo $code_err;?></span>
        <br><br>
        <label>User Name</label>
        <input type="text" name="user_name" id="">
        <span class="error">* <?php echo $user_name_err;?></span>
        <br><br>
        <label>First Name</label>
        <input type="text" name="first_name" id="">
        <span class="error">* <?php echo $first_name_err;?></span>
        <br><br>
        <label">Last Name</label>
        <input type="text" name="last_name" id="">
        <span class="error">* <?php echo $last_name_err;?></span>
        <br><br>
        <label>Email</label>
        <input type="text" name="email" id="">
        <span class="error">* <?php echo $email_err;?></span>
        <br><br>
        <label>Date Of Birth</label>
        <input type="text" name="date_of_birth" id="">
        <span class="error">* <?php echo $date_of_birth_err;?></span>
        <br><br>
        Gender:
        <input type="radio" name="gender" value="female">Female
        <input type="radio" name="gender" value="male">Male
        <input type="radio" name="gender" value="other">Other
        <span class="error">* <?php echo $gender_err;?></span>
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
            <span class="error">* <span id="hobby_err"></span></span>
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
        if (value != '') {
            document.getElementById("hobby_err").innerHTML = "";
            createNewOption(value);
        } else {
            document.getElementById("hobby_err").innerHTML = "Hobby không được để trống";
        }
    });
</script>
</html>