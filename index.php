<?php
include 'functions.php';

if(isset($_GET['id'])) {
    delete_bio_data($_GET['id']);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Finial Project</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/select2.min.css">
    <style>
    body {
        background: #f5f5f5;
        border-radius: 0px !important;
    }

    .card,
    .card-header {
        border-radius: 0px !important;
    }
    .accordion-item {
        background:#f5f5f5
    }
    .accordion-button {
        background:silver !important;
        color:#fff !important;
    }
    </style>
</head>

<body>

    <div class="container mt-3 mb-3">
        <div class="mt-2">
            <div class="mb-2">
                <a href="add.php" class="btn" style="border-radius:0px;background:silver !important">Add New</a>
            </div>

            <div class="accordion accordion-flush" id="accordionFlushExample">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                            data-bs-target="#" aria-expanded="false" aria-controls="">
                            List of Records
                        </button>
                    </h2>
                    <div id="" class="accordion-collapse collapse show" aria-labelledby=""
                        data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">
                        <div class="table-responsive">
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th style="width:1px">#</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Contact</th>
                                    <th>Position</th>
                                    <th style="width:10%"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i=1; foreach(show_bio_data() as $row) { ?>
                                <tr>
                                    <td><?=$i++?></td>
                                    <td><?=$row['name']?></td>
                                    <td><?=$row['email']?></td>
                                    <td><?=$row['cellphone']?></td>
                                    <td><?=$row['desired_position']?></td>
                                    <td class="text-center"><a href="edit.php?id=<?=$row['personal_data_id']?>">Edit</a>
                                        | <a href="index.php?id=<?=$row['personal_data_id']?>">Delete</a></td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/select2.min.js"></script>

</body>


<script>
$("select").select2({
    tags: true
});
</script>

</html>