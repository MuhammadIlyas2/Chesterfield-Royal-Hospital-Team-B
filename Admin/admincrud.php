<?php 
    $db = new SQLite3("../database.db");
    $stmt = $db->prepare('SELECT node_id, name FROM Node');


    $result = $stmt->execute();

    $rows_array = [];
    
    while ($row = $result->fetchArray()) {
        $rows_array[] = $row;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Location Management</title>
    <link rel="stylesheet" href="../admincrud.css">
</head>
<body>
    <header>
        <h1>Location Management</h1>
    </header>

    <main>
        <section class="location-form-section">
            <h2>Create Source Location</h2>
            <form id="currentLocationForm" class="location-form">
                <div class="form-field">
                    <label for="currentLocationName">Location Name:</label>
                    <input type="text" id="currentLocationName" name="currentLocationName" required>
                </div>
                <button type="submit" class="action-btn">Create Current Location</button>
            </form>

            <h2>Create Destination Location</h2>
            <form id="destinationLocationForm" class="location-form">
                <div class="form-field">
                    <label for="destinationLocationName">Location Name:</label>
                    <input type="text" id="destinationLocationName" name="destinationLocationName" required>
                </div>
                <button type="submit" class="action-btn">Create Destination Location</button>
            </form>
        </section>

        <section class="existing-locations">
            <h2>Existing Locations</h2>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Location Name</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                <?php for ($i = 0; $i < count($rows_array); $i++):?>
                    <tr>
                        <td><?php echo $rows_array[$i][0] ?></td>
                        <td><?php echo $rows_array[$i][1] ?></td>
                        <td>
                            <button class="action-btn">Edit</button>
                            <button class="action-btn">Delete</button>
                        </td>
                    </tr>
                    <?php endfor; ?>
                </tbody>
            </table>
        </section>
    </main>
</body>
</html>

