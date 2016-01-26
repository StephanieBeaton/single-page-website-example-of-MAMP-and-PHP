
    <!-- Header -->
    <a name="home"></a>
    <div class="intro-header">
      <div class="bg-overlay">
        <div class="container">


            <div class="row">
                <div class="col-lg-12">
                    <div class="intro-message">
                        <h1>fiitfu</h1>
                        <h2 class="section-heading">Welcome To Your New Virtual Office</h2>
                        <h3 id='h3-section-heading'>A CRM growth tool for Direct Sales Professionals</h3>
                        <hr class="intro-divider">
                        <!--
                        <ul class="list-inline intro-social-buttons">
                        -->
                        <ul class="list-inline ">
                            <li>
                                <a href="#" target="_blank" class="btn btn-default btn-lg"> <span  class="network-name">Start A Free Trial</span></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

        </div>
        <!-- /.container -->
      </div>
    </div>
    <!-- /.intro-header -->

 <!-- Page Content -->

  <a  name="guest-book"></a>
    <div class="content-section-a">
      <div class="bg-overlay2">
        <div class="container">
            <!--
            <div class="row">
                <div class="col-lg-5 col-sm-6">
            -->

                    <div class="clearfix"></div>
                    <h2 class="section-heading guest-book-section-heading">Guest Book</h2>
                    </br>
                    <p class="guest-book-lead">Please sign the Guest Book and we will send you free marketing tips.</p>
                    </br>

                    <!-- form to enter new Guest in Guest Book -->
                    <!--
                    <form action="http://localhost:8888/fiitfu/index.php/news/create" method="post" accept-charset="utf-8">
                    <input type="hidden" name="csrf_test_name" value="948792627037f57a68ce44b7f1930433" style="display:none;" />
                    -->

                    <?php echo validation_errors(); ?>

                    <?php echo form_open('guestbook/create'); ?>

                        <table class="guest-book-form-table">
                            <tr class="guest-book-form-row">
                                <td class="guest-book-cell guest-book-form-col-label" align='right'><label for="name">Name</label></td>
                                <td class="guest-book-cell"><input class="guest-book-input" type="input" name="name" /></td>
                            </tr>
                            <tr class="guest-book-form-row">
                                <td class="guest-book-cell guest-book-form-col-label" align='right'><label for="email">Email</label></td>
                                <td class="guest-book-cell"><input class="guest-book-input" type="input" name="email"  /></td>
                            </tr>
                            <tr class="guest-book-form-row">
                                <td class="guest-book-cell guest-book-form-col-label" align='right'><label for="comments">Comments</label></td>
                                <td class="guest-book-cell"><textarea name="comments" width=80%></textarea></td>
                            </tr>
                            <tr class="guest-book-form-row">
                                <td class="guest-book-cell guest-book-create-button" align='right' colspan="2"><input  type="submit" name="submit" value="Create guest book entry" /></td>
                            </tr>
                        </table>

                    </form>

<!--
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
-->

                    </br>
                    </br>
                    </br>


                    <!-- read only Guest Book List -->
                    <div id="table-wrapper">
                    <div id="table-scroll">

                        <table class="guest-book-table">
                            <!--
                            <thead>
                                <tr>
                                    <th><span class="text">Name</span></th>
                                    <th><span class="text">Email</span></th>
                                    <th><span class="text">blank</span></th>
                                </tr>
                            </thead>
                            -->
                            <tbody>
                                <?php foreach ($guest_book as $guest_book_entry): ?>
                                  <tr class="guest-book-row">
                                    <td class="guest-book-cell"><?php echo $guest_book_entry['name']; ?></td>
                                    <td class="guest-book-cell"><?php echo $guest_book_entry['email']; ?></td>
                                    <td class="guest-book-cell" align='right'><a href="guestbook/delete_guestbook_entry/<?php echo $guest_book_entry['slug']; ?>" onclick="return confirm('Do you want to delete this guest entry?');"><button id="button_delete">Delete</button></a></td>
                                  </tr>
                                  <tr class="guest-book-row">
                                    <td class="guest-book-cell" colspan="3"><?php echo $guest_book_entry['comments']; ?></td>
                                  </tr>
                                <?php endforeach; ?>
                            </tbody>
                      </table>
                    </div>
                    </div>


        </div>
        <!-- /.container -->
      </div>
     </div>
    </div>


</div>
</div>
</div>
<!-- /.banner -->
