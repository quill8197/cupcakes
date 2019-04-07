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

    <form>
        <div>
            <label for="name">Your name:
                <input id="name" type="text" placeholder="Please input your name">
            </label>
        </div>

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

        <button type="submit">Order</button>
    </form>

</body>
</html>