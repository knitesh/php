<?php
require('database.php');

$query = 'SELECT *
          FROM sk_courses
          ORDER BY courseID';
$statement = $db->prepare($query);
$statement->execute();
$courses = $statement->fetchAll();
$statement->closeCursor();
?>
<?php include('header.php');?>

<div class="row">
    <div class="col s12">
        <form action="add_student.php" method="POST" id="add_student_form">
        <div class="card">
            <div class="card-content">
                <span class="card-title">Add Student</span>

                    <div class="input-field col s12 left">
                        <select  name="courseID" required>
                            <option value="" disabled selected>Choose a course</option>
                            <?php foreach ($courses as $course) : ?>
                                <option value="<?php echo $course['courseID']; ?>">
                                    <?php echo $course['courseName']; ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                        <label>Courses</label>
                    </div>

                    <div class="input-field col s12">
                        <input  id="firstName" name="firstName" type="text" class="validate" required>
                        <label for="firstName">First Name</label>
                    </div>
                    <div class="input-field col s12">
                        <input  id="lastName" name="lastName" type="text" class="validate" required>
                        <label for="lastName">Last Name</label>
                    </div>
                    <div class="input-field col s12">
                        <input  id="email" name="email" type="email" class="validate" required>
                        <label for="email">Email</label>
                    </div>
                    <label>&nbsp;</label>
            </div>
            <div class="card-action">
                <button type="submit" value="Add Student" class="btn btn-small right">Add Student</button>
                <a href="index.php" class="btn btn-small">View Student List</a>
            </div>
        </div>
        </form>
    </div>
</div>

<?php include('footer.php');?>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var elems = document.querySelectorAll('select');
        var instances = M.FormSelect.init(elems);
    });
</script>

