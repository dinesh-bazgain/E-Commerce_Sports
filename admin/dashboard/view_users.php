<!DOCTYPE html>
<html>

<head>
    <title>User List</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
        }

        table {
            border-collapse: collapse;
            width: 60%;
            /* Adjust width as needed */
            margin: 50px auto;
            /* Center the table */
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #ddd;
        }

        .delete-btn {
            background-color: #ff4d4d;
            color: white;
            padding: 5px 10px;
            border: none;
            border-radius: 5px;
            text-decoration: none;
        }

        .delete-btn:hover {
            background-color: #cc0000;
        }

        .fa-trash-button {
            color: red;
        }
    </style>
</head>

<body>
    <h1>User List</h1>
    <table>
        <thead>
            <tr>
                <th>S.No</th>
                <th>User ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $get = "SELECT * FROM `register`";
            $result = mysqli_query($con, $get);
            $row_count = mysqli_num_rows($result);

            if ($row_count == 0) {
                echo "<h3>No users Registered yet</h3>";
            } else {
                $number = 0;
                while ($row_data = mysqli_fetch_assoc($result)) {
                    $user_id = $row_data['user_id'];
                    $firstname = $row_data['firstname'];
                    $lastname = $row_data['lastname'];
                    $email = $row_data['email'];
                    $number++;
                    ?>
                    <tr>
                        <td><?php echo $number; ?></td>
                        <td><?php echo $user_id; ?></td>
                        <td><?php echo $firstname; ?></td>
                        <td><?php echo $lastname; ?></td>
                        <td><?php echo $email; ?></td>
                        <td><a href='dashboard.php?delete_users=<?php echo $user_id ?>'><i
                                    class='fa-solid fa-trash fa-trash-button'></i></a>
                        </td>

                    </tr>
                    <?php
                }
            }
            ?>
        </tbody>

    </table>
</body>

</html>