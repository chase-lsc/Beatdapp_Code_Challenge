<!DOCTYPE html>
<?php
    $con=mysqli_connect('localhost','root','','expense_tracker') or die('Error connecting to MySQL server.');
?>
<html>

<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>

    <div>
        <form method="post" action="insert.php">
            <div class="form-group">
                <label for="name">Name of the expense</label>
                <input type="text" name="name" class="form-control" id="name" placeholder="Enter name of the expense">
            </div>
            <div class="form-group">
                <label for="cost">Cost of the item purchased</label>
                <input type="text" name="cost" class="form-control" id="cost" placeholder="Enter cost of the item purchased">
            </div>
            <div class="form-group">
                <label for="category">Category of the purchase</label>
                <input type="text" name="category" class="form-control" id="category" placeholder="Enter category of the purchase">
            </div>
            <button type="submit" class="btn btn-primary" id="submit">Submit</button>
        </form>
    </div>
    <div>
        <form method="post" action="delete.php">
            <label for='delete'>ID of the expense to delete</label>
            <input type="text" name="delete" class="form-control" id="delete" placeholder="Enter ID of the expense you want to delete">
            <button type="submit" class="btn btn-primary">Submit</button>
    </div>
    <div>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Expense Name</th>
                    <th scope="col">Cost</th>
                    <th scope="col">Category</th>
                </tr>
            </thead>
            <tbody id="tableBody">

            </tbody>
        </table>
    </div>

    <script>
        function makeRow(name, cost, category) {
            let newTr=document.createElement("tr");
            let nameCell=document.createElement("td");
            let costCell=document.createElement("td");
            let catCell=document.createElement("td");
            nameCell.innerHTML=name;
            costCell.innerHTML=cost;
            catCell.innerHTML=category;
            newTr.appendChild(nameCell);
            newTr.appendChild(costCell);
            newTr.appendChild(catCell);
            let table=document.getElementById('tableBody');
            table.appendChild(newTr);
        }

    </script>

    <?php
        $query="select * from expenses";
        mysqli_query($con,$query);
        $result=mysqli_query($con,$query);
        $row=mysqli_fetch_array($result);
        while ($row=mysqli_fetch_array($result)){
            //makeRow($row['expense_name'],$row['cost'],$row['category']);
            echo 'Id: ' . $row['id'] . '  Expense name: ' . $row['expense_name'] . '  Cost: ' . $row['cost'] . '  Category: ' . $row['category'] . '<br/>';
        }
    ?>


</body>

</html>