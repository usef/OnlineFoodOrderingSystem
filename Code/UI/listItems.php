<div class="card">
    <div class="header">
        <h4 class="title">Manage Items</h4>
        <p class="category">Manage all items.</p>
    </div>
    <form action="manageItem.php" method="post">
        <input name="add" class="btn btn-light pull-right" type="submit" value="Add Item">
    </form>

    <div class="content table-responsive table-full-width">
        <table class="table table-hover table-striped">
            <thead>
            <th>ID</th>
            <th>Name</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Description</th>
            <th>Category</th>
            <th>Restaurant Name</th>
            <th>Active</th>
            <th>Image</th>
            <th>Update</th>
            <th>Delete</th>
            </thead>
            <tbody>
            <?php
            include_once '../BusinessLogic/Item.php';
            $item = new Item();
            $items = $item->getItems();


            foreach ($items as $item) {
                if ($item['Active'] == 1) {
                    $active = "Yes";
                } else {
                    $active = "No";
                }
                echo '<form action="manageItem.php" method="post"><tr><input hidden name="ID" value="' . $item['ID'] . '"><td>' . $item['ID'] . '</td>';
                echo '<input hidden name="Name" value="' . $item['Name'] . '"><td>' . $item['Name'] . '</td>';
                echo '<input hidden name="Price" value="' . $item['Price'] . '"><td>' . $item['Price'] . '</td>';
                echo '<input hidden name="Quantity" value="' . $item['Quantity'] . '"><td>' . $item['Quantity'] . '</td>';
                echo '<input hidden name="Description" value="' . $item['Description'] . '"><td>' . $item['Description'] . '</td>';
                echo '<input hidden name="CategoryID" value="' . $item['Category_ID'] . '"><td>' . $item['Category'] . '</td>';
                echo '<input hidden name="RestaurantID" value="' . $item['Restaurant_ID'] . '"><td>' . $item['Restaurant'] . '</td>';
                echo '<input hidden name="Active" value="' . $item['Active'] . '"><td>' . $active . '</td>';
                echo '<input hidden name="ImageURL" value="' . $item['Image_URL'] . '"><td>' . $item['Image_URL'] . '</td>';
                echo '<td><button type="submit" name="update" class="btn btn-success">Update</button></td>';
                echo '<td><button type="submit" name="delete" class="btn btn-warning">Delete</button></td></tr></form>';
            }
            ?>
            </tbody>
        </table>

    </div>
</div>
</div>
</div>
</div>
</div>
