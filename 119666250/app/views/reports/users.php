<?php
require_once '../app/views/templates/header.php';
?>
<!-- Report List -->
<div class="row">
    <h2>User Information</h2>
    <table class="table table-stripped">
        <thead class="thead-dark">
            <tr>
                <th>Username</th>
                <th>Email</th>
                <th>Last logged date
                <th># Notes</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($data->report() as $report) {
                ?>
                <tr>
                    <td><?= $report['Username'] ?></td>
                    <td><?= $report['Email'] ?></td>
                    <td><?= $report['Time'] ?></td>
                    <td><?= $report['count'] ?></td>
                    <td>
                        <a href="<?=EXPORT  . DS . $report['Username'] 
                                            . DS . $report['Email']
                                            . DS . $report['Time']
                                            . DS . $report['count']?>">Export</a>
                    </td>
                </tr>
                <?php
            }
            ?>
        </tbody>
    </table>
</div>

<?php require_once '../app/views/templates/footer.php' ?>

