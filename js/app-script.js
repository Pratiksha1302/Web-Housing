$(document).ready(function(){

    $("th input[type='checkbox']").on("change", function() {
        // alert('hii');
   var cb = $(this),          //checkbox that was changed
       th = cb.parent(),      //get parent th
       col = th.index() + 4;  //get column index. note nth-child starts at 1, not zero
   $("tbody td:nth-child(" + col + ") input").prop("checked", this.checked);  //select the inputs and [un]check it
});

    //selecting state & fatching city accroding to state_id
    $(document).on('change','#state',function(){
        var state_id = $(this).val();
        if (state_id == "-1") {
            alert("Select State");

        }else{
            $.ajax({
                url:"http://localhost/WebHousing/index.php/admin/city_master/fetch_city",
                type:"post",
                data:{state_id:state_id},
                success:function(d){
                    //alert(d);
                    $('#city').html(d);
                }
            });
        }
    });

    $(document).on('change','#edit_state',function(){
        var state_id = $(this).val();
        if (state_id == "-1") {
            alert("Select State");

        }else{
            $.ajax({
                url:"http://localhost/WebHousing/index.php/admin/city_master/fetch_city",
                type:"post",
                data:{state_id:state_id},
                success:function(d){
                    //alert(d);
                    $('#edit_city').html(d);
                }
            });
        }
    });

    $(document).on('change','#view_state',function(){
        var state_id = $(this).val();
        if (state_id == "-1") {
            alert("Select State");

        }else{
            $.ajax({
                url:"http://localhost/WebHousing/index.php/admin/city_master/fetch_city",
                type:"post",
                data:{state_id:state_id},
                success:function(d){
                    //alert(d);
                    $('#view_city').html(d);
                }
            });
        }
    });

    //selecting state & fatching Block name accroding to hostels name
    $(document).on('change','#hostel',function(){
        var hostel_id = $(this).val();
        if (hostel_id == "-1") {
            alert("please Select hostel");

        }else{
            $.ajax({
                url:"http://localhost/WebHousing/index.php/admin/Hostel_block_master/fetch_block",
                type:"post",
                data:{hostel_id:hostel_id},
                success:function(d){
                    // alert(d);
                    $('#block').html(d);
                }
            });

            $.ajax({
                url:"http://localhost/WebHousing/index.php/admin/Room_allotment_master/fetch_stud",
                type:"post",
                data:{hostel_id:hostel_id},
                success:function(d){
                    // alert(d);
                    $('.stud').html(d);
                }
            });
        }
    });

    $(document).on('change','#room_allocation_hostel',function(){
        var hostel_id = $(this).val();
        if (hostel_id == "-1") {
            alert("please Select hostel");

        }else{
            $.ajax({
                url:"http://localhost/WebHousing/index.php/admin/Hostel_block_master/fetch_block",
                type:"post",
                data:{hostel_id:hostel_id},
                success:function(d){
                    // alert(d);
                    $('#room_allocation_block').html(d);
                }
            });

            $.ajax({
                url:"http://localhost/WebHousing/index.php/admin/Room_allotment_master/fetch_stud",
                type:"post",
                data:{hostel_id:hostel_id},
                success:function(d){
                    // alert(d);
                    $('#room_allocation_stud').html(d);
                }
            });
        }
    });

    $(document).on('change','#edit_hostel',function(){
        var hostel_id = $(this).val();
        if (hostel_id == "-1") {
            alert("Please Select hostel");

        }else{
            $.ajax({
                url:"http://localhost/WebHousing/index.php/admin/Hostel_block_master/fetch_block",
                type:"post",
                data:{hostel_id:hostel_id},
                success:function(d){
                    // alert(d);
                    $('#edit_block').html(d);
                }
            });

            $.ajax({
                url:"http://localhost/WebHousing/index.php/admin/Room_allotment_master/fetch_stud",
                type:"post",
                data:{hostel_id:hostel_id},
                success:function(d){
                    // alert(d);
                    $('#edit_stud').html(d);
                }
            });
        }
    });

    $(document).on('change','#view_hostel',function(){
        var hostel_id = $(this).val();
        if (hostel_id == "-1") {
            alert("please Select hostel");

        }else{
            $.ajax({
                url:"http://localhost/WebHousing/index.php/admin/Hostel_block_master/fetch_block",
                type:"post",
                data:{hostel_id:hostel_id},
                success:function(d){
                    // alert(d);
                    $('#view_block').html(d);
                }
            });

            $.ajax({
                url:"http://localhost/WebHousing/index.php/admin/Room_allotment_master/fetch_stud",
                type:"post",
                data:{hostel_id:hostel_id},
                success:function(d){
                    // alert(d);
                    $('#view_stud').html(d);
                }
            });
        }
    });

    //selecting block & fatching room accroding to hostels name
    $(document).on('change','#block',function(){
        var block_id = $(this).val();
        // alert(block_id);
        if (block_id == "-1") {
            alert("please Select block");

        }else{
            $.ajax({
                url:"http://localhost/WebHousing/index.php/admin/Hostel_room_master/fetch_room",
                type:"post",
                data:{block_id:block_id},
                success:function(d){
                    // alert(d);
                    $('#room').html(d);
                }
            });
        }
    });

    $(document).on('change','#room_allocation_block',function(){
        var block_id = $(this).val();
        // alert(block_id);
        if (block_id == "-1") {
            alert("please Select block");

        }else{
            $.ajax({
                url:"http://localhost/WebHousing/index.php/admin/Hostel_room_master/fetch_room",
                type:"post",
                data:{block_id:block_id},
                success:function(d){
                    // alert(d);
                    $('#room_allocation_room').html(d);
                }
            });
        }
    });

    $(document).on('change','#edit_block',function(){
        var block_id = $(this).val();
        if (block_id == "-1") {
            alert("please Select block");

        }else{
            $.ajax({
                url:"http://localhost/WebHousing/index.php/admin/Hostel_room_master/fetch_room",
                type:"post",
                data:{block_id:block_id},
                success:function(d){
                    // alert(d);
                    $('#edit_room').html(d);
                }
            });
        }
    });

    $(document).on('change','#view_block',function(){
        var block_id = $(this).val();
        if (block_id == "-1") {
            alert("please Select block");

        }else{
            $.ajax({
                url:"http://localhost/WebHousing/index.php/admin/Hostel_room_master/fetch_room",
                type:"post",
                data:{block_id:block_id},
                success:function(d){
                    // alert(d);
                    $('#view_room').html(d);
                }
            });
        }
    });

    //fetching room details
    $(document).on('change','#room',function(){
        var room_id = $(this).val();
        if (room_id == "-1") {
            alert("please Select room");

        }else{
            $.ajax({
                url:"http://localhost/WebHousing/index.php/admin/Hostel_room_master/fetch",
                method:"post",
                data:{room_id:room_id},
                success:function(d){
                    // alert(d);
                    var jsonobj =$.parseJSON(d);
                    $('#total_no_of_stud').val(jsonobj.room_beds);
                    $('#room_type').val(jsonobj.room_type);
                }
            });
        }
    });

    $(document).on('change','#room_allocation_room',function(){
        var room_id = $(this).val();
        if (room_id == "-1") {
            alert("please Select room");
            $('#total_no_of_stud').val(null);
            $('#room_type').val(null);

        }else{
            $.ajax({
                url:"http://localhost/WebHousing/index.php/admin/Hostel_room_master/fetch",
                method:"post",
                data:{room_id:room_id},
                success:function(d){
                    // alert(d);
                    var jsonobj =$.parseJSON(d);
                    $('#total_no_of_stud').val(jsonobj.room_beds);
                    $('#room_type').val(jsonobj.room_type);
                }
            });
        }
    });

    //fetching data for tiffin attendance master
    $(document).on('change','#attendance_reg_id',function(){
        var reg_id = $(this).val();
        // alert(reg_id);
        if (reg_id == "-1") {
            alert("please Select Client");

        }else{
            $.ajax({
                url:"http://localhost/WebHousing/index.php/admin/Tifin_attendance_master/fetch_tiffin",
                type:"post",
                data:{reg_id:reg_id},
                success:function(data){
                    var jsonobj =$.parseJSON(data);
                    $('#tiffin_id').val(jsonobj.tiffin_id);
                    $('#a_meal_type').val(jsonobj.meal_type);
                    $('#a_meal_week').val(jsonobj.meal_week);
                    $('#a_meal_qty').val(jsonobj.meal_qty);
                }
            });
        }
    });

    // For Admin Ins up del
    $(document).on('click','.e_admin',function(){
        var admin_id = $(this).attr('id'); 
            $.ajax({
                url:"http://localhost/WebHousing/index.php/admin/Admin_panel/fetch_admin",
                method:"post",
                data:{admin_id:admin_id},
                success:function(d){
                    // alert(d);
                    var jsonobj =$.parseJSON(d);
                    $('#edit_a_id').val(jsonobj.admin_id);
                    $('#edit_username').val(jsonobj.admin_username);
                    $('#edit_passwd').val(jsonobj.admin_passwd);
                    $('#edit_type').val(jsonobj.admin_type);
                    $('#old_admin_profile').val(jsonobj.admin_profile);
                    $('#admin_profile').html("<img height='auto' width='100%' alt='Employee Profile' class='img-thumbnail' src='http://localhost/WebHousing/images/admin_profile/"+jsonobj.admin_profile+"'>");
                    $('#adminedit').modal('show');
                }
            });
    });

    // view
    $(document).on('click','.viewadmin',function(){
        var admin_id = $(this).attr('id'); 
            $.ajax({
                url:"http://localhost/WebHousing/index.php/admin/Admin_panel/fetch_admin",
                method:"post",
                data:{admin_id:admin_id},
                success:function(d){
                    // alert(d);
                    var jsonobj =$.parseJSON(d);
                    $('#view_a_id').val(jsonobj.admin_id);
                    $('#view_username').val(jsonobj.admin_username);
                    $('#view_passwd').val(jsonobj.admin_passwd);
                    $('#view_type').val(jsonobj.admin_type);
                    $('#view_profile').html("<img height='auto' width='100%' alt='Employee Profile' class='img-thumbnail' src='http://localhost/WebHousing/images/admin_profile/"+jsonobj.admin_profile+"'>");
                    $('#viewadmin').modal('show');
                }
            });
    });
    // delete
     $(document).on('click','.d_admin',function(){
        var admin_id = $(this).attr('id');
        // alert(admin_id);
        $.ajax({
                url:"http://localhost/WebHousing/index.php/admin/admin_panel/delete_admin",
                method:"post",
                data:{admin_id:admin_id},
                success:function(d){
                    // alert(d);
                    window.location.reload();
                }
            });
    });

//------------------- Fetch ,Update & Delete for Country_mater  -------------------// 
    $(document).on('click','.e_country',function(){
        var country_id = $(this).attr('id'); 
         //alert(country_id);
            $.ajax({
                url:"http://localhost/WebHousing/index.php/admin/Country_master/fetch_country",
                method:"post",
                data:{country_id:country_id},
                success:function(d){
                  //alert(d);
                   var jsonobj =$.parseJSON(d);
                   //alert(jsonobj.country_name);
                    $('#country_name').val(jsonobj.c_name);
                    $('#country_id').val(jsonobj.c_id);
                    $('#editCountrymodal').modal('show');
                }
            });
    });

    $(document).on('click','.v_country',function(){
        var country_id = $(this).attr('id'); 
         //alert(country_id);
            $.ajax({
                url:"http://localhost/WebHousing/index.php/admin/Country_master/fetch_country",
                method:"post",
                data:{country_id:country_id},
                success:function(d){
                  //alert(d);
                   var jsonobj =$.parseJSON(d);
                   //alert(jsonobj.country_name);
                    $('#view_country_name').val(jsonobj.c_name);
                    $('#view_country_id').val(jsonobj.c_id);
                    $('#viewCountrymodal').modal('show');
                }
            });
    });

    // Delete country record
    $(document).on('click','.del_country',function(){
        var country_id = $(this).attr('id');
        //alert(c_id);
        $.ajax({
                url:"http://localhost/WebHousing/index.php/admin/country_master/delete_country",
                method:"post",
                data:{country_id:country_id},
                success:function(d){
                    window.location.reload();
                }
            });
    });

    //------------------- Fetch ,Update & Delete for State_mater  -------------------// 

        $(document).on('change','.sm_country_id',function(){

            var cid = $(this).val();
            // alert(cid);
            if(cid == "-1")
            {
                alert('Please Select Country');
            }

        });

        $(document).on('click','.del_state',function(){
            var state_id = $(this).attr('id');
            // alert(state_id);
            $.ajax({
                url:"http://localhost/WebHousing/index.php/admin/state_master/delete_state",
                method:"post",
                data:{state_id:state_id},
                success:function(d){
                    window.location.reload();
                }
            });
        }); 

        $(document).on('click','.fetch_state',function(){
            var state_id = $(this).attr('id');
            // alert(state_id);
            $.ajax({
                url:"http://localhost/WebHousing/index.php/admin/state_master/fetch_state",
                method:"post",
                data:{state_id:state_id},
                success:function(d){
                    //alert(d);
                    var jsonobj =$.parseJSON(d);
                    $('#s_id').val(jsonobj.state_id);
                    $('#s_name').val(jsonobj.state_name);
                    $('#c_id').val(jsonobj.country_id);
                    $('#editState').modal('show');
                }
            });
        });

        $(document).on('click','.v_state',function(){
            var state_id = $(this).attr('id');
            // alert(state_id);
            $.ajax({
                url:"http://localhost/WebHousing/index.php/admin/state_master/fetch_state",
                method:"post",
                data:{state_id:state_id},
                success:function(d){
                    //alert(d);
                    var jsonobj =$.parseJSON(d);
                    $('#view_s_id').val(jsonobj.state_id);
                    $('#view_s_name').val(jsonobj.state_name);
                    $('#view_c_id').val(jsonobj.country_id);
                    $('#viewState').modal('show');
                }
            });
        });

        //------------------- Fetch ,Update & Delete for State_mater  -------------------// 

        $(document).on('change','#country_id',function(){

            var cid = $(this).val();
            // alert(cid);
            if(cid == "-1")
            {
                alert('Please Select Country');
            }
            else
            {
                $.ajax({
                    url:"http://localhost/WebHousing/index.php/admin/city_master/fetch_country",
                    method:"post",
                    data:{cid:cid},
                    success:function(d){
                        $('#state_id').html(d);
                    }
                });
            }

        });

        $(document).on('click','.del_city',function(){
            var city_id = $(this).attr('id');
            // alert(state_id);
            $.ajax({
                url:"http://localhost/WebHousing/index.php/admin/city_master/delete_city",
                method:"post",
                data:{city_id:city_id},
                success:function(d){
                    window.location.reload();
                }
            });
        }); 

        $(document).on('click','.fetch_city',function(){
            var city_id = $(this).attr('id');
            // alert(city_id);
            $.ajax({
                url:"http://localhost/WebHousing/index.php/admin/city_master/fetch_city_data",
                method:"post",
                data:{city_id:city_id},
                success:function(d){
                    // alert(d);
                    var jsonobj =$.parseJSON(d);
                    $('#edit_country_id').val(jsonobj.country_id);
                    $('#edit_state_id').val(jsonobj.state_id);
                    $('#edit_city_name').val(jsonobj.city_name);
                    $('#edit_city_id').val(jsonobj.city_id);
                    $('#editCity').modal('show');
                }
            });
        });

        $(document).on('click','.v_city',function(){
            var city_id = $(this).attr('id');
            // alert(city_id);
            $.ajax({
                url:"http://localhost/WebHousing/index.php/admin/city_master/fetch_city_data",
                method:"post",
                data:{city_id:city_id},
                success:function(d){
                    //alert(d);
                    var jsonobj =$.parseJSON(d);
                    $('#view_country_id').val(jsonobj.country_id);
                    $('#view_state_id').val(jsonobj.state_id);
                    $('#view_city_name').val(jsonobj.city_name);
                    $('#view_city_id').val(jsonobj.city_id);
                    $('#viewCity').modal('show');
                }
            });
        });

    //------------------- for College_master Fetch ,Update & Delete-------------------// 

        //Delete
        $(document).on('click','.d_clg',function(){
            var clg_id = $(this).attr('id');
            // alert(clg_id);
            $.ajax({
                url:"http://localhost/WebHousing/index.php/admin/college_master/delete",
                method:"post",
                data:{clg_id:clg_id},
                success:function(d){
                    window.location.reload();
                }
            });
        }); 

        //Fetch
        $(document).on('click','.viewclg',function(){
            var clg_id = $(this).attr('id');
            //alert(clg_id);
            $.ajax({
                url:"http://localhost/WebHousing/index.php/admin/college_master/fetch",
                method:"post",
                data:{clg_id:clg_id},
                success:function(d){
                    //alert(d);
                    var jsonobj =$.parseJSON(d);
                    $('#cllg_name').val(jsonobj.clg_name);
                    $('#cllg_address').val(jsonobj.clg_address);
                    $('#cllg_pincode').val(jsonobj.clg_pincode);
                    $('#view_state').val(jsonobj.state_id);
                    $('#view_city').val(jsonobj.city_id);
                    $('#cllg_phone').val(jsonobj.clg_phone);
                    $('#viewclg').modal('show');
                }
            });
        });

        //Edit
        $(document).on('click','.e_clg',function(){
            var clg_id = $(this).attr('id');
            // alert(clg_id);
            $.ajax({
                url:"http://localhost/WebHousing/index.php/admin/college_master/fetch",
                method:"post",
                data:{clg_id:clg_id},
                success:function(d){
                    //alert(d);
                    var jsonobj =$.parseJSON(d);
                    $('#colg_id').val(jsonobj.clg_id);
                    $('#colg_name').val(jsonobj.clg_name);
                    $('#colg_address').val(jsonobj.clg_address);
                    $('#colg_pincode').val(jsonobj.clg_pincode);
                    $('#edit_state').val(jsonobj.state_id);
                    $('#edit_city').val(jsonobj.city_id);
                    $('#colg_phone').val(jsonobj.clg_phone);
                    $('#clgedit').modal('show');
                }
            });
        });

        //------------------- for Hostel_mater Fetch ,Update & Delete-------------------// 

        //Delete
        $(document).on('click','.d_hostel',function(){
            var hostel_id = $(this).attr('id');
            // alert(hostel_id);
            $.ajax({
                url:"http://localhost/WebHousing/index.php/admin/hostel_master/delete",
                method:"post",
                data:{hostel_id:hostel_id},
                success:function(d){
                    window.location.reload();
                }
            });
        }); 

        //Fetch or view
        $(document).on('click','.viewhostel',function(){
            var hostel_id = $(this).attr('id');
            // alert(hostel_id);
            $.ajax({
                url:"http://localhost/WebHousing/index.php/admin/hostel_master/fetch",
                method:"post",
                data:{hostel_id:hostel_id},
                success:function(d){
                    var jsonobj =$.parseJSON(d);
                    // alert(jsonobj.hostel_image.length);
                    $('#view_hostel_name').val(jsonobj.hostel_name);
                    $('#view_hostel_address').val(jsonobj.hostel_address);
                    $('#view_hostel_pincode').val(jsonobj.hostel_pincode);
                    $('#view_hostel_phone').val(jsonobj.hostel_phone);
                    $('#view_city').val(jsonobj.city_id);
                    $('#view_state').val(jsonobj.state_id);
                    $('#view_hostel_rent').val(jsonobj.hostel_rent);
                    $('#view_hostel_photo').html("<img style='max-height: 100px;max-width: 100px;' alt='Hostel image' class='img-thumbnail' src='http://localhost/WebHousing/images/hostel_image/"+jsonobj.hostel_image+"'>");
                    
                    $('#viewhostel').modal('show');
                }
            });
        });

        //Edit
        $(document).on('click','.e_hostel',function(){
            var hostel_id = $(this).attr('id');
            // alert(hostel_id);
            $.ajax({
                url:"http://localhost/WebHousing/index.php/admin/hostel_master/fetch",
                method:"post",
                data:{hostel_id:hostel_id},
                success:function(d){
                    // alert(d);
                    var jsonobj =$.parseJSON(d);
                    $('#edit_hostel_id').val(jsonobj.hostel_id);
                    $('#edit_hostel_name').val(jsonobj.hostel_name);
                    $('#edit_hostel_address').val(jsonobj.hostel_address);
                    $('#edit_hostel_pincode').val(jsonobj.hostel_pincode);
                    $('#edit_hostel_phone').val(jsonobj.hostel_phone);
                    $('#edit_city').val(jsonobj.city_id);
                    $('#edit_state').val(jsonobj.state_id);
                    $('#edit_hostel_rent').val(jsonobj.hostel_rent);
                    $('#old_hostel_photos').val(jsonobj.array);
                    
                    $('#old_view_hostel_photos').html("<img style='max-height: 100px;max-width: 100px;' alt='Hostel image' class='img-thumbnail' src='http://localhost/WebHousing/images/hostel_image/"+jsonobj.hostel_image+"'>");
                   
                    $('#hosteledit').modal('show');
                }
            });
        });

        //------------------- for Employee_mater Fetch ,Update & Delete-------------------// 

        //Delete
        $(document).on('click','.d_emp',function(){
            var emp_id = $(this).attr('id');
            // alert(emp_id);
            $.ajax({
                url:"http://localhost/WebHousing/index.php/admin/employee_master/delete",
                method:"post",
                data:{emp_id:emp_id},
                success:function(d){
                    window.location.reload();
                }
            });
        }); 

        //Fetch or view
        $(document).on('click','.viewemp',function(){
            var emp_id = $(this).attr('id');
            //alert(emp_id);
            $.ajax({
                url:"http://localhost/WebHousing/index.php/admin/employee_master/fetch",
                method:"post",
                data:{emp_id:emp_id},
                success:function(d){
                    //alert(d);
                    var jsonobj =$.parseJSON(d);
                    $('#view_emp_id').val(jsonobj.emp_id);
                    $('#view_hostel_id').val(jsonobj.hostel_id);
                    $('#view_block_id').val(jsonobj.block_id);
                    $('#view_emp_name').val(jsonobj.emp_name);
                    $('#view_emp_email').val(jsonobj.emp_email);
                    $('#edit_emp_gender').val(jsonobj.emp_gender);
                    $('#view_emp_dob').val(jsonobj.emp_dob);
                    $('#view_emp_doj').val(jsonobj.emp_doj);
                    $('#view_emp_desig').val(jsonobj.emp_desig);
                    $('#view_emp_address').val(jsonobj.emp_address);
                    $('#view_emp_salary').val(jsonobj.emp_salary);
                    // alert(jsonobj.emp_profile);
                    $('#view_emp_profile').html("<img alt='Employee Profile' class='img-thumbnail' style='max-height:200px;width:auto;margin-right:auto;margin-left:auto;display: block;' src='http://localhost/WebHousing/images/emp_profile/"+jsonobj.emp_profile+"'>");
                    $('#viewemp').modal('show');
                }
            });
        });

        //Edit
        $(document).on('click','.e_emp',function(){
            var emp_id = $(this).attr('id');
            //alert(emp_id);
            $.ajax({
                url:"http://localhost/WebHousing/index.php/admin/employee_master/fetch",
                method:"post",
                data:{emp_id:emp_id},
                success:function(d){
                    // alert(d);
                    var jsonobj =$.parseJSON(d);
                    $('#edit_emp_id').val(jsonobj.emp_id);
                    $('#edit_hostel').val(jsonobj.hostel_id);
                    $('#edit_block').val(jsonobj.block_id);
                    $('#edit_emp_name').val(jsonobj.emp_name);
                    $('#edit_emp_email').val(jsonobj.emp_email);
                    $('#edit_emp_gender').val(jsonobj.emp_gender);
                    $('#edit_emp_dob').val(jsonobj.emp_dob);
                    $('#edit_emp_doj').val(jsonobj.emp_doj);
                    $('#edit_emp_desig').val(jsonobj.emp_desig);
                    $('#edit_emp_address').val(jsonobj.emp_address);
                    $('#edit_emp_salary').val(jsonobj.emp_salary);
                    $('#old_emp_profile').val(jsonobj.emp_profile);
                    // alert(jsonobj.emp_profile);
                    $('#show_emp_profile').html("<img style='max-height:200px;width:auto;' alt='Employee Profile' class='img-thumbnail' src='http://localhost/WebHousing/images/emp_profile/"+jsonobj.emp_profile+"'>");
                    $('#editemp').modal('show');
                }
            });
        });

        //------------------- for reg_mater Fetch ,Update & Delete-------------------//
        //Delete
        $(document).on('click','.d_reg',function(){
            var reg_id = $(this).attr('id');
            // alert(reg_id);
            $.ajax({
                url:"http://localhost/WebHousing/index.php/admin/Student_master/delete",
                method:"post",
                data:{reg_id:reg_id},
                success:function(d){
                    window.location.reload();
                }
            });
        }); 

        //Fetch or view
        $(document).on('click','.viewreg',function(){
            var reg_id = $(this).attr('id');
            //alert(reg_id);
            $.ajax({
                url:"http://localhost/WebHousing/index.php/admin/Student_master/fetch",
                method:"post",
                data:{reg_id:reg_id},
                success:function(d){
                    // alert(d);
                    var jsonobj =$.parseJSON(d);
                    // $('#view_emp_id').val(jsonobj.emp_id);
                    $('#view_reg_name').val(jsonobj.reg_name);
                    $('#view_reg_email').val(jsonobj.reg_email);
                    $('#view_reg_passwd').val(jsonobj.reg_passwd);
                    if (jsonobj.reg_gender == "Male") {
                        $('#view_reg_gender1').attr("checked",true);
                    }else if(jsonobj.reg_gender == "Female"){
                        $('#view_reg_gender2').attr("checked",true);
                    }
                    $('#view_reg_dob').val(jsonobj.reg_dob);
                    $('#view_clg_id').val(jsonobj.clg_id);
                    $('#view_reg_blood_grp').val(jsonobj.reg_blood_grp);
                    $('#view_reg_type').val(jsonobj.reg_type);
                    $('#view_reg_mobile').val(jsonobj.reg_mobile);
                    $('#view_reg_address').val(jsonobj.reg_address);
                    $('#view_state').val(jsonobj.state_id);
                    $('#view_city').val(jsonobj.city_id);
                    // alert(jsonobj.emp_profile);
                    $('#view_reg_stud_profile').html("<img height='auto' width='100%' alt='reg Profile' class='img-thumbnail' src='http://localhost/WebHousing/images/reg_profile/"+jsonobj.reg_stud_profile+"'>");
                    $('#view_reg_gov_proof').html("<img height='auto' width='100%' alt='reg_gov_proof' class='img-thumbnail' src='http://localhost/WebHousing/images/reg_gov_proof/"+jsonobj.reg_gov_proof+"'>");
                    $('#viewreg').modal('show');
                }
            });
        });

        //Edit
        $(document).on('click','.e_reg',function(){
            var reg_id = $(this).attr('id');
            //alert(reg_id);
            $.ajax({
                url:"http://localhost/WebHousing/index.php/admin/Student_master/fetch",
                method:"post",
                data:{reg_id:reg_id},
                success:function(d){
                    // alert(d);
                    var jsonobj =$.parseJSON(d);
                    $('#reg_id_stud').val(jsonobj.reg_id);
                    $('#edit_reg_name').val(jsonobj.reg_name);
                    $('#edit_reg_email').val(jsonobj.reg_email);
                    $('#edit_reg_passwd').val(jsonobj.reg_passwd);
                    if (jsonobj.reg_gender == "Male") {
                        $('#edit_reg_gender1').attr("checked",true);
                    }else if(jsonobj.reg_gender == "Female"){
                        $('#edit_reg_gender2').attr("checked",true);
                    }
                    $('#edit_reg_dob').val(jsonobj.reg_dob);
                    $('#edit_clg_id').val(jsonobj.clg_id);
                    $('#edit_reg_blood_grp').val(jsonobj.reg_blood_grp);
                    $('#edit_reg_type').val(jsonobj.reg_type);
                    $('#edit_reg_mobile').val(jsonobj.reg_mobile);
                    $('#edit_reg_address').val(jsonobj.reg_address);
                    $('#edit_state').val(jsonobj.state_id);
                    $('#edit_city').val(jsonobj.city_id);
                    $('#reg_gov_proof_stud').val(jsonobj.reg_gov_proof);
                    $('#reg_profile_stud').val(jsonobj.reg_stud_profile);
                    $('#old_reg_profile_stud').html("<img height='350px' width='300px' alt='reg Profile' class='img-thumbnail' src='http://localhost/WebHousing/images/reg_profile/"+jsonobj.reg_stud_profile+"'>");
                    $('#old_reg_gov_proof_stud').html("<img height='350px' width='300px' alt='reg_gov_proof' class='img-thumbnail' src='http://localhost/WebHousing/images/reg_gov_proof/"+jsonobj.reg_gov_proof+"'>");
                    $('#editreg').modal('show');
                }
            });
        });


//---------------- For Room's View, Update & Delete -------------------------------//
    $(document).on('click','.viewroom',function(){
        var room_id = $(this).attr('id'); 
        //alert(room_id);
            $.ajax({
                url:"http://localhost/WebHousing/index.php/admin/Hostel_room_master/fetch",
                method:"post",
                data:{room_id:room_id},
                success:function(d){
                    // alert(d);
                    var jsonobj =$.parseJSON(d);
                    $('#view_hostel').val(jsonobj.hostel_id);
                    $('#view_block').val(jsonobj.block_id);
                    $('#view_room_beds').val(jsonobj.room_beds);
                    $('#view_room_type').val(jsonobj.room_type);
                    $('#view_room_detail').val(jsonobj.room_details);
                    $('#viewroom').modal('show');
                }
            });
    });

    // Edit
    $(document).on('click','.e_room',function(){
        var room_id = $(this).attr('id'); 
        // alert(room_id);
            $.ajax({
                url:"http://localhost/WebHousing/index.php/admin/Hostel_room_master/fetch",
                method:"post",
                data:{room_id:room_id},
                success:function(d){
                    // alert(d);
                    var jsonobj =$.parseJSON(d);
                    $('#edit_room_id').val(jsonobj.room_id);
                    $('#edit_hostel').val(jsonobj.hostel_id);
                    $('#edit_block').val(jsonobj.block_id);
                    $('#edit_room_beds').val(jsonobj.room_beds);
                    $('#edit_room_type').val(jsonobj.room_type);
                    $('#edit_room_detail').val(jsonobj.room_details);
                    $('#editroom').modal('show');
                }
            });
    });
    // delete
     $(document).on('click','.d_room',function(){
        var room_id = $(this).attr('id');
        //alert(a_id);
        $.ajax({
                url:"http://localhost/WebHousing/index.php/admin/Hostel_room_master/delete",
                method:"post",
                data:{room_id:room_id},
                success:function(d){
                    window.location.reload();
                }
            });
    });

     //------------------- for Hostel_block_master Fetch ,Update & Delete-------------------// 

        //Delete
        $(document).on('click','.d_block',function(){
            var block_id = $(this).attr('id');
            // alert(block_id);
            $.ajax({
                url:"http://localhost/WebHousing/index.php/admin/hostel_block_master/delete",
                method:"post",
                data:{block_id:block_id},
                success:function(d){
                    window.location.reload();
                }
            });
        }); 

        //Fetch or view
        $(document).on('click','.viewblock',function(){
            var block_id = $(this).attr('id');
            //alert(block_id);
            $.ajax({
                url:"http://localhost/WebHousing/index.php/admin/hostel_block_master/fetch",
                method:"post",
                data:{block_id:block_id},
                success:function(d){
                    //alert(d);
                    var jsonobj =$.parseJSON(d);
                    $('#view_block_name').val(jsonobj.block_name);
                    $('#view_block_division').val(jsonobj.block_division);
                    $('#view_block_status').val(jsonobj.block_status);
                    $('#view_hostel').val(jsonobj.hostel_id);
                    $('#viewblock').modal('show');
                }
            });
        });

        //Edit
        $(document).on('click','.e_block',function(){
            var block_id = $(this).attr('id');
            //alert(block_id);
            $.ajax({
                url:"http://localhost/WebHousing/index.php/admin/hostel_block_master/fetch",
                method:"post",
                data:{block_id:block_id},
                success:function(d){
                    //alert(d);
                    var jsonobj =$.parseJSON(d);
                    $('#edit_block_id').val(jsonobj.block_id);
                    $('#edit_block_name').val(jsonobj.block_name);
                    $('#edit_block_division').val(jsonobj.block_division);
                    $('#edit_block_status').val(jsonobj.block_status);
                    $('#edit_hostel').val(jsonobj.hostel_id);
                    $('#editblock').modal('show');
                }
            });
        });


         //------------------- for Hostel_block_master Fetch ,Update & Delete-------------------// 

        //Delete
        $(document).on('click','.d_asset',function(){
            var asset_id = $(this).attr('id');
            // alert(asset_id);
            $.ajax({
                url:"http://localhost/WebHousing/index.php/admin/hostel_assets_master/delete",
                method:"post",
                data:{asset_id:asset_id},
                success:function(d){
                    window.location.reload();
                }
            });
        }); 

        //Fetch or view
        $(document).on('click','.viewasset',function(){
            var asset_id = $(this).attr('id');
            //alert(asset_id);
            $.ajax({
                url:"http://localhost/WebHousing/index.php/admin/hostel_assets_master/fetch",
                method:"post",
                data:{asset_id:asset_id},
                success:function(d){
                    // alert(d);
                    var jsonobj =$.parseJSON(d);
                    $('#view_asset_name').val(jsonobj.assets_name);
                    $('#view_asset_qty').val(jsonobj.assets_qty);
                    $('#view_asset_mrp').val(jsonobj.price_per_qty);
                    $('#view_asset_total_price').val(jsonobj.total_price);
                    $('#view_hostel_name').val(jsonobj.hostel_id);
                    $('#viewblock').modal('show');
                }
            });
        });

        //Edit
        $(document).on('click','.e_asset',function(){
            var asset_id = $(this).attr('id');
            //alert(asset_id);
            $.ajax({
                url:"http://localhost/WebHousing/index.php/admin/hostel_assets_master/fetch",
                method:"post",
                data:{asset_id:asset_id},
                success:function(d){
                    // alert(d);
                    var jsonobj =$.parseJSON(d);
                    $('#edit_asset_id').val(jsonobj.assets_id);
                    $('#edit_asset_name').val(jsonobj.assets_name);
                    $('#edit_asset_qty').val(jsonobj.assets_qty);
                    $('#edit_asset_mrp').val(jsonobj.price_per_qty);
                    $('#edit_hostel_name').val(jsonobj.hostel_id);
                    $('#viewblock').modal('show');
                }
            });
        });

         //------------------- for Hostel_event_master Fetch ,Update & Delete-------------------// 
        //Delete
        $(document).on('click','.d_event',function(){
            var event_id = $(this).attr('id');
            // alert(event_id);
            $.ajax({
                url:"http://localhost/WebHousing/index.php/admin/hostel_event_master/delete",
                method:"post",
                data:{event_id:event_id},
                success:function(d){
                    window.location.reload();
                }
            });
        }); 

        //Fetch or view
        $(document).on('click','.viewevent',function(){
            var event_id = $(this).attr('id');
            // alert(event_id);
            $.ajax({
                url:"http://localhost/WebHousing/index.php/admin/hostel_event_master/fetch",
                method:"post",
                data:{event_id:event_id},
                success:function(d){
                    // alert(d);
                    var jsonobj =$.parseJSON(d);
                    $('#view_event_name').val(jsonobj.event_name);
                    $('#view_event_detail').val(jsonobj.event_description);
                    for($i=0;$i<jsonobj.event_photos.length - 1;$i++)
                    {
                        $('#view_event_photos').append("<img height='auto' width='100%' alt='event image' class='img-thumbnail' src='http://localhost/WebHousing/images/event_images/"+jsonobj.event_photos[$i]+"'>");
                    }
                    $('#view_event_date').val(jsonobj.event_date);
                    $('#view_event_time').val(jsonobj.event_time);
                    $('#viewevent').modal('show');
                }
            });
        });

        //Edit
        $(document).on('click','.e_event',function(){
            var event_id = $(this).attr('id');
            // alert(event_id);
            $.ajax({
                url:"http://localhost/WebHousing/index.php/admin/hostel_event_master/fetch",
                method:"post",
                data:{event_id:event_id},
                success:function(d){
                    // alert(d);
                    var jsonobj = null;
                    jsonobj =$.parseJSON(d);
                    $('#edit_event_id').val(jsonobj.event_id);
                    $('#edit_event_name').val(jsonobj.event_name);
                    $('#edit_event_detail').val(jsonobj.event_description);
                    $('#edit_event_photos').val(jsonobj.event_photos);
                    $('#e_event_date').val(jsonobj.event_date);
                    $('#e_event_time').val(jsonobj.event_time);
                    $('#editevent').modal('show');
                }
            });
        });

//------------------- Fetch ,Update & Delete for Mess_card_mater  -------------------//

    $(document).on('click','.viewmess',function(){
        var mess_id = $(this).attr('id'); 
        //alert(mess_id);
            $.ajax({
                url:"http://localhost/WebHousing/index.php/admin/Messcard_master/fetch",
                method:"post",
                data:{mess_id:mess_id},
                success:function(d){
                    var jsonobj =$.parseJSON(d);
                    //$('#mess_id').val(jsonobj.mess_card_id);
                    $('#view_mess_stud').val(jsonobj.reg_id);
                    $('#view_mess_start_date').val(jsonobj.mess_start_date);
                    $('#view_mess_end_date').val(jsonobj.mess_end_date);
                    $('#viewmesscard').modal('show');   
                }
            });
    });

    // view
    $(document).on('click','.e_mess',function(){
        var mess_id = $(this).attr('id'); 
        // alert(mess_id);
            $.ajax({
                url:"http://localhost/WebHousing/index.php/admin/Messcard_master/fetch",
                method:"post",
                data:{mess_id:mess_id},
                success:function(d){
                    var jsonobj =$.parseJSON(d);
                    $('#mess_id').val(jsonobj.mess_card_id);
                    $('#edit_mess_stud').val(jsonobj.reg_id);
                    $('#edit_mess_start_date').val(jsonobj.mess_start_date);
                    $('#edit_mess_end_date').val(jsonobj.mess_end_date);
                    $('#editmesscard').modal('show');   
                }
            });
    });
    // delete
     $(document).on('click','.d_mess',function(){
        var mess_id = $(this).attr('id');
        // alert(mess_id);
        $.ajax({
                url:"http://localhost/WebHousing/index.php/admin/Messcard_master/delete",
                method:"post",
                data:{mess_id:mess_id},
                success:function(d){
                    window.location.reload();
                }
            });
    });

//------------------- Fetch ,Update & Delete for tifin_source_mater  -------------------//

    $(document).on('click','.v_source',function(){
        var tifin_source_id = $(this).attr('id'); 
        //alert(tifin_source_id);
            $.ajax({
                url:"http://localhost/WebHousing/index.php/admin/tifin_source_master/fetch",
                method:"post",
                data:{tifin_source_id:tifin_source_id},
                success:function(d){
                    var jsonobj =$.parseJSON(d);
                    // alert(jsonobj);
                    //$('#edit_source_id').val(jsonobj.edit_source_id);
                    $('#view_source_name').val(jsonobj.tifin_source_name);
                    $('#view_source_address').val(jsonobj.tifin_source_address);
                    $('#view_source_phone').val(jsonobj.tifin_source_phone);
                    $('#viewsource').modal('show');   
                }
            });
    });

    // view
    $(document).on('click','.e_source',function(){
        var tifin_source_id = $(this).attr('id'); 
        // alert(tifin_source_id);
            $.ajax({
                url:"http://localhost/WebHousing/index.php/admin/tifin_source_master/fetch",
                method:"post",
                data:{tifin_source_id:tifin_source_id},
                success:function(d){
                    // alert(d);
                    var jsonobj =$.parseJSON(d);
                    // alert(jsonobj);
                    $('#edit_source_id').val(jsonobj.tifin_source_id);
                    $('#edit_source_name').val(jsonobj.tifin_source_name);
                    $('#edit_source_address').val(jsonobj.tifin_source_address);
                    $('#edit_source_phone').val(jsonobj.tifin_source_phone);
                    $('#editsource').modal('show');
                }
            });
    });
    // delete
     $(document).on('click','.d_source',function(){
        var tifin_source_id = $(this).attr('id');
        // alert(tifin_source_id);
        $.ajax({
                url:"http://localhost/WebHousing/index.php/admin/tifin_source_master/delete",
                method:"post",
                data:{tifin_source_id:tifin_source_id},
                success:function(d){
                    window.location.reload();
                }
            });
    });


//------------------- Fetch ,Update & Delete for landlord_master  -------------------//

    $(document).on('click','.v_owner',function(){
        var landlord_id = $(this).attr('id'); 
        // alert(landlord_id);
            $.ajax({
                url:"http://localhost/WebHousing/index.php/admin/PG_owner_master/fetch",
                method:"post",
                data:{landlord_id:landlord_id},
                success:function(d){
                    var jsonobj =$.parseJSON(d);
                    // alert(d);
                    $('#view_owner_name').val(jsonobj.landlord_name);
                    $('#view_owner_email').val(jsonobj.landlord_email);
                    $('#view_owner_pass').val(jsonobj.landlord_password);
                    $('#view_owner_mno').val(jsonobj.landlord_mobile);
                    $('#view_owner_add').val(jsonobj.landlord_address);
                    $('#view_state').val(jsonobj.state_id);
                    $('#view_city').val(jsonobj.city_id);
                    $('#view_landlord_bill_proof').html("<img height='350px' width='300px' alt='reg_gov_proof' class='img-thumbnail' src='http://localhost/WebHousing/images/landlord_bill_proof/"+jsonobj.landlord_bill_proof+"'>");
                    $('#view_landlord_profile').html("<img height='350px' width='300px' alt='reg_gov_proof' class='img-thumbnail' src='http://localhost/WebHousing/images/landlord_profile/"+jsonobj.landlord_profile+"'>");
                    $('#viewowner').modal('show');   
                }
            });
    });

    // view
    $(document).on('click','.e_owner',function(){
        var landlord_id = $(this).attr('id'); 
        // alert(landlord_id);
            $.ajax({
                url:"http://localhost/WebHousing/index.php/admin/PG_owner_master/fetch",
                method:"post",
                data:{landlord_id:landlord_id},
                success:function(d){
                    var jsonobj =$.parseJSON(d);
                    // alert(d);
                    $('#edit_owner_id').val(jsonobj.landlord_id);
                    $('#edit_owner_name').val(jsonobj.landlord_name);
                    $('#edit_owner_email').val(jsonobj.landlord_email);
                    $('#edit_owner_pass').val(jsonobj.landlord_password);
                    $('#edit_owner_mno').val(jsonobj.landlord_mobile);
                    $('#edit_owner_add').val(jsonobj.landlord_address);
                    $('#edit_state').val(jsonobj.state_id);
                    $('#edit_city').val(jsonobj.city_id);
                    $('#landlord_profile_old').val(jsonobj.landlord_profile);
                    $('#landlord_bill_proof_old').val(jsonobj.landlord_bill_proof);
                    $('#old_landlord_bill_proof').html("<img height='350px' width='300px' alt='reg_gov_proof' class='img-thumbnail' src='http://localhost/WebHousing/images/landlord_bill_proof/"+jsonobj.landlord_bill_proof+"'>");
                    $('#old_landlord_profile').html("<img height='350px' width='300px' alt='reg_gov_proof' class='img-thumbnail' src='http://localhost/WebHousing/images/landlord_profile/"+jsonobj.landlord_profile+"'>");
                    $('#editowner').modal('show');
                }
            });
    });
    // delete
     $(document).on('click','.d_owner',function(){
        var landlord_id = $(this).attr('id');
        // alert(landlord_id);
        $.ajax({
                url:"http://localhost/WebHousing/index.php/admin/PG_owner_master/delete",
                method:"post",
                data:{landlord_id:landlord_id},
                success:function(d){
                     window.location.reload();
                }
            });
    });

//------------------- Fetch ,Update & Delete for Client_master  -------------------//

    $(document).on('click','.v_client',function(){
        var client_id = $(this).attr('id'); 
        alert(client_id);
            $.ajax({
                url:"http://localhost/WebHousing/index.php/admin/Client_master/fetch",
                method:"post",
                data:{client_id:client_id},
                success:function(d){
                    var jsonobj =$.parseJSON(d);
                    // alert(d);
                    $('#view_client_name').val(jsonobj.client_name);
                    $('#view_client_email').val(jsonobj.client_email);
                    $('#view_client_passwd').val(jsonobj.client_password);
                    if (jsonobj.client_gender == "Male") {
                        $('#view_client_gender1').attr("checked",true);
                    }else if(jsonobj.client_gender == "Female"){
                        $('#view_client_gender2').attr("checked",true);
                    }
                    $('#view_client_add').val(jsonobj.client_address);
                    $('#view_state').val(jsonobj.state_id);
                    $('#view_city').val(jsonobj.city_id);
                    $('#view_old_client_gov_proof').html("<img height='350px' width='300px' alt='reg_gov_proof' class='img-thumbnail' src='http://localhost/WebHousing/images/client_gov_proof/"+jsonobj.client_gov_proof+"'>");
                    $('#view_old_client_profile').html("<img height='350px' width='300px' alt='reg_gov_proof' class='img-thumbnail' src='http://localhost/WebHousing/images/client_profile/"+jsonobj.client_profile+"'>");
                    $('#viewclient').modal('show');   
                }
            });
    });

    // view
    $(document).on('click','.e_client',function(){
        var client_id = $(this).attr('id'); 
        // alert(client_id);
            $.ajax({
                url:"http://localhost/WebHousing/index.php/admin/Client_master/fetch",
                method:"post",
                data:{client_id:client_id},
                success:function(d){
                    var jsonobj =$.parseJSON(d);
                    // alert(d);
                    $('#edit_client_id').val(jsonobj.client_id);
                    $('#edit_client_name').val(jsonobj.client_name);
                    $('#edit_client_email').val(jsonobj.client_email);
                    $('#edit_client_passwd').val(jsonobj.client_password);
                    if (jsonobj.client_gender == "Male") {
                        $('#edit_client_gender1').attr("checked",true);
                    }else if(jsonobj.client_gender == "Female"){
                        $('#edit_client_gender2').attr("checked",true);
                    }
                    $('#edit_client_add').val(jsonobj.client_address);
                    $('#edit_state').val(jsonobj.state_id);
                    $('#edit_city').val(jsonobj.city_id);
                    $('#old_client_gov_proof').val(jsonobj.client_gov_proof);
                    $('#old_client_profile').val(jsonobj.client_profile);
                    $('#gov_proof').html("<img height='350px' width='300px' alt='reg_gov_proof' class='img-thumbnail' src='http://localhost/WebHousing/images/client_gov_proof/"+jsonobj.client_gov_proof+"'>");
                    $('#profile').html("<img height='350px' width='300px' alt='reg_gov_proof' class='img-thumbnail' src='http://localhost/WebHousing/images/client_profile/"+jsonobj.client_profile+"'>");
                    $('#editclient').modal('show');   
                }
            });
    });
    // delete
     $(document).on('click','.d_client',function(){
        var client_id = $(this).attr('id');
        // alert(client_id);
        $.ajax({
                url:"http://localhost/WebHousing/index.php/admin/Client_master/delete",
                method:"post",
                data:{client_id:client_id},
                success:function(d){
                     window.location.reload();
                }
            });
    });


        
         //------------------- for Hostel_event_master Fetch ,Update & Delete-------------------// 
        //Delete
        $(document).on('click','.d_pg',function(){
            var pg_id = $(this).attr('id');
            // alert(pg_id);
            $.ajax({
                url:"http://localhost/WebHousing/index.php/admin/PG_detail_master/delete",
                method:"post",
                data:{pg_id:pg_id},
                success:function(d){
                    window.location.reload();
                }
            });
        }); 

        //Fetch or view
        $(document).on('click','.v_pg',function(){
            var pg_id = $(this).attr('id');
            // alert(pg_id);
            $.ajax({
                url:"http://localhost/WebHousing/index.php/admin/PG_detail_master/fetch",
                method:"post",
                data:{pg_id:pg_id},
                success:function(d){
                    // alert(d);
                    var jsonobj =$.parseJSON(d);
                    $('#view_pg_id').val(jsonobj.pg_id);
                    $('#view_pg_owner_name').val(jsonobj.landlord_name);
                    $('#view_pg_add').val(jsonobj.pg_address);
                    $('#view_pg_details').val(jsonobj.pg_details);
                    $('#view_display_pg_photo').html("<img height='auto' width='100%' alt='event image' class='img-thumbnail' src='http://localhost/WebHousing/images/pg_photos/"+jsonobj.pg_photo+"'>");
                    $('#photo').val(jsonobj.pg_photo);
                    $('#view_state').val(jsonobj.state_id);
                    $('#view_city').val(jsonobj.city_id);
                    $('#view_pg_rent').val(jsonobj.pg_rent);
                    $('#viewpg').modal('show');
                }
            });
        });

        //Edit
        $(document).on('click','.e_pg',function(){
            var pg_id = $(this).attr('id');
            // alert(pg_id);
            $.ajax({
                url:"http://localhost/WebHousing/index.php/admin/PG_detail_master/fetch",
                method:"post",
                data:{pg_id:pg_id},
                success:function(d){
                    // alert(d);
                    var jsonobj =$.parseJSON(d);
                    $('#edit_pg_id').val(jsonobj.pg_id);
                    $('#edit_pg_owner_name').val(jsonobj.landlord_name);
                    $('#edit_pg_add').val(jsonobj.pg_address);
                    $('#edit_pg_details').val(jsonobj.pg_details);
                    $('#display_pg_photo').html("<img height='auto' width='100%' alt='event image' class='img-thumbnail' src='http://localhost/WebHousing/images/pg_photos/"+jsonobj.pg_photo+"'>");
                    $('#photo').val(jsonobj.pg_photo);
                    $('#edit_state').val(jsonobj.state_id);
                    $('#edit_city').val(jsonobj.city_id);
                    $('#edit_pg_rent').val(jsonobj.pg_rent);
                    $('#editpg').modal('show');
                }
            });
        });  

        // fetching data from hostel_bill_master for Student_fees_master view
        $(document).on('change','#hostel_id',function(){
            // alert('hi');
            var hostel_id = $(this).val();
            if (hostel_id=='-1') 
            {
                alert('Please select hostel');
                $('#reg_id').prop('disabled' , true);
            }
            else
            {
                $.ajax({
                    url:"http://localhost/WebHousing/index.php/admin/Student_fees_master/fetch_stud",
                    method:"post",
                    data:{hostel_id:hostel_id},
                    success:function(rsl){
                        // alert(rsl);
                        $('#reg_id').html(rsl);
                        $('#reg_id').prop('disabled' , false);
                    }
                });
            }
        });

        $(document).on('change','#reg_id',function(){
            // alert('hi');
            var reg_id = $(this).val();
            if (reg_id=='-1') 
            {
                alert('Please select Student name');
            }
            else
            {
                $.ajax({
                    url:"http://localhost/WebHousing/index.php/admin/Student_fees_master/fetch_stud_details",
                    method:"post",
                    data:{reg_id:reg_id},
                    success:function(rsl){
                        // alert(rsl);
                        var jsonobj =$.parseJSON(rsl);
                        // alert(jsonobj);
                        $('#reg_email').val(jsonobj.reg_email);
                        $('#bill_booking_date').val(jsonobj.hostel_booking_date);
                        $('#bill_status').val(jsonobj.bill_status);
                        $('#bill_amount').val(jsonobj.bill_amount);
                    }
                });
            }
        });

        // fetching data for pg_bill_master
        $(document).on('change','#pg_reg_id',function(){
            // alert('hi');
            var reg_id = $(this).val();
            if (reg_id=='-1') 
            {
                alert('Please select Client Name');
            }
            else
            {
                // alert('hii');
                $.ajax({
                    url:"http://localhost/WebHousing/index.php/admin/Client_bill_master/fetch_client",
                    method:"post",
                    data:{reg_id:reg_id},
                    success:function(rsl){
                        // alert(rsl);
                        var jsonobj = $.parseJSON(rsl);
                        $('#reg_email').val(jsonobj.reg_email);
                        $('#landlord_id').val(jsonobj.landlord_id);
                        $('#pg_id').val(jsonobj.pg_id);
                        $('#bill_status').val(jsonobj.pg_payment_status);
                        $('#bill_amount').val(jsonobj.pg_amount);
                        $('#pg_booking_date').val(jsonobj.pg_booking_date);
                    }
                });
            }
        });

        // fetching data for Tiffin_bill_master
        $(document).on('change','#tiffin_reg_id',function(){
            // alert('hi');
            var reg_id = $(this).val();
            if (reg_id=='-1') 
            {
                alert('Please select Client Name');
            }
            else
            {
                // alert('hii');
                $.ajax({
                    url:"http://localhost/WebHousing/index.php/admin/Tiffin_bill_master/fetch_client",
                    method:"post",
                    data:{reg_id:reg_id},
                    success:function(rsl){
                        // alert(rsl);
                        var jsonobj = $.parseJSON(rsl);
                        $('#reg_email').val(jsonobj.reg_email);
                        $('#tiffin_id').val(jsonobj.tiffin_id);
                        $('#meal_amount').val(jsonobj.meal_amount);
                        $('#meal_date').val(jsonobj.meal_date);
                    }
                });
            }
        });

        // fetching data from hostel_bill_master for Student_fees_master view
        $(document).on('change','#messcard_hostel_id',function(){
            // alert('hi');
            var hostel_id = $(this).val();
            if (hostel_id=='-1') 
            {
                alert('Please select hostel');
                $('#messcard_reg_id').prop('disabled' , true);
            }
            else
            {
                $.ajax({
                    url:"http://localhost/WebHousing/index.php/admin/Student_fees_master/fetch_stud",
                    method:"post",
                    data:{hostel_id:hostel_id},
                    success:function(rsl){
                        // alert(rsl);
                        $('#messcard_reg_id').html(rsl);
                        $('#messcard_reg_id').prop('disabled' , false);
                    }
                });
            }
        });

        //fetching data for mess_card_bill_master
        $(document).on('change','#messcard_reg_id',function(){
            // alert('hi');
            var reg_id = $(this).val();
            if (reg_id=='-1') 
            {
                alert('Please select Student name');
            }
            else
            {
                $.ajax({
                    url:"http://localhost/WebHousing/index.php/admin/Messcard_bill_master/fetch_stud_details",
                    method:"post",
                    data:{reg_id:reg_id},
                    success:function(rsl){
                        // alert(rsl);
                        var jsonobj =$.parseJSON(rsl);
                        // alert(jsonobj);
                        $('#reg_email').val(jsonobj.reg_email);
                        $('#messcard_id').val(jsonobj.mess_card_id);
                        $('#mess_card_duration').val(jsonobj.mess_card_duration);
                        $('#mess_card_amount').val(jsonobj.mess_card_amount);
                    }
                });
            }
        });   

});


// ===== Scroll to Top ==== 
        $(window).scroll(function() {
            if ($(this).scrollTop() >= 50) {        // If page is scrolled more than 50px
                $('#return-to-top').fadeIn(300);    // Fade in the arrow
            } else {
                $('#return-to-top').fadeOut(300);   // Else fade out the arrow
            }
        });
        $(document).on('click','#return-to-top',function() {      // When arrow is clicked
            $('body,html').animate({
                scrollTop : 0                       // Scroll to top of body
            }, 500);
        });


$(function() {
    "use strict";
//sidebar menu js
$.sidebarMenu($('.sidebar-menu'));

// === toggle-menu js
$(".toggle-menu").on("click", function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });	 
	   
// === sidebar menu activation js

$(function() {
        for (var i = window.location, o = $(".sidebar-menu a").filter(function() {
            return this.href == i;
        }).addClass("active").parent().addClass("active"); ;) {
            if (!o.is("li")) break;
            o = o.parent().addClass("in").parent().addClass("active");
        }
    }), 	   	   

$(function () {
  $('[data-toggle="popover"]').popover()
})


$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})


	 
});
 