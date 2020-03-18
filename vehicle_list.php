<?php include 'view/header.php'; ?>
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
								<th></th>
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
								<td>
                                    <form action="." method="post">
                                        <input type="hidden" name="action" value="delete_vehicle">
                                        <input type="hidden" name="vehicle_id"
                                            value="<?php echo $vehicle['IndexNum']; ?>">
                                        <input type="submit" value="Remove" class="button red">
                                    </form>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
			</div>
            <p><a href="?action=show_add_form">Click here</a> to add a vehicle.</p>     
            <?php } else { ?>
                <p>No to vehicles exist yet. <a href="?action=show_add_form">Click here</a> to add a vehicle.</p>     
            <?php } ?>
            <p><a href="admin.php?action=list_types">View/Edit Vehicle Types</a></p>
            <p><a href="admin.php?action=list_classes">View/Edit Vehicle Classes</a></p>
			<br>
        </section>
    </main>
<?php include 'view/footer.php'; ?>