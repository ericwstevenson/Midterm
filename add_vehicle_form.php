<?php include 'view/header.php'; ?>
    <main>
        <h2>Add Vehicle</h2>
        <form action="admin.php" method="post" id="add_vehicle_form">
            <input type="hidden" name="action" value="add_vehicle">

            <label>Type:</label>
            <select name="type_code">
            <?php foreach ($types as $type) : ?>
                <option value="<?php echo $type['Type_code']; ?>">
                    <?php echo $type['Type']; ?>
                </option>
            <?php endforeach; ?>
            </select><br>
			
			<label>Class:</label>
            <select name="class_code">
            <?php foreach ($classes as $class) : ?>
                <option value="<?php echo $class['Class_code']; ?>">
                    <?php echo $class['Class']; ?>
                </option>
            <?php endforeach; ?>
            </select><br>

            <label>Year:</label>
            <input type="text" name="year" max="50" required><br>

            <label>Make:</label>
            <input type="text" name="make" max="50" required><br>

            <label>Model:</label>
            <input type="text" name="model" max="50" required><br>

            <label>Price:</label>
            <input type="text" name="price" max="50" required><br>

            <label>&nbsp;</label>
            <input type="submit" value="Add Vehicle" class="button blue"><br>
        </form>
        <p><a href="admin.php?action=list_vehicles">Back to Admin Vehicle List</a></p>
    </main>

<?php include 'view/footer.php'; ?>