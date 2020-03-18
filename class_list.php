<?php include 'view/header.php'; ?>
<main>
    <h2>Vehicle Class List</h2>
    <section>
        <table>
            <tr>
                <th colspan="2">Name</th>
            </tr>        
            <?php foreach ($classes as $class) : ?>
            <tr>
                <td><?php echo $class['Class']; ?></td>
                <td>
                    <form action="." method="post">
                        <input type="hidden" name="action" value="delete_class">
                        <input type="hidden" name="class_code"
                            value="<?php echo $class['Code']; ?>"/>
                        <input type="submit" value="Remove" class="button red" />
                    </form>
                </td>
            </tr>
            <?php endforeach; ?>    
        </table>
    </section>
    <section>
        <h2>Add Vehicle Class</h2>
        <form action="." method="post" id="add_class_form">
            <input type="hidden" name="action" value="add_class">

            <label>Name:</label>
            <input type="text" name="class_name" max="20" required><br>

            <label>&nbsp;</label>
            <input id="add_class_button" type="submit" class="button blue" value="Add Class">
        </form>
    </section>
    <section>
        <p><a href="admin.php">Back to Admin Vehicle List</a></p>
        <p><a href="admin.php?action=list_types">View/Edit Vehicle Types</a></p>
        <p><a href="admin.php?action=list_classes">View/Edit Vehicle Classes</a></p>
		<br>
    </section>
</main>
<footer>
    <p>&copy; <?php echo date("Y"); ?> Zippy Used Autos</p>
</footer>
</body>
</html>