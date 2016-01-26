
<h2><?php echo $title; ?></h2>

<?php foreach ($guest_book as $guest_book_entry): ?>

        <h3><?php echo $guest_book_entry['name']; ?></h3>
        <div class="main">
                <?php echo $guest_book_entry['email']; ?> </br>
                <?php echo $guest_book_entry['comments']; ?>
        </div>
        <p><a href="<?php echo site_url('guest_book/'.$guest_book_entry['slug']); ?>">View guest book entry</a></p>

        <a href="guest_book/delete_guest_book_entry/<?php echo $guest_book_entry['slug']; ?>"
       onclick="return confirm('Do you want to delete this guest book entry?');">
          <button id="button_delete">Delete</button>
        </a>
<?php endforeach; ?>
