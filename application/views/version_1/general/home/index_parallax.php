
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="stylesheet" type="text/css" href="<?php echo $general_class->ben_resources('version_1/css/lms/lesson/slideshow/') ?>boostrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo $general_class->ben_resources('lms/jquery.dataTables.min.css') ?>">
    <title>Username Finder</title>
    <style type="text/css">
        #example_filter{
            border: 10px solid red;
            padding: 20px;
        }
    </style>
  </head>

  <body>
    <h2 class="pull-right">Search Your Name Here</h2>
    <table id="example" class="table" style="width:100%">
        <thead>
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Grade</th>
                <th>Section</th>
                <th>Copy</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($general_class->data['data'] as $key => $value) : ?>
            
                <tr>
                    <td><?php echo $value['first_name'] ?></td>
                    <td><?php echo $value['last_name'] ?></td>
                    <td><?php echo $value['grade_name'] ?></td>
                    <td><?php echo $value['section_name'] ?></td>
                    <td><a href="<?php echo $general_class->ben_link('general/home/index/').$value['username']?>#contact"><button class="btn btn-success form-control">Copy to Login</button></a></td>
                </tr>
            <?php endforeach; ?>
            
        </tbody>
        <tfoot>
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Grade</th>
                <th>Section</th>
                <th>Copy</th>
            </tr>
        </tfoot>
    </table>
      

  </body>
  <script src="<?php echo $general_class->ben_resources('lms/jquery-1.12.4.js') ?>"></script>
  <script type="text/javascript" src="<?php echo $general_class->ben_resources('lms/jquery.dataTables.min.js') ?>"></script>
  <script type="text/javascript">
    $(document).ready( function () {
        $('#example').DataTable();
    } );
  </script>
</html>
