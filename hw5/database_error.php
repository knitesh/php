<?php
/*
 * Author: Kumar Nitesh
 * Description: Display Database error message
*/

include('./common/header.php');?>

<div class="card">
        <h1>Database Error</h1>
        <p>There was an error connecting to the database.</p>
        <p>Please check you connection string</p>
        <p>Error message: <?php echo $error_message; ?></p>
</div>

<?php include('./common/footer.php');?>
