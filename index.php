<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cupcakes</title>
</head>
<body>
    <h1>Cupcake Fundraiser</h1>

    <?php
    //for testing purposes: displays the checked items
    var_dump($_POST);

    //begin the body's form
    $output = '';
    $output .= '<form method="post" action=" '.$_SERVER['php_self'].'">
        <label for="name">Your name:
            <input name="name" id="name" type="text" placeholder="Please input your name"
                   value=' .$_POST["name"]. ' required>
        </label>
        <p>Cupcake Flavors: </p><ul>';

    $flavors = array(
        'grasshopper' => 'The_Grasshopper', 'maple' => 'Whiskey_Maple_Bacon',
        'carrot' => 'Carrot_Walnut', 'caramel' => 'Salted_Caramel_Cupcake',
        'velvet' => 'Red_Velvet', 'lemon' => 'Lemon_Drop',
        'tiramisu' => 'Tiramisu');
    foreach ($flavors as $id => $name)
    {
        if($_POST[$name]=="on")
        {
            $checked = "checked"; // if box is checked, set $checked to "checked"
        }
        else
        {
            unset($checked); // if box is unchecked, set $checked to null.
        }

        //save the li element's display name
        $selection = $name;
        //create the li element's checkbox input
        $output .=  "<li><input type = 'checkbox' $checked name=$name id=$id>";
        //add a label for the input
        $output .= "<label for=$id>$selection</label></li>";
    }

    // end the ul element, create a submit button, and end the form
    $output .=  '</ul><input type="submit" name="Submit" value="Order"></form>';
    echo $output;
    ?>

    <?php
    //check for form submission
    if ($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        if (empty($_POST['flavors']))
        {
            echo '<p>You must select at least one flavor.</p>';
        }
        else
        {
            echo "<p>Thank you, " . $_POST['name'] . ', for your order!</p>';

            echo 'Order summary <ul>';
            foreach ($_POST['flavors'] as $flavor)
            {
                if (isset($flavor) == 1)
                {
                    echo "<li>$flavor</li>";
                }
            }
            echo '</ul>';
        }
    }

    ?>

</body>
</html>