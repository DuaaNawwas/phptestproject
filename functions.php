<?php
// getAllData
function getAllData($table)
{
    global $conn;
    $sql = "SELECT * FROM $table";
    $stmt = $conn->prepare($sql);


    $stmt->execute();
    return $stmt->fetchAll();
}
// getOne
function getOneById($table, $id)
{
    global $conn;
    $sql = "SELECT * FROM $table WHERE id= $id";
    $stmt = $conn->prepare($sql);


    $stmt->execute();
    return $stmt->fetch();
}
// getOne
function getOneByEmail($table, $email)
{
    global $conn;
    $sql = "SELECT * FROM $table WHERE email= :email";
    $stmt = $conn->prepare($sql);
    $stmt->execute([":email" => $email]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

// getDataByForeignKey
function getDataByForeignKey($table, $foreignKey)
{
    global $conn;
    $sql = "SELECT * FROM $table WHERE category_id= :foreignKey";
    $stmt = $conn->prepare($sql);

    $stmt->execute([":foreignKey" => $foreignKey]);
    return $stmt->fetchAll();
}
// getDataByForeignKey
function getDataByUserid($table, $foreignKey)
{
    global $conn;
    $sql = "SELECT * FROM $table WHERE user_id= :foreignKey";
    $stmt = $conn->prepare($sql);

    $stmt->execute([":foreignKey" => $foreignKey]);
    return $stmt->fetchAll();
}

// filterBySelectedCategoryInnerJoin
function filterBySelectedCategory($table1, $table2, $foreignKey)
{
    global $conn;
    $category_id = $foreignKey;
    $sql = "select * from $table1 
        inner join $table2
        on $table1.category_id = $table2.id";
    $query = $conn->prepare($sql);
    $query->execute([":category_id" => $category_id]);
    $filteredProducts = $query->fetchAll(PDO::FETCH_ASSOC);
    return $filteredProducts;
}
// filterBySelectedCategoryInnerJoin

function getBillDetails($id)
{
    global $conn;
    $stmt1 = $conn->prepare('SELECT *
        FROM
            products a
                INNER JOIN
            orders b
                ON a.id = b.product_id
                INNER JOIN 
            bill c
                ON b.bill_id = c.id WHERE c.id = ?;');

    $stmt1->execute(array($id));

    $productsForBill = $stmt1->fetchAll();

    return $productsForBill;
}
