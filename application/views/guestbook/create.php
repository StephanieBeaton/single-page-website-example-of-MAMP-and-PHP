<h2><?php echo $title; ?></h2>

<?php echo validation_errors(); ?>

<?php echo form_open('guestbook/create'); ?>

    <label for="name">Name</label>
    <input type="input" name="name" /><br />

    <label for="email">Email</label>
    <input type="input" name="email" /><br />

    <label for="comments">Comments</label>
    <textarea name="comments"></textarea><br />

    <input type="submit" name="submit" value="Create guest book entry" />

</form>
