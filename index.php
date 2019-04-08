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
                   value=' .$_POST["name"]. '>
        </label>
        <p>Cupcake Flavors: </p><ul>';

    $flavors = array(
        'grasshopper' => 'The_Grasshopper', 'maple' => 'Whiskey_Maple_Bacon',
        'carrot' => 'Carrot_Walnut', 'caramel' => 'Salted_Caramel_Cupcake',
        'velvet' => 'Red_Velvet', 'lemon' => 'Lemon_Drop',
        'tiramisu' => 'Tiramisu');

    //track the checked flavors
    $checked_flavors = '';

    //create sticky checkboxes
    foreach ($flavors as $id => $name)
    {
        if($_POST[$name]=="on")
        {
            $checked = "checked"; // if box is checked, set $checked to "checked"
            $checked_flavors[] = $name; //add the flavor to the checked flavors array
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

    //check for form submission
    if ($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        if (empty($_POST['name'])) //if no name is entered
        {
            echo '<p>You must enter your name.';
        }
        else //check if flavors selected
        {
            if (empty($checked_flavors)) //if no flavors selected
            {
                echo '<p>You must select at least one flavor.</p>';
            }
            else //display the order information
            {
                echo "<p>Thank you, " . $_POST['name'] . ', for your order!</p>';

                echo 'Order summary <ul>';
                foreach ($flavors as $id => $name)
                {
                    if (isset($_POST[$name]) == "on" || isset($_POST[$name]) == 1)
                    {
                        echo "<li>$name</li>";
                    }
                }
                echo '</ul>';

                //Display order total
                $total = count($checked_flavors) * 3.50;

                echo 'Order total: $' . number_format($total, 2);
            }
        }

    }
    ?>

</body>
</html>