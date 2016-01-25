<h2><?php echo $title; ?></h2>

<?php foreach ($news as $news_item): ?>

        <h3><?php echo $news_item['title']; ?></h3>
        <div class="main">
                <?php echo $news_item['text']; ?>
        </div>
        <p><a href="<?php echo site_url('news/'.$news_item['slug']); ?>">View article</a></p>

        <a href="news/delete_news_item/<?php echo $news_item['slug']; ?>"
       onclick="return confirm('Do you want to delete this guest entry?');">
          <button id="button_delete">Delete</button>
        </a>
<?php endforeach; ?>
