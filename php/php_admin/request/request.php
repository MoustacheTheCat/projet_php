<?php

//request GET ALL

function getAllData($db, $table_name){
    $data = $db->prepare("SELECT * FROM  $table_name"); 
    $data->execute();
    $names = $data->fetchAll(); 
    return $names;
}

//request GET WHERE ID

function getOneData($db, $table_name, $name_column ,$id){
    $data = $db->prepare("SELECT * FROM  $table_name WHERE $name_column= :$name_column"); 
    $data->execute(array(':'.$name_column => $id));
    $name = $data->fetchAll(); 
    return $name;
}


// Request Add

function addData($db, $table_name, $tables_columns) {
    $placeholders = implode(', ', array_fill(0, count($tables_columns), ':'.$table_name));
    $data = $db->prepare("INSERT INTO $table_name (" . implode(', ', $tables_columns) . ") VALUES ($placeholders)");
    foreach ($tables_columns as $table_column) {
        $data->bindValue(':'.$table_column, $_POST[$table_column], PDO::PARAM_STR);
    }
    $data->execute();
}

// Request Update

function updateData($db, $table_name, $tables_columns) {
    $request = "UPDATE $table_name SET ";
    foreach ($tables_columns as $table_column) {
        $request .= "$table_column = :$table_column, ";
    }
    $request = rtrim($request, ', ');
    $request .= " WHERE votre_condition"; 
    $data = $db->prepare($request);
    foreach ($tables_columns as $table_column) {
        $data->bindValue(':' . $table_column, $_POST[$table_column], PDO::PARAM_STR);
    }
    $data->execute();
}

//Request Delete

function deleteData($db, $table_name, $id){
    $data = $db->prepare("DELETE FROM $table_name WHERE id = :id");
    $data->execute([
    'id' => $id
    ]);
}

?>
