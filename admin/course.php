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
                        <button type="button"  name="adddata" id="add" class="btn btn-outline-success" data-toggle="modal" data-target="#exampleModal" data-whatever="@getbootstrap">

                            اضافة دورة
                            <i class="fa-plus-circle"></i>
                            </button>
                        <i class="fad fa-plus-hexagon"></i>

                    </div>
                    <div id="course_table" style="margin: 10px;">
                    <table class="table table-bordered table-responsive">
                        <tr>
                            <td width="70%">اسم الدورة</td>
                            <td width="15%">تعديل</td>
                            <td width="15%">عرض</td>
                            <td width="15%">حذف</td>
                        </tr>

                        <tbody>
                        <?php

                        while($rows = mysqli_fetch_assoc($course)){?>
                            <tr>
                                <td><?= $rows['name'] ?></td>
                                <td><input type="button" name="edit" value="تعديل" id="<?php echo $rows["course_id"]; ?>" class="btn btn-info btn-xs edit_data btn-warning" /></td>
                                <td><input type="button" name="view" value="عرض" id="<?php echo $rows["course_id"]; ?>" class="btn btn-info btn-xs view_data btn-secondary" /></td>
                                <td><input type="button" name="delete" value="حذف" id="<?php echo $rows["course_id"]; ?>" class="btn btn-info bt-xs delete_data btn-danger"></td>
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

<!--view course -->

<div id="dataModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">تفاصيل الدورة</h4>
            </div>
            <div class="modal-body" id="employee_detail">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


<!--form add  data -->
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
                <form class="form-horizontal form-material modal-body" id="insert_form" method="post" enctype="multipart/form-data" >
                    <div id="news">
                        <h1></h1>
                    </div>
                    <div class="form-group">
                        <label class="col-md-12">اسم الدورة</label>
                        <div class="col-md-12">
                            <input type="text" name="name" id="name"   placeholder="" class="form-control form-control-line">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-12">الفئة المستهدفة</label>
                        <div class="col-md-12">
                            <input type="text"  name="target" id="target"   placeholder="" class="form-control form-control-line">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-12">محاور الدورة</label>
                        <div class="col-md-12">
                            <input type="text" name="subject" id="subject"   class="form-control form-control-line">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-12">أهداف الدورة</label>
                        <div class="col-md-12">
                            <input type="text" name="objects" id="objects"  class="form-control form-control-line">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-12">مدة الدورة</label>
                        <div class="col-md-12">
                            <input type="text" name="period" id="period"   class="form-control form-control-line">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-12">مخرجات الدورة</label>
                        <div class="col-md-12">
                            <input type="text" name="outcomes" id="outcomes"   class="form-control form-control-line">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-12">مميزات الدورة</label>
                        <div class="col-md-12">
                            <input type="text" name="advantage" id="advantage"   class="form-control form-control-line">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-12">
                            <input type="hidden" name="course_id" id="course_id" />
                            <input class="btn btn-success" name="insert" id="insert" type="submit">
                         
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">اغلاق</button>

                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
<!--end form add  data -->

<script>
    $(document).ready(function(){
        $('#add').click(function(){
            $('#insert').val("Add");
            $('#insert_form')[0].reset();
            $('#modal-header').html('اضافة دورة');
        });
        $(document).on('click', '.edit_data', function(){
            var course_id = $(this).attr("id");
            $.ajax({
                url:"fetch/fetchCourse.php",
                method:"POST",
                data:{course_id:course_id},
                dataType:"json",
                success:function(data){
                    $('#course_id').val(data.course_id);
                    $('#name').val(data.name);
                    $('#target').val(data.target);
                    $('#subject').val(data.subject);
                    $('#objects').val(data.objects);
                    $('#period').val(data.period);
                    $('#outcomes').val(data.outcomes);
                    $('#advantage').val(data.advantage);
                    $('#insert').val("Edit");
                    $('#modal-header').html('تعديل دورة');
                    $('#exampleModal').modal('show');
                }
            });
        });
        $('#insert_form').on("submit", function(event){
            event.preventDefault();
            if($('#name').val() == "")
            {
                alert("الرجاء ادخل اسم الدورة");
            }
            else if($('#target').val() == '')
            {
                alert("الرجاء ادخل الفئة المستهدفة");
            }
            else if($('#subject').val() == '')
            {
                alert("الرجاء ادخل محاور الدورة");
            }
            else if($('#objects').val() == '')
            {
                alert("الرجاء ادخل أهداف الدورة");
            }
            else if($('#period').val() == '')
            {
                alert("الرجاء ادخل مدة الدورة");
            }
            else if($('#outcomes').val() == '')
            {
                alert("الرجاء ادخل مخرجات الدورة");
            }
            else if($('#advantage').val() == '')
            {
                alert("الرجاء ادخل مميزات الدورة");
            }


            else
            {
                $.ajax({
                    url:"add&edit/add&editCourse.php",
                    method:"POST",
                    data:$('#insert_form').serialize(),
                    beforeSend:function(){
                        $('#insert').val("Add");
                    },
                    success:function(data){
                        $('#insert_form')[0].reset();
                        $('#course_table').html(data);
                    }
                });
            }


        });

        $(document).on('click', '.view_data', function(){
            var course_id = $(this).attr("id");
            $.ajax({
                url:"view/viewCourse.php",
                method:"post",
                data:{course_id:course_id},
                success:function(data){
                    $('#employee_detail').html(data);
                    $('#dataModal').modal("show");
                }
            });
        });

        $(document).on('click', '.delete_data', function(){
            var course_id = $(this).attr("id");
            var $ele = $(this).parent().parent();

            if(confirm("هل أنت متأكد من عملية الحذف"))
            {
                $.ajax({
                    url:"delete/deleteCourse.php",
                    method:"post",
                    data:{course_id:course_id},
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

