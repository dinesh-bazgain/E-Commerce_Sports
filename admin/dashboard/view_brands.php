<style>
    table {
        margin: 0 auto;
        border: 2px solid black;
        border-collapse: collapse;
    }

    th,
    td {
        border: 2px solid black;
        padding: 10px;
    }

    th {
        background-color: #f0f0f0;
    }
</style>

<h3 style="text-align: center;">ALL BRANDS</h3>
<table>
    <thead>
        <tr>
            <th>S.N</th>
            <th>Brand Name</th>

            <th>Delete</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $select_brand = "select * from `brands`";
        $result = mysqli_query($con, $select_brand);
        $number = 0;
        while ($row = mysqli_fetch_assoc($result)) {
            $brand_id = $row['brand_id'];
            $brand_name = $row['brand_name'];
            $number++;
            ?>
            <tr>
                <td><?php echo $number; ?></td>
                <td><?php echo $brand_name; ?></td>

                <td><a href='dashboard.php?delete_brand=<?php echo $brand_id; ?>'><i class='fa-solid fa-trash'></i></a></td>
            </tr>
        <?php } ?>
    </tbody>
</table>