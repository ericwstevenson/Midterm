<!DOCTYPE html>
<html>

<!-- the head section -->
<head>
    <title>Zippy Admin</title>
    <link rel="stylesheet" type="text/css" href="view/css/main.css" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<!-- the body section -->
<body>
    <header>
        <h1>Zippy Admin</h1>
    </header>

<?php
    require('model/database.php');
    require('model/vehicle_db.php');
    require('model/class_db.php');
    require('model/type_db.php');

	$class_code = filter_input(INPUT_GET, 'class_code', FILTER_VALIDATE_INT);
	$classes = get_classes();
    $class_name = get_class_name($class_code);
    $type_code = filter_input(INPUT_GET, 'type_code', FILTER_VALIDATE_INT);
	$types = get_types();
    $type_name = get_type_name($type_code);
	$vehicle_id = filter_input(INPUT_GET, 'vehicle_id', FILTER_VALIDATE_INT);
    $vehicles = get_vehicles();		
?>
<main>
    <section>
		<?php if ( sizeof($vehicles) != 0) { ?>
            <form action="." method="get" id="type_selection">
            <select name="vehicle_code">
                <option value="0">View All Makes</option>
                <?php foreach ($vehicles as $vehicle) : ?>
                    <option value="<?php echo $vehicle['Code']; ?>">
                        <?php echo $vehicle['Make']; ?>
                    </option>
                <?php endforeach; ?>
            </select> 
            <select name="type_code">
                <option value="0">View All Types</option>
                <?php foreach ($types as $type) : ?>
                    <option value="<?php echo $type['Code']; ?>">
                        <?php echo $type['Type']; ?>
                    </option>
                <?php endforeach; ?>
            </select>
            <select name="class_code">
                <option value="0">View All Classes</option>
                <?php foreach ($classes as $class) : ?>
                    <option value="<?php echo $class['Code']; ?>">
                        <?php echo $class['Class']; ?>
                    </option>
                <?php endforeach; ?>
            </select> 
		        <input id="add_class_button" type="submit" class="button blue" value="Submit Search">
            </form>
        <?php } ?>
        <?php if( sizeof($vehicles) != 0 ) { ?>
		<div id="table-overflow">
			<div style="overflow-x:auto;">
                <table>
                    <thead>
                        <tr>
                            <th>Year</th>
                            <th>Make</th>
			      			<th>Model</th>
							<th>Price</th>
							<th>Type</th>
                            <th>Class</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($vehicles as $vehicle) : ?>
                        <tr>
                            <td><?php echo $vehicle['Year']; ?></td>
                            <td><?php echo $vehicle['Make']; ?></td>
                            <td><?php echo $vehicle['Model']; ?></td>								
                            <td><?php echo $vehicle['Price']; ?></td>
                            <td><?php echo $vehicle['Type_code']; ?></td>
                            <td><?php echo $vehicle['Class_code']; ?></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
		</div>    
        <?php } ?>
        </section>
    </main>
    <footer>
        <p>&copy; <?php echo date("Y"); ?> Zippy Used Autos</p>
    </footer>
</body>
</html>
