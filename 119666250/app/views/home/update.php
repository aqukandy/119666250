<?php require_once '../app/views/templates/header.php' ?>

<div class="row">
    <div class="col">
        <h2>Update Reminder</h2>
        <form id="updatereminder" 
              method="post"
              action="<?= REMINDER_UPDATE ?>">
            <div class="row">
                <input type="hidden"
                       name="reminderId"
                       id="reminderId"
                       value="<?= $data[0]['id']; ?>"/>
            </div>
            <div class="row">
                <label for="subject"
                       class="col-sm-3 control-label">Subject</label>
                <div class="col-sm-9">
                    <input type="text"
                           name="subject"
                           id="subject"
                           value="<?= $data[0]['subject']; ?>"
                           class="form-control"/>
                </div>
            </div>
            <div class="row">
                <label for="description"
                       class="col-sm-3 control-label">Description</label>
                <div class="col-sm-9">
                    <textarea id="description"
                              name="description"
                              class="form-control"
                              rows="4"><?= $data[0]['description']; ?></textarea>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-3"></div>
                <div class="col-sm-9">
                    <input type="submit" value="Update" class="btn btn-primary"/>
                </div>
            </div>
        </form>
    </div>
</div>

<?php require_once '../app/views/templates/footer.php' ?>