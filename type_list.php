<?php include 'view/header.php'; ?>
<main>
    <h2>Vehicle Type List</h2>
    <section>
        <table>
            <tr>
                <th colspan="2">Name</th>
            </tr>        
            <?php foreach ($types as $type) : ?>
            <tr>
                <td><?php echo $type['Type']; ?></td>
                <td>
                    <form action="." method="post">
                        <input type="hidden" name="action" value="delete_type">
                        <input type="hidden" name="type_code"
                            value="<?php echo $type['Code']; ?>"/>
                        <input type="submit" value="Remove" class="button red" />
                    </form>
                </td>
            </tr>
            <?php endforeach; ?>    
        </table>
    </section>
    <section>
        <h2>Add Vehicle Type</h2>
        <form action="." method="post" id="add_type_form">
            <input type="hidden" name="action" value="add_type">

            <label>Name:</label>
            <input type="text" name="type_name" max="20" required><br>

            <label>&nbsp;</label>
            <input id="add_type_button" type="submit" class="button blue" value="Add Type">
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