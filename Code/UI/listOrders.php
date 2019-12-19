<div class="card">
    <div class="header">
        <h4 class="title">Manage Orders</h4>
        <p class="category">Manage all orders.</p>
    </div>
    <form action="" method="post">

        <input name="filter" class="btn btn-light pull-right" type="submit" value="Search">
    </form>

    <div class="content table-responsive table-full-width">
        <table class="table table-hover table-striped">
            <thead>
            <th>ID</th>
            <th>Customer ID</th>
            <th>Order Date & Time</th>
            <th>Delivery Date & Time</th>
            <th>Status</th>
            <th>Total Price</th>
            <th>Delivery Man ID</th>
            <th>Promocode</th>
            <th>Payment Method</th>
            <th>Delete</th>
            </thead>
            <tbody>
            <?php
            include_once '../BusinessLogic/Order.php';
            $order = new Order();
            $orders = $order->getOrders();

            foreach ($orders as $order) {
                echo '<form action="manageOrder.php" method="post"><tr><input hidden name="ID" value="' . $order['ID'] . '"><td>' . $order['ID'] . '</td>';
                echo '<input hidden name="CustomerID" value="' . $order['Customer_ID'] . '"><td>' . $order['Customer_ID'] . '</td>';
                echo '<input hidden name="OrderDate" value="' . $order['Order_DateTime'] . '"><td>' . $order['Order_DateTime'] . '</td>';
                echo '<input hidden name="DeliveryDate" value="' . $order['Delivery_DateTime'] . '"><td>' . $order['Delivery_DateTime'] . '</td>';
                echo '<input hidden name="Status" value="' . $order['Status'] . '"><td>' . $order['Status'] . '</td>';
                echo '<input hidden name="Total Price" value="' . $order['Total_Price'] . '"><td>' . $order['Total_Price'] . '</td>';
                echo '<input hidden name="DeliveryManID" value="' . $order['Delivery_Man_ID'] . '"><td>' . $order['Delivery_Man_ID'] . '</td>';
                echo '<input hidden name="Promocode" value="' . $order['Promocode'] . '"><td>' . $order['Promocode'] . '</td>';
                echo '<input hidden name="PaymentMethod" value="' . $order['Payment_Method_ID'] . '"><td>' . $order['Payment_Method'] . '</td>';
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
