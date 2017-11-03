<?php require_once '../app/views/templates/header.php'?>

<h2>Reminder Page</h2>

<table class='table table-striped table-condensed'>
	<tr>
		<th>Subject</th>
		<th>Action</th>
	</tr>
	
    <?php foreach ($data['list'] as $items){ ?>
        <tr>
            <td><?=$items['subject']?></td>
			<td><a href="/remind/remove/<?=$items['id']?>">Remove</a> | 
				<a href="/remind/<?=$items['id']?>">View</a> | 
				<a href="/remind/update/<?=$items['id']?>">Update</a>
			</td>
        </tr>
    <?php }?>

</table>