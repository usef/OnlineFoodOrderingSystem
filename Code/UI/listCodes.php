<div class="card">
    <div class="header">
        <h4 class="title">Manage Promocodes</h4>
        <p class="category">Manage all promocodes.</p>
    </div>
    <form action="manageCode.php" method="post">
        <input name="add" class="btn btn-light pull-right" type="submit" value="Add Code">
    </form>
    <form action="" method="post">
        <input name="filter" class="btn btn-light pull-right" type="submit" value="Search">
    </form>

    <div class="content table-responsive table-full-width">
        <table class="table table-hover table-striped">
            <thead>
            <th>Code</th>
            <th>Value</th>
            <th>Active Date</th>
            <th>Expiry Date</th>
            <th>Uses Allowed</th>
            <th>Status</th>
            <th>Update</th>
            <th>Delete</th>
            </thead>
            <tbody>
            <?php
            include_once '../BusinessLogic/PromoCode.php';
            $code = new PromoCode();
            $codes = $code->getCodes();


            foreach ($codes as $code) {
                if ($code['Status'] == 1) {
                    $status = "ON";
                } else {
                    $status = "OFF";
                }
                echo '<form action="manageCode.php" method="post"><tr><input hidden name="Code" value="' . $code['Code'] . '"><td>' . $code['Code'] . '</td>';
                echo '<input hidden name="Value" value="' . $code['Value'] . '"><td>' . $code['Value'] . '</td>';
                echo '<input hidden name="ActiveDate" value="' . $code['Active_Date'] . '"><td>' . $code['Active_Date'] . '</td>';
                echo '<input hidden name="ExpiryDate" value="' . $code['Expiry_Date'] . '"><td>' . $code['Expiry_Date'] . '</td>';
                echo '<input hidden name="UsesAllowed" value="' . $code['Uses_Allowed'] . '"><td>' . $code['Uses_Allowed'] . '</td>';
                echo '<input hidden name="Status" value="' . $code['Status'] . '"><td>' . $status . '</td>';
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
