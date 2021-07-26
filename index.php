<?php require_once('includes/header.php') ?>

    <section class="section__list">
      <a
        href="#team_member"
        data-toggle="modal"
        style="top: 10px; left: 600px; position: absolute;"
        class="list__item2--button list__item2--button-view"
        >Team Members</a
      >
      <div class="list">
        <div class="list__item">
          <form action="#" method="POST" id="search">
            <input
              type="text"
              name="search"
              class="list__item--search user_search"
              placeholder="Search"
              autocomplete="off"
            />
          </form>
          <a
            href="#user_add_popup"
            class="list__item--button list__item--button-white"
            >Add new user</a
          >
        </div>
        <div class="list__item2">
          <table class="list__item2--table">
            <thead class="list__item2--table-thead">
              <tr>
                <th class="list__item2--table-thead-1">Phone</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Address</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody class="list__item2--table-tbody" id="user_table">

            
              


            </tbody>
          </table>
        </div>
      </div>
    </section>


    <?php include_once('team_member_preview_popup.php') ?>
    <?php include_once('user_add_popup.php') ?>
    <?php include_once('user_preview_popup.php') ?>
    <?php include_once('edit_user_popup.php') ?>

<?php include_once('includes/footer.php') ?>

