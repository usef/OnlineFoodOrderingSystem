<div class="card">
    <div class="header">
        <h4 class="title">Manage Categories</h4>
        <p class="category">Manage all categories.</p>
    </div>
    <form action="manageCategory.php" method="post">
        <input name="add" class="btn btn-light pull-right" type="submit" value="Add Category">
    </form>
    <!--    <form action="" method="post">-->
    <!--        <input name="add" class="btn btn-light pull-right" type="submit" value="Add Restaurant">-->
    <!--        <input name="filter" class="btn btn-light pull-right" type="submit" value="Search">-->
    <!--    </form>-->

    <div class="content table-responsive table-full-width">
        <table class="table table-hover table-striped">
            <thead>
            <th>ID</th>
            <th>Name</th>
            <th>Update</th>
            <th>Delete</th>
            </thead>
            <tbody>
            <?php
            include_once '../BusinessLogic/Category.php';
            $category = new Category();
            $categories = $category->getCategories();

            foreach ($categories as $category) {
                echo '<form action="manageCategory.php" method="post"><tr><input hidden name="ID" value="' . $category['ID'] . '"><td>' . $category['ID'] . '</td>';
                echo '<input hidden name="Name" value="' . $category['Name'] . '"><td>' . $category['Name'] . '</td>';
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
