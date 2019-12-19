<div class="card">
    <div class="header">
        <h4 class="title">Manage Restaurants</h4>
        <p class="category">Manage all restaurants.</p>
    </div>
    <form action="manageRestaurant.php" method="post">
        <input name="add" class="btn btn-light pull-right" type="submit" value="Add Restaurant">
    </form>
    <form action="" method="post">
        <input name="filter" class="btn btn-light pull-right" type="submit" value="Search">
    </form>

    <div class="content table-responsive table-full-width">
        <table class="table table-hover table-striped">
            <thead>
            <th>ID</th>
            <th>Name</th>
            <th>Number of Branches</th>
            <th>Status</th>
            <th>Delivery Fee</th>
            <th>Manager ID</th>
            <th>Update</th>
            <th>Delete</th>
            </thead>
            <tbody>
            <?php
            include_once '../BusinessLogic/Restaurant.php';
            $restaurant = new Restaurant();
            $restaurants = $restaurant->getAllRestaurants();

            foreach ($restaurants as $restaurant) {
                echo '<form action="manageRestaurant.php" method="post"><tr><input hidden name="ID" value="' . $restaurant['ID'] . '"><td>' . $restaurant['ID'] . '</td>';
                echo '<input hidden name="Name" value="' . $restaurant['Name'] . '"><td>' . $restaurant['Name'] . '</td>';
                echo '<input hidden name="NumberOfBranches" value="' . $restaurant['Branch_Numbers'] . '"><td>' . $restaurant['Branch_Numbers'] . '</td>';
                echo '<input hidden name="Status" value="' . $restaurant['Status'] . '"><td>' . $restaurant['Status'] . '</td>';
                echo '<input hidden name="DeliveryFee" value="' . $restaurant['Delivery_Fee'] . '"><td>' . $restaurant['Delivery_Fee'] . '</td>';
                echo '<input hidden name="Manager" value="' . $restaurant['Manager_ID'] . '"><td>' . $restaurant['Manager_ID'] . '</td>';
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
