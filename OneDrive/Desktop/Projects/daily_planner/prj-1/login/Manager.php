<?php


function getManager($id) {
    global $cn;
    $sql = "select * from managers where id=?";
    $result = $cn->prepare($sql);
    $result->bindValue(1, $id);
    $result->execute();
    if ($result->rowCount() > 0) {
        return $result->fetch();
    }
    return false;
}

function updateManager($first_name, $last_name, $mobile, $id) {
    global $cn;
    $sql = "update managers set first_name=?, last_name=? , mobile=? where id=?";
    $result = $cn->prepare($sql);
    $result->bindValue(1, $first_name);
    $result->bindValue(2, $last_name);
    $result->bindValue(3, $mobile);
    $result->bindValue(4, $id);
    return $result->execute();
}
