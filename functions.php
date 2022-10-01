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

// getDataByForeignKey
function getDataByForeignKey($table, $foreignKey)
{
    global $conn;
    $sql = "SELECT * FROM $table WHERE category_id= :foreignKey";
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
