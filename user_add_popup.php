<!-- User add popup -->
<div class="popup" id="user_add_popup">
      <div class="popup__content">
          <div class="index__add">
            <h2 class="index_info">Add new user</h2>
            <a href="index.php" class="list__item--button list__item--button-white"
              >User List</a
            >
            
            
            <form action="#" method="POST" class="form" id="user_form" enctype="multipart/form-data">
              <div class="row">
                <div class="col-1-of-2">
                  <div class="form__group">
                    <input
                      type="text"
                      name="name"
                      id="name"
                      class="form__input"
                      placeholder="User name"
                      required
                      autocomplete="off"
                    />
                    <label for="" class="form__label">User name</label>
                  </div>
                </div>
                <div class="col-1-of-2">
                  <div class="form__group">
                    <input
                      type="text"
                      name="email"
                      id="email"
                      class="form__input"
                      placeholder="Email"
                      required
                      autocomplete="off"
                    />
                    <label for="" class="form__label">Email</label>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-1-of-2">
                  <div class="form__group">
                    <input
                      type="number"
                      name="phone"
                      id="phone"
                      class="form__input"
                      placeholder="Phone"
                      required
                      autocomplete="off"
                    />
                    <label for="" class="form__label">Phone</label>
                  </div>
                </div>
                <div class="col-1-of-2">
                  <div class="form__group">
                    <input
                      type="text"
                      name="address"
                      id="address"
                      class="form__input"
                      placeholder="Address"
                      required
                      autocomplete="off"
                    />
                    <label for="" class="form__label">Address</label>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-1-of-1">
                  <div class="form__group">
                    <input
                      type="file"
                      name="photo"
                      class="form__input--file product__image--file"
                      id="file"
                    />
                    <label for="file" class="form__label--file"
                      ><i class="fas fa-file-image fa-5x"></i
                    ></label>
                    <img class="form__image--load" src="" alt="" />
                  </div>
                </div>
              </div>
              <div class="row">
                <button
                  type="submit"
                  name="submit"
                  class="
                    list__item--button
                    list__item--button-white
                    list__item--button-size
                  "
                >
                  Add new Product
                </button>
              </div>
            </form>
          </div>
      </div>
    </div><!-- End User add popup -->