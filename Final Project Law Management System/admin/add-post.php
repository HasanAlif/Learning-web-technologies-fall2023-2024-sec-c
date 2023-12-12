<?php 
include 'partials/header.php';

?>




<section class="form_section">
    <div class="container form_selection-container">
        <h2>Add Post</h2>
        <div class="alert_message error">
            <p>This is an error message</p>
        </div>
        <form action="<?= ROOT_URL ?>admin/add-post-logic.php" enctype="multipart/form-data" method="POST">
            <input type="text" name="title" placeholder="Title">
            <select name="category" >
                <option value="1">Case type</option>
                
            </select>
            <textarea rows="10"name = "body" placeholder="Body"></textarea>
            <?php if(isset($_SESSION['user_is_admin'])) : ?>
            <div class="form_control inline">
                <input type="checkbox" name="is_featured" id="is_featured" value="1" checked>
                <label for="is featured" checked>Featured</label>
            </div>
            <?php endif ?>
            <div class="form_control">
                <label for="thumbnail">Add Thumbnail</label>
                <input type="file" name="thumbnail" id="thumbnail">
            </div>
            <button type="submit" name="submit" class="btn">Add Post</button>
        </form>
    </div>
</section>





<?php 

include '../partials/footer.php';

?>
