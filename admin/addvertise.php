<?php
include 'header.php';
include 'sidbar.php';
$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'admin';
$conn = mysqli_connect($host, $user, $pass, $db);
mysqli_set_charset($conn,'utf8');
mysqli_query($conn,"SET NAMES 'utf8'");


mysqli_set_charset($conn ,'utf8');
$sql = "SELECT addvertise_id,title FROM `addvertise`";
$addvertise = mysqli_query($conn,$sql);



$sql_course = "SELECT * FROM `course`";
$course = mysqli_query($conn,$sql_course);

?>

<!-- End Container fluid  -->
<div class="container-fluid">
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-block">
                    <div id="edit">
                    <form action="" method="post">

                        <button type="button" name="adddata" id="add" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@getbootstrap">
                            اضافة اعلان
                        </button>
                         </form>

                    </div>
                    <div id="addvertise_table">
                    <table class="table table-bordered table-responsive">
                        <thead>
                        <tr>
                            <td width="70%">عنوان الاعلان</td>
                            <td width="15%">تعديل</td>
                            <td width="15%">عرض</td>
                            <td width="15%">حذف</td>
                        </tr>
                        </thead>
                        <tbody>
                        <?php

                        while($rows = mysqli_fetch_assoc($addvertise)){?>
                            <tr>
                                <td><?php echo $rows["title"]; ?></td>
                                <td><input type="button" name="edit" value="تعديل" id="<?php echo $rows["addvertise_id"]; ?>" class="btn btn-info btn-xs edit_data btn-warning" /></td>
                                <td><input type="button" name="view" value="عرض" id="<?php echo $rows["addvertise_id"]; ?>" class="btn btn-info btn-xs view_data btn-secondary" /></td>
                                <td><input type="button" name="delete" value="حذف" class="btn btn-info bt-xs delete_data btn-danger" id="<?php echo $rows["addvertise_id"]; ?>"></td>

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
<!-- ***************************end view data*****************************************************************-->
    <div id="dataModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">تفاصيل الاعلان</h4>
                </div>
                <div class="modal-body" id="employee_detail">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

<!-- *************************** form edit data*****************************************************************-->
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
                <form class="form-horizontal form-material"  method="post" id="insert_form" enctype="multipart/form-data">

                    <div class="form-group">
                        <label class="col-md-12">العنوان</label>
                        <div class="col-md-12">
                            <select id="title" name="title" class="form-control">
                                <?php

                                while($rows = mysqli_fetch_assoc($course)){?>
                                    <option value="<?= $rows['name'] ?>"><?= $rows['name'] ?></option>

                                <?php   } ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-12">تفاصيل الاعلان</label>
                        <div class="col-md-12">
                            <textarea name="details" id="details" cols="4" rows="4" class="form-control form-control-line">

                            </textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-12">تاريخ النشر</label>
                        <div class="col-md-12">
                            <input type="date" name="publish_date" id="publish_date" class="form-control form-control-line">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-12">صورة الخبر</label>
                        <div class="col-md-12">
                            <input type="file" name="image" id="image" class="form-control-file">

                        </div>
                    </div>

                    <div class="form-group">
                        <label >هل تريد تفعيل الخبر ؟ </label>

                        <select name="is_active" id="is_active" class="form-control form-control-line">
                            <option value="" >هل تريد تفعيل الخبر ؟  </option>
                            <option value="نعم" >نعم</option>
                            <option value="لا" >لا</option>

                        </select>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-12">
                            <input type="hidden" name="addvertise_id" id="addvertise_id" />
                            <input type="hidden" name="action" id="action" value="insert" />
                            <input class="btn btn-success" type="submit" id="insert" name="insert">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">اغلاق</button>

                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
    </div>
<!-- ***************************end form edit data*****************************************************************-->
<script>
    $(document).ready(function(){

        fetch_data();

        function fetch_data()
        {
            var action = "fetch";
            $.ajax({
                url:"add&edit/add&editAddvertise.php",
                method:"POST",
                data:{action:action},
                success:function(data)
                {
                    $('#addvertise_table').html(data);
                }
            })
        }

        $('#add').click(function(){
            $('#exampleModal').modal('show');
            $('#insert_form')[0].reset();
            $('#addvertise_id').val('');
            $('#action').val('insert');
            $('#insert').val("Add");
            $('#modal-header').html('اضافة اعلان');
        });
        $('#insert_form').submit(function(event){
            event.preventDefault();
            var image_name = $('#image').val();

            if($('#title').val() == "")
            {
                alert("الرجاء ادخل عنوان الاعلان");
            }
            else if($('#details').val() == '')
            {
                alert("الرجاء ادخل تفاصيل الاعلان");
            }
            else if(image_name == '')
            {
                alert("الرجاء ادخل صورة الاعلان");
            }
            else if($('#publish_date').val() == '')
            {
                alert("الرجاء ادخل تاريخ نشر الاعلان");
            }
            else if($('#is_active').val() == '')
            {
                alert("هل تريد تفعيل الاعلان ؟ ");
            }

            else
            {
                var extension = $('#image').val().split('.').pop().toLowerCase();
                if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1)
                {
                    alert("Invalid Image File");
                    $('#image').val('');
                    return false;
                }
                else
                {
                    $.ajax({
                        url:"add&edit/add&editAddvertise.php",
                        method:"POST",
                        data:new FormData(this),
                        contentType:false,
                        processData:false,
                        success:function(data)
                        {
                            fetch_data();
                            $('#insert_form')[0].reset();
                            $('#addvertise_table').html(data);
                        }
                    });
                }
            }
        });
        $(document).on('click', '.edit_data', function(){
            var addvertise_id = $(this).attr("id");

            $.ajax({
                url:"fetch/fetchAddvertise.php",
                method:"POST",
                data:{addvertise_id:addvertise_id},
                dataType:"json",
                success:function(data){
                    $('#addvertise_id').val(data.addvertise_id);
                    $('#title').val(data.title);
                    $('#details').val(data.details);
                    $('#publish_date').val(data.publish_date);
                    $('#is_active').val(data.is_active);
                    $('#action').val("update");
                    $('#insert').val("Edit");
                    $('#modal-header').html('تعديل الاعلان');
                    $('#exampleModal').modal('show');
                }
            });
        });
        $(document).on('click', '.view_data', function(){
            var addvertise_id = $(this).attr("id");
            $.ajax({
                url:"view/viewAddvertise.php",
                method:"post",
                data:{addvertise_id:addvertise_id},
                success:function(data){
                    $('#employee_detail').html(data);
                    $('#dataModal').modal("show");
                }
            });
        });

        $(document).on('click', '.delete_data', function(){
            var addvertise_id = $(this).attr("id");
            var $ele = $(this).parent().parent();

            if(confirm("هل أنت متأكد من عملية الحذف"))
            {
                $.ajax({
                    url:"delete/deleteAddvertise.php",
                    method:"post",
                    data:{addvertise_id:addvertise_id},
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


<!-- ***************************end form add data*****************************************************************-->


    <!-- Row -->
    <!-- ============================================================== -->
    <!-- End PAge Content -->
    <!-- ============================================================== -->






    <?php
    include 'footer.php';
    ?>

