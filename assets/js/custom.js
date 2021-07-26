(function($) {
    $(document).ready(function(){


        $(document).on('change', '.product__image--file', function (event) { 
            let image_url = URL.createObjectURL(event.target.files[0])
            $('.form__image--load').attr('src', image_url);
         });


         $(document).on('click', '#preview_popup', function(e){
             $('.popup__content').css('background', 'white');
             $('.popup__content').css('boxShadow', '0 2rem 4rem rgba(0, 0, 0, 0.2)');
         });


         // User form submit script
         $(document).on('submit', '#user_form', function(e){
            e.preventDefault();
            
            // get all field
            let name    = $("#name").val();
            let email   = $("#email").val();
            let phone   = $("#phone").val();
            let address = $("#address").val();

            if(name == '' || email == '' || phone == '' || address == ''){
                alert("All fields are required !");
            }else {

                $.ajax({
                    url: "includes/user.php?status=add",
                    data: new FormData(this),
                    processData: false,
                    contentType: false,
                    type: "POST",
                    success: function(data){
                        alert(data);
    
                        // after succssfully form submitted popup redirect to index page
                        location.href = 'index.php';
                        allUserShow();
                    }
                });

            }
            
         });


         // user table show function 
         function allUserShow(){
            $.ajax({
                url: "includes/user.php?status=all",
                type: "GET",
                success: function(data){
                    $('#user_table').empty();
                    // alert(data);
                    let users = JSON.parse(data);
                    // console.log(users);
                    let no = 1; 

                    for(user of users){
                        console.log(user.name);
                        $('#user_table').append(`<tr>
                                                    <td>
                                                        <img
                                                            src="uploads/${user.photo}"
                                                            alt="List photo"
                                                            class="list__item2--image"
                                                        />
                                                    </td>
                                                    <td>${user.name}</td>
                                                    <td>${user.email}</td>
                                                    <td>${user.phone}</td>
                                                    <td>${user.address}</td>
                                                    <td>
                                                    <a
                                                        href="#popup" id="preview_popup"
                                                        class="list__item2--button list__item2--button-view"
                                                        data-id=${user.id}
                                                        >View</a
                                                    >
                                                    <a
                                                        href="#user_edit_popup"
                                                        class="list__item2--button list__item2--button-edit"
                                                        id="edit"
                                                        data-id=${user.id}
                                                        >Edit</a
                                                    >
                                                    <a
                                                        href="#"
                                                        class="list__item2--button list__item2--button-delete"
                                                        id="delete"
                                                        data-id=${user.id}
                                                        >Delete</a
                                                    >
                                                    </td>
                                                </tr>`);
                    }

                    
                }
            });
         }
         allUserShow();


         // Delete user script
         $(document).on('click', '#delete', function(e){
             e.preventDefault();
             let id = $(this).attr('data-id');
             
             if(id == ''){
                alert('User id not found !');
             }else {

               let con = confirm('Are you sure you want to delete this user ?');

               if(con){

                    $.ajax({
                        url: 'includes/user.php?status=delete&id='+id,
                        type: "GET",
                        success: function(data){
                            alert(data);
                            allUserShow();
                        }
                    });

               }else {
                   return false;
               }

             }
         });


         // Single user view script
         $(document).on('click', '#preview_popup', function(e){
            //  e.preventDefault();
             let id = $(this).attr('data-id');
             
             if(id == ''){
                alert('User id not found !');
             }else {
                $.ajax({
                    url: 'includes/user.php?status=view&id='+id,
                    type: "GET",
                    success: function(data){
                        // console.log(JSON.parse(data));

                        let user = JSON.parse(data);

                        $(".user_image").attr('src', `uploads/${user.photo}`);
                        $(".user_name").html(user.name);
                        $(".user_email").html(user.email);
                        $(".user_phone").html(user.phone);
                        $(".user_address").html(user.address);
                    }
                });
             }
         });


         // Single user edit script
         $(document).on('click', '#edit', function(e){
             let id = $(this).attr('data-id');
             
             if(id == ''){
                alert('User id not found !');
             }else {
                $.ajax({
                    url: 'includes/user.php?status=edit&id='+id,
                    type: "GET",
                    success: function(data){
                        // console.log(JSON.parse(data));

                        let user = JSON.parse(data);

                        $(".form__image--load").attr('src', `uploads/${user.photo}`);
                        $("#user_name").val(user.name);
                        $("#user_email").val(user.email);
                        $("#user_phone").val(user.phone);
                        $("#user_address").val(user.address);
                        $("#user_id").val(user.id);
                    }
                });
             }

         });


         // User form submit script
         $(document).on('submit', '#user_update_form', function(e){
            e.preventDefault();
            
            // get all field
            let name    = $("#user_name").val();
            let email   = $("#user_email").val();
            let phone   = $("#user_phone").val();
            let address = $("#user_address").val();

            if(name == '' || email == '' || phone == '' || address == ''){
                alert("All fields are required !");
            }else {

                $.ajax({
                    url: 'includes/user.php?status=update',
                    data: new FormData(this),
                    processData: false,
                    contentType: false,
                    type: "POST",
                    success: function(data){
                        alert(data);
    
                        // after succssfully form submitted popup redirect to index page
                        location.href = 'index.php';
                        allUserShow();
                    }
                });

            }
            
         });


         // Search field script
         $(document).on('keyup', '#search', function(e){
             e.preventDefault();
             
             $.ajax({
                url: 'includes/user.php?status=search',
                data: new FormData(this),
                processData: false,
                contentType: false,
                type: "POST",
                success: function(data){
                    $('#user_table').empty();
                    // alert(data);
                    let users = JSON.parse(data);
                    // console.log(users);
                    let no = 1; 

                    for(user of users){
                        console.log(user.name);
                        $('#user_table').append(`<tr>
                                                    <td>
                                                        <img
                                                            src="uploads/${user.photo}"
                                                            alt="List photo"
                                                            class="list__item2--image"
                                                        />
                                                    </td>
                                                    <td>${user.name}</td>
                                                    <td>${user.email}</td>
                                                    <td>${user.phone}</td>
                                                    <td>${user.address}</td>
                                                    <td>
                                                    <a
                                                        href="#popup" id="preview_popup"
                                                        class="list__item2--button list__item2--button-view"
                                                        data-id=${user.id}
                                                        >View</a
                                                    >
                                                    <a
                                                        href="#user_edit_popup"
                                                        class="list__item2--button list__item2--button-edit"
                                                        id="edit"
                                                        data-id=${user.id}
                                                        >Edit</a
                                                    >
                                                    <a
                                                        href="#"
                                                        class="list__item2--button list__item2--button-delete"
                                                        id="delete"
                                                        data-id=${user.id}
                                                        >Delete</a
                                                    >
                                                    </td>
                                                </tr>`);
                    }

                    
                }
            });

         });


    });
})(jQuery);