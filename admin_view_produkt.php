<?php
session_start(); 
error_reporting(0); 

if (!isset($_SESSION['username'])) {
    header("location:login.php");
    exit();
} elseif ($_SESSION['usertype'] == 'client') {
    header("location:login.php");
    exit();
}

require 'data_check.php';



// Fshirja e produktit
if (isset($_GET['products_id'])) { 
    $p_id = $_GET['products_id']; 
    $sql_delete = "DELETE FROM products WHERE id='$p_id'"; 
    $result_delete = mysqli_query($data, $sql_delete);

    if ($result_delete) {
        header('location:admin_view_produkt.php'); 
        exit();
    } else {
        echo "Something went wrong!";
    }
}


$sql = "SELECT * FROM products";
$result = mysqli_query($data, $sql);

?>



<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Admin Dashboard</title>

    <?php
    
    include 'admin_css.php';
    
    ?>

    <style type="text/css">

.table_th {
    padding: 12px 10px;
    font-size: 16px;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    background-color: rgba(105, 74, 42, 0.8);
    color: white;
    text-align: center;
    border-radius: 8px;
    box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
}


.table_td {
    padding: 12px 10px;
    background-color: #D7BDA6; 
    color: black;
    text-align: center;
    font-size: 14px;
    font-family: Arial, sans-serif;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}


.table tr {
    border-radius: 10px;
    margin-bottom: 10px;
    overflow: hidden;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.table tr:hover {
    transform: scale(1.02);
    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
}


table {
    border-collapse: separate;
    border-spacing: 0 10px;
    width: 85%;
    margin: 20px auto;
    background-color: white;
    border-radius: 10px;
    overflow: hidden;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

img {
    border-radius: 8px;
    object-fit: cover;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease;
}

img:hover {
    transform: scale(1.05);
}


.btn-danger, .btn-primary {
    padding: 10px 20px;
    border: none;
    border-radius: 8px;
    font-size: 14px;
    font-weight: bold;
    text-decoration: none;
    cursor: pointer;
    transition: all 0.3s ease;
}

.btn-danger {
    background-color: #e74c3c;
    color: white;
}

.btn-danger:hover {
    background-color: #c0392b;
    transform: scale(1.05);
    box-shadow: 0 4px 12px rgba(0,0,0,0.2);
}

.btn-primary {
    background-color: rgb(93, 82, 54); 
    color: white;
}

.btn-primary:hover {
    background-color: antiquewhite;
    color: black;
    transform: scale(1.05);
    box-shadow: 0 4px 12px rgba(0,0,0,0.2);
}


@media (max-width: 768px) {
    table {
        width: 95%;
    }
    .table_th {
        font-size: 14px;
        padding: 8px;
    }
    .table_td {
        font-size: 12px;
        padding: 6px;
    }
    .btn-danger, .btn-primary {
        padding: 6px 12px;
        font-size: 12px;
    }
    img {
        width: 60px;
        height: 60px;
    }
}

@media (max-width: 480px) {
    .table_th {
        font-size: 12px;
        padding: 6px;
    }
    .table_td {
        font-size: 10px;
        padding: 4px;
    }
    .btn-danger, .btn-primary {
        padding: 4px 8px;
        font-size: 10px;
    }
    img {
        width: 50px;
        height: 50px;
    }
}

        @media screen and (max-width: 480px) {
            .table_th, .table_td {
                padding: 8px;
                font-size: 12px;
            }

            img {
                width: 60px;
                height: 60px;
            }
        }



    </style>

</head>

<?php include 'admin_sidebar.php'; ?>

<div class="content">

    <center>
        <h2><span><b>View All Product Data</b></span></h2>

        <table border="1px">
            <tr>
                <th class="table_th">Product</th>
                <th class="table_th">Brand</th>
                <th class="table_th">Description</th>
                <th class="table_th">Price</th>

                <th class="table_th">Detailed Description</th>
                <th class="table_th">Img</th>
                <th class="table_th">Delete</th>
                <th class="table_th">Update</th>
            </tr>

            <?php
            if ($result && mysqli_num_rows($result) > 0) {
                while ($info = $result->fetch_assoc()) {
                    ?>
                    <tr>
                        <td class="table_td"><?php echo htmlspecialchars($info['product']); ?></td>
                        <td class="table_td"><?php echo htmlspecialchars($info['brand']); ?></td>
                        <td class="table_td"><?php echo htmlspecialchars($info['description']); ?></td>
                      <td class="table_td"><?php echo htmlspecialchars($info['price']); ?></td>

                        <td class="table_td"><?php echo htmlspecialchars($info['detailed_description']); ?></td>
                        <td class="table_td">
                            <img height="100px" width="100px" src="<?php echo htmlspecialchars($info['photo']); ?>">
                        </td>
                        <td class="table_td">
                            <a onClick="return confirm('Are you sure?');" class="btn-danger" href="admin_view_produkt.php?products_id=<?php echo $info['id']; ?>">Delete</a>
                        </td>
                        <td class="table_td">
                            <a class="btn-primary " href="admin_update_produkt.php?id=<?php echo $info['id']; ?>">Update</a>
                        </td>
                    </tr>
                    <?php
                }
            } else {
                ?>
                <tr>
                    <td colspan="7" class="table_td">No products found!</td>
                </tr>
                <?php
            }
            ?>
        </table>
    </center>

</div>

</body>
</html>
