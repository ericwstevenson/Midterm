<?php

    function get_vehicles() {
        global $db;

        $query = 'SELECT Year, Make, Model, Price, Type_code, Class_code FROM vehicles ORDER BY IndexNum';

        $statement = $db->prepare($query);
        $statement->execute();
        $vehicles = $statement->fetchAll();
        $statement->closeCursor();
        return $vehicles;
	}
 
    function get_vehicles_by_class($class_code) {
        global $db;
        if ($class_code == NULL || $class_code == FALSE) {
            $query = 'SELECT V.Year, V.Make, V.Model, V.Price, V.Type_code, C.Code FROM vehicles V LEFT JOIN classes C ON V.Class_code = C.Code ORDER BY C.code';
        } else {
            $query = 'SELECT V.Year, V.Make, V.Model, V.Price, V.Type_code, C.Code FROM vehicles V LEFT JOIN classes C ON V.Class_code = C.Code WHERE V.Class_code = :class_code ORDER BY IndexNum';
        }
        $statement = $db->prepare($query);
        $statement->bindValue(':class_code', $class_code);
        $statement->execute();
        $vehicles = $statement->fetchAll();
        $statement->closeCursor();
        return $vehicles;
    }

    function get_vehicles_by_type($type_code) {
        global $db;
        if ($type_code == NULL || $type_code == FALSE) {
            $query = 'SELECT V.Year, V.Make, V.Model, V.Price, T.Code, V.Class_code FROM vehicles V LEFT JOIN types T ON V.Type_code = T.Code ORDER BY T.code';
        } else {
            $query = 'SELECT V.Year, V.Make, V.Model, V.Price, T.Code, V.Class_code FROM vehicles V LEFT JOIN types T ON V.Type_code = T.Code WHERE V.Type_code = :type_code ORDER BY IndexNum';
        }
        $statement = $db->prepare($query);
        $statement->bindValue(':type_code', $type_code);
        $statement->execute();
        $vehicles = $statement->fetchAll();
        $statement->closeCursor();
        return $vehicles;
    }
	
    function get_vehicle($vehicle_id) {
        global $db;
        $query = 'SELECT * FROM vehicles WHERE IndexNum = :vehicle_id';
        $statement = $db->prepare($query);
        $statement->bindValue(':vehicle_id', $vehicle_id);
        $statement->execute();
        $vehicle = $statement->fetch();
        $statement->closeCursor();
        return $vehicle;
    }

    function delete_vehicle($vehicle_id) {
        global $db;
        $query = 'DELETE FROM vehicles WHERE IndexNum = :vehicle_id';
        $statement = $db->prepare($query);
        $statement->bindValue(':vehicle_id', $vehicle_id);
        $statement->execute();
        $statement->closeCursor();
    }

    function add_vehicle($year, $make, $model, $price,$type_code, $class_code) {
        global $db;
        $query = 'INSERT INTO vehicles (Year, Make, Model, Price, Type_code, Class_code)
              VALUES
                 (:year, :make, :model, :price, :type_code, :class_code)';
        $statement = $db->prepare($query);
        $statement->bindValue(':year', $year);
        $statement->bindValue(':make', $make);
        $statement->bindValue(':model', $model);
        $statement->bindValue(':price', $price);	
        $statement->bindValue(':type_code', $type_code);		
        $statement->bindValue(':class_code', $class_code);
        $statement->execute();
        $statement->closeCursor();
    }
?>