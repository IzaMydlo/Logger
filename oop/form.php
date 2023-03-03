<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Compute Result</title>
</head>
<body>

<div class="container" style="margin-top: 1rem;">
    <h2>Student Result</h2>

    <form action="" method="post">
        <div class="form-row">
            <div class="col">
                <input type="text" name="name" class="form-control" placeholder="Full name">
            </div>
            <div class="col">
                <input type="text" name="id" class="form-control" placeholder="Student ID">
            </div>
        </div>

        <div style="margin-top: 1rem;">
            <h4>Courses</h4>
            <div class="form-row">
            <div class="form-group col-md-2">
                <label for="php">PHP</label>
                <input type="text" class="form-control" name="php" id="php">
            </div>
            <div class="form-group col-md-2">
                <label for="java">Java</label>
                <input type="text" class="form-control" name="java" id="java">
            </div>
            <div class="form-group col-md-2">
                <label for="nodejs">NodeJS</label>
                <input type="text" class="form-control" name="nodejs" id="nodejs">
            </div>

            <div class="form-group col-md-2">
                <label for="ruby">Ruby</label>
                <input type="text" class="form-control" name="ruby" id="ruby">
            </div>

            <div class="form-group col-md-2">
                <label for="cplusplus">C++</label>
                <input type="text" class="form-control" name="cplusplus" id="cplusplus">
            </div>
        </div>
            <button id="submit" type="submit" class="btn btn-primary">Compute</button>
        </div>
    </form>
<!--    The whol sextion is hidden when no instance of Student i set.-->
    <?php if(isset($student) && $student instanceof \App\Student): ?>
        <h2 style="margin-top: 1.2rem;">ABC College Final Result Sheet</h2>
        <table class="table">
            <tr><th>#ID</th> <td> <?= $student->getId() ?></td></tr>
            <tr><th>Name</th> <td><?= $student->getName() ?></td></tr>
            <tr><th>PHP</th> <td><?= $php ?></td></tr>
            <tr><th>JAVA</th> <td><?= $java ?></td></tr>
            <tr><th>C++</th> <td><?= $cplusplus ?></td></tr>
            <tr><th>Ruby</th> <td><?= $ruby ?></td></tr>
            <tr><th>NodeJS</th> <td><?= $nodejs ?></td></tr>
            <tr><th>Total Score</th> <td><?= $student->totalSore() ?></td></tr>
            <tr><th>Average Score</th> <td><?= $student->averageScore() ?></td></tr>
            <tr><th>Grade</th> <td><?= $student->grade() ?></td></tr>
            <tr><th>Final Result</th> <td><?= $student->finalResult() ?></td></tr>
            <tr><th>Remark</th> <td><?= $student->remark() ?></td></tr>
        </table>
    <?php endif; ?>
</div>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
</body>
</html>