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
$sql_video = "SELECT * FROM `video`";
$video = mysqli_query($conn,$sql_video);


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
                            اضافة فيديو
                        </button>
                    </div>

                    <div id="video_table">

                        <table class="table table-bordered table-responsive">
                            <thead>
                            <tr>
                                <td width="70%">العنوان</td>
                                <td width="15%">تعديل</td>
                                <td width="15%">عرض</td>
                                <td width="15%">حذف</td>
                            </tr>
                            </thead>
                            <tbody>
                            <?php

                            while($rows = mysqli_fetch_assoc($video)){?>
                                <tr>
                                    <td><?= $rows['title'] ?></td>
                                    <td><input type="button" name="edit" value="تعديل" id="<?php echo $rows["video_id"]; ?>" class="btn btn-info btn-xs edit_data btn-warning" /></td>
                                    <td><input type="button" name="view" value="عرض" id="<?php echo $rows["video_id"]; ?>" class="btn btn-info btn-xs view_data btn-secondary" /></td>
                                    <td><input type="button" name="delete" value="حذف" class="btn btn-info bt-xs delete_data btn-danger" id="<?php echo $rows["video_id"]; ?>"></td>

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
                <h4 class="modal-title">بيانات الفيديو </h4>
            </div>
            <div class="modal-body" id="employee_detail">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">اغلاق</button>
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
                        <label class="col-md-12">عنوان الفيديو</label>
                        <div class="col-md-12">
                            <input type="text" name="title" id="title"   placeholder="" class="form-control form-control-line">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-12">رابط الفيديو</label>
                        <div class="col-md-12">
                            <input type="text"  name="url" id="url"   placeholder="" class="form-control form-control-line">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-12">الوصف</label>
                        <div class="col-md-12">
                            <input type="text" name="description" id="description"  class="form-control form-control-line">
                        </div>
                    </div>

                    <div class="form-group">
                        <label >هل تريد تفعيل الفيديو ؟ </label>

                        <select name="is_active" id="is_active" class="form-control form-control-line">
                            <option value="" >هل تريد تفعيل الفيديو ؟  </option>
                            <option value="نعم" >نعم</option>
                            <option value="لا" >لا</option>

                        </select>
                    </div>



                    <div class="form-group">
                        <div class="col-sm-12">
                            <input type="hidden" name="video_id" id="video_id" />
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
    $(document).ready(function(){
        $('#add').click(function(){
            $('#insert').val("Add");
            $('#insert_form')[0].reset();
            $('#modal-header').html('اضافة فيديو');
        });
        $(document).on('click', '.edit_data', function(){
            var video_id = $(this).attr("id");
            $.ajax({
                url:"fetch/fetchVideo.php",
                method:"POST",
                data:{video_id:video_id},
                dataType:"json",
                success:function(data){
                    $('#video_id').val(data.video_id);
                    $('#title').val(data.title);
                    $('#url').val(data.url);
                    $('#description').val(data.description);
                    $('#is_active').val(data.is_active);
                    $('#insert').val("Edit");
                    $('#modal-header').html('تعديل تفاصيل الفيديو');
                    $('#exampleModal').modal('show');
                }
            });
        });
        $('#insert_form').on("submit", function(event){
            event.preventDefault();
            if($('#title').val() == "")
            {
                alert("الرجاء ادخل عنوان الفيديو");
            }
            else if($('#url').val() == '')
            {
                alert("الرجاء رابط الفيديو");
            }
            else if($('#description').val() == '')
            {
                alert("الرجاء ادخل وصف الفيديو بشكل صحيح");
            }

            else if($('#is_active').val() == '')
            {
                alert("هل تريد تفعيل الفيديو ؟ ");
            }


            else
            {
                $.ajax({
                    url:"add&edit/add&editVideo.php",
                    method:"POST",
                    data:$('#insert_form').serialize(),
                    beforeSend:function(){
                        $('#insert').val("Add");
                    },
                    success:function(data){
                        $('#insert_form')[0].reset();
                        $('#video_table').html(data);
                    }
                });
            }


        });

        $(document).on('click', '.view_data', function(){
            var video_id = $(this).attr("id");
            $.ajax({
                url:"view/viewVideo.php",
                method:"post",
                data:{video_id:video_id},
                success:function(data){
                    $('#employee_detail').html(data);
                    $('#dataModal').modal("show");
                }
            });
        });

        $(document).on('click', '.delete_data', function(){
            var video_id = $(this).attr("id");
            var $ele = $(this).parent().parent();

            if(confirm("هل أنت متأكد من عملية الحذف"))
            {
                $.ajax({
                    url:"delete/deleteVideo.php",
                    method:"post",
                    data:{video_id:video_id},
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
