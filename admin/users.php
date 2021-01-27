<?php
include 'header.php';
include 'sidbar.php';
include 'db.php';



mysqli_set_charset($conn ,'utf8');
$sql_user = "SELECT * FROM `users`";
$user = mysqli_query($conn,$sql_user);


?>

<!-- End Container fluid  -->

<div class="container-fluid">
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-block">
                    <div id="edit">
                        <button type="button" name="adddata" id="add" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@getbootstrap">
                             اضافة مسخدم
                            </button>
                    </div>

                    <div id="user_table">

                    <table class="table table-bordered table-responsive">
                        <thead>
                        <tr>
                            <td width="70%">الاسم</td>
                            <td width="15%">تعديل</td>
                            <td width="15%">عرض</td>
                            <td width="15%">حذف</td>
                        </tr>
                        </thead>
                        <tbody>
                        <?php

                        while($rows = mysqli_fetch_assoc($user)){?>
                          <tr>
                              <td><?= $rows['name'] ?></td>
                              <td><input type="button" name="edit" value="تعديل" id="<?php echo $rows["user_id"]; ?>" class="btn btn-info btn-xs edit_data btn-warning" /></td>
                              <td><input type="button" name="view" value="عرض" id="<?php echo $rows["user_id"]; ?>" class="btn btn-info btn-xs view_data btn-secondary" /></td>
                              <td><input type="button" name="delete" value="حذف" class="btn btn-info bt-xs delete_data btn-danger" id="<?php echo $rows["user_id"]; ?>"></td>

                          </tr>

                        <?php  } ?>
                        </tbody>
                    </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

    <!--view user -->

    <div id="dataModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">بيانات المستخدم </h4>
                </div>
                <div class="modal-body" id="employee_detail">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>




<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
               <h3 id="modal-header"></h3>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="form-horizontal form-material modal-body" id="insert_form" method="post">
                    <div id="news">
                        <h1></h1>
                    </div>
                    <div class="form-group">
                        <label class="col-md-12">اسم المستخدم</label>
                        <div class="col-md-12">
                            <input type="text" name="name" id="name"   placeholder="" class="form-control form-control-line">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-12">البريد الالكتروني</label>
                        <div class="col-md-12">
                            <input type="email"  name="email" id="email"   placeholder="" class="form-control form-control-line">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-12">كلمة المرور</label>
                        <div class="col-md-12">
                            <input type="password" name="password" id="password"  class="form-control form-control-line">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-12">تأكيد كلمة المرور</label>
                        <div class="col-md-12">
                            <input type="password" name="confirm_password" id="confirm_password"   class="form-control form-control-line">
                        </div>
                    </div>
                    <div id="check" style="text-align: center">

                    </div>

                    <div class="form-group">
                        <div class="col-sm-12">
                            <input type="hidden" name="user_id" id="user_id" />
                            <input class="btn btn-success" name="insert" id="insert" type="submit">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">اغلاق</button>

                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>

<script>
    $('#password, #confirm_password').on('keyup', function () {
        if ($('#password').val() == $('#confirm_password').val()) {
            $('#check').html('كلمة المرور صحيحة').css('color', 'green');
        } else
            $('#check').html('الرجاء التأكد من كلمة المرور').css('color', 'red');
    });
</script>

<script>
    $(document).ready(function(){
        $('#add').click(function(){
            $('#insert').val("Add");
            $('#insert_form')[0].reset();
            $('#modal-header').html('اضافة مستخدم');
        });
        $(document).on('click', '.edit_data', function(){
            var user_id = $(this).attr("id");
            $.ajax({
                url:"fetch/fetchUser.php",
                method:"POST",
                data:{user_id:user_id},
                dataType:"json",
                success:function(data){
                    $('#user_id').val(data.user_id);
                    $('#name').val(data.name);
                    $('#email').val(data.email);
                    $('#password').val(data.password);
                    $('#confirm_password').val(data.confirm_password);
                    $('#insert').val("Edit");
                    $('#modal-header').html('تعديل بيانات المستخدم');
                    $('#exampleModal').modal('show');
                }
            });
        });
        $('#insert_form').on("submit", function(event){
            event.preventDefault();
            if($('#name').val() == "")
            {
                alert("الرجاء ادخل اسم المستخدم");
            }
            else if($('#email').val() == '')
            {
                alert("الرجاء ادخل الايميل");
            }
            else if($('#password').val() == '')
            {
                alert("الرجاء ادخل كلمة المرور");
            }
            else if($('#confirm_password').val() == '')
            {
                alert(" تأكيد كلمة المرور");
            }


            else
            {
                $.ajax({
                    url:"add&edit/add&editUser.php",
                    method:"POST",
                    data:$('#insert_form').serialize(),
                    beforeSend:function(){
                        $('#insert').val("Add");
                    },
                    success:function(data){
                        $('#insert_form')[0].reset();
                        $('#user_table').html(data);
                    }
                });
            }


        });

        $(document).on('click', '.view_data', function(){
            var user_id = $(this).attr("id");
            $.ajax({
                url:"view/viewUser.php",
                method:"post",
                data:{user_id:user_id},
                success:function(data){
                    $('#employee_detail').html(data);
                    $('#dataModal').modal("show");
                }
            });
        });

        $(document).on('click', '.delete_data', function(){
            var user_id = $(this).attr("id");
            var $ele = $(this).parent().parent();

            if(confirm("هل أنت متأكد من عملية الحذف"))
            {
                $.ajax({
                    url:"delete/deleteUser.php",
                    method:"post",
                    data:{user_id:user_id},
                    success:function(data)
                    {
                        if(data=="YES"){
                            $ele.fadeOut().remove();
                        }else{
                            alert("can't delete the row")
                        }

                    }
                })
            }
            else
            {
                return false;
            }
        });


    });
</script>

    <?php
    include 'footer.php';
    ?>
