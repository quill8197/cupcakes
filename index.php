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

    <form action="index.php" method="post">
        <div>
            <label for="name">Your name:
                <input name="name" id="name" type="text" placeholder="Please input your name"
                       value="<?php echo $_POST['name']; ?>" required>
            </label>
        </div>

        <?php
        $flavor_names = array("The_Grasshopper","Whiskey_Maple_Bacon","Carrot_Walnut",
            "Salted_Caramel_Cupcake","Red_Velvet", "Lemon_Drop", "Tiramisu"); // Array with check box names. Five items = five check boxes.
        $flavor_ids = array('grasshopper', 'maple', 'carrot',
            'caramel', 'velvet', 'lemon', 'tiramisu');

        var_dump($_POST); // Here so that you can see the POST values, which depend on what is checked. Items unchecked will not be in POST.

        $output = '';
        $output .= '<form method="post" action=" '.$_SERVER['php_self'].'">
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

            $selection = $name; // The text that the user sees can be anything. Here were using the checkbox name so that you can see that it matches up.
	        $output .=  "<li><input type = 'checkbox' $checked name=$name id=$id>$selection</li>"; // Having set the variables, we set the checkbox html.

	    } // This is the end of the loop. We either start over on the next box, or after the last one, we proceed to the submit button.

        $output .=  '</ul><input type="submit" name="Submit" value="Order"></form><br>'; // This sets up the submit button.
        echo $output;
        ?>

        <?php/*
        // Array with check box names.
        $flavor_values = array("The_Grasshopper", "Whiskey_Maple_Bacon", "Carrot_Walnut",
            "Salted_Caramel_Cupcake", "Red_Velvet", "Lemon_Drop", "Tiramisu");
        $flavor_ids = array('grasshopper', 'maple', 'carrot',
            'caramel', 'velvet', 'lemon', 'tiramisu');

        var_dump($_POST);

        $output = '';
        $output .= '<form method="post" action=" '.$_SERVER['php_self'].'">';

        // set flavor values and check the previously checked checkboxes
        foreach ($flavor_values as $flavor_value)
        {
            if($_POST[$flavor_value]=="on")
            {
                $checked = "checked"; // if box is checked, set $checked to "checked"
            }
            else
            {
                unset($checked); // if box is unchecked, set $checked to null.
            }

            // Checkbox value/name
            $selection = $flavor_value;

            // This is the end of the loop. We either start over on the next box, or
            // after the last one, we proceed to the submit button.
            // Having set the variables, we set the checkbox html.
            $output .=  "<input type = 'checkbox' ".$checked." name= ".$checkbox." >".$selection."<br>"; // Having set the variables, we set the checkbox html.
        }

        // This sets up the submit button.
        $output .=  '<input type="submit" name="Submit" value="Click here to order"></form><br>';
        echo $output;
        */?>

        <!--
        <div>
            Cupcake flavors:
            <ul>
                <li>
                    <input type="checkbox" name="flavors[]" id="grasshopper" value="The Grasshopper">
                    <label for="grasshopper">The Grasshopper</label>
                </li>
                <li>
                    <input type="checkbox" name="flavors[]" id="maple" value="Whiskey Maple Bacon">
                    <label for="maple">Whiskey Maple Bacon</label>
                </li>
                <li>
                    <input type="checkbox" name="flavors[]" id="carrot" value="Carrot Walnut">
                    <label for="carrot">Carrot Walnut</label>
                </li>
                <li>
                    <input type="checkbox" name="flavors[]" id="caramel" value="Salted Caramel Cupcake">
                    <label for="caramel">Salted Caramel Cupcake</label>
                </li>
                <li>
                    <input type="checkbox" name="flavors[]" id="velvet" value="Red Velvet">
                    <label for="velvet">Red Velvet</label>
                </li>
                <li>
                    <input type="checkbox" name="flavors[]" id="lemon" value="Lemon Drop">
                    <label for="lemon">Lemon Drop</label>
                </li>
                <li>
                    <input type="checkbox" name="flavors[]" id="tiramisu" value="Tiramisu">
                    <label for="tiramisu">Tiramisu</label>
                </li>
            </ul>
        </div>


        <button type="submit">Order</button>-->
    </form>

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