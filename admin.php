<?php
    require('model/database.php');
    require('model/vehicle_db.php');
    require('model/class_db.php');
    require('model/type_db.php');

    $action = filter_input(INPUT_POST, 'action');
    if ($action == NULL) {
        $action = filter_input(INPUT_GET, 'action');
        if ($action == NULL) {
            $action = 'list_vehicles';
        }
    }

    if ($action == 'list_vehicles') {
        $class_code = filter_input(INPUT_GET, 'class_code', FILTER_VALIDATE_INT);
		$classes = get_classes();
        $class_name = get_class_name($class_code);
        $type_code = filter_input(INPUT_GET, 'type_code', FILTER_VALIDATE_INT);
        // call the functions
		$types = get_types();
        $type_name = get_type_name($type_code);
		$vehicle_id = filter_input(INPUT_GET, 'vehicle_id', FILTER_VALIDATE_INT);
        $vehicles = get_vehicles();		 
        include('vehicle_list.php');
    } else if ($action == 'list_classes') {
        $classes = get_classes();
        include('class_list.php');
	} else if ($action == 'list_types') {	
		$types = get_types();
		include('type_list.php');
    } else if ($action == 'delete_vehicle') {
        $vehicle_id = filter_input(INPUT_POST, 'vehicle_id', FILTER_VALIDATE_INT);
        if ($vehicle_id == NULL || $vehicle_id == FALSE) {
            $error = "Missing or incorrect vehicle id.";
            include('errors/error.php');
        } else {
            delete_vehicle($vehicle_id);
            header("Location: .?class_code=$class_code");
        }
    } else if ($action == 'delete_class') {
        $class_code = filter_input(INPUT_POST, 'class_code', FILTER_VALIDATE_INT);
        if ($class_code == NULL || $class_code == FALSE) {
            $error = "Missing or incorrect class id.";
            include('errors/error.php');
        } else {
            delete_class($class_code);
            header("Location: .?action=list_classes");
        }
	} else if ($action == 'delete_type') {
        $type_code = filter_input(INPUT_POST, 'type_code', FILTER_VALIDATE_INT);
        if ($type_code == NULL || $type_code == FALSE) {
            $error = "Missing or incorrect type id.";
            include('errors/error.php');
        } else {
            delete_type($type_code);
            header("Location: .?action=list_types");
        }
    } else if ($action == 'show_add_form') {
        $classes = get_classes();
		$types = get_types();
        include('add_vehicle_form.php');
    } else if ($action == 'add_vehicle') {
        $class_code = filter_input(INPUT_POST, 'class_code', FILTER_VALIDATE_INT);
        $year = filter_input(INPUT_POST, 'year');
        $make = filter_input(INPUT_POST, 'make');
        $model = filter_input(INPUT_POST, 'model');
        $price = filter_input(INPUT_POST, 'price');
        if ($class_code == NULL || $class_code == FALSE || $year == NULL || $make == NULL || $model == NULL || $price == NULL) {
            $error = "Invalid item data. Check all fields and try again.";
            include('errors/error.php');
        } else {
            add_vehicle($class_code, $year, $make, $model, $price);
            header("Location: .?class_code=$class_code");
        }
	} else if ($action == 'add_vehicle') {
        $type_code = filter_input(INPUT_POST, 'type_code', FILTER_VALIDATE_INT);
        $year = filter_input(INPUT_POST, 'year');
        $make = filter_input(INPUT_POST, 'make');
        $model = filter_input(INPUT_POST, 'model');
        $price = filter_input(INPUT_POST, 'price');
        if ($type_code == NULL || $type_code == FALSE || $year == NULL || $make == NULL || $model == NULL || $price == NULL) {
            $error = "Invalid item data. Check all fields and try again.";
            include('errors/error.php');
        } else {
            add_vehicle($type_code, $year, $make, $model, $price);
            header("Location: .?type_code=$type_code");
        }
    } else if ($action == 'add_type') {
        $type_name = filter_input(INPUT_POST, 'type_name');
        add_type($type_name);
        header("Location: .?action=list_type");
    }
?> 

   