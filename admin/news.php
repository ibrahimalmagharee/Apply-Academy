<?php
include 'header.php';
include 'sidbar.php';
include 'db.php';



mysqli_set_charset($conn ,'utf8');


$sql = "SELECT * FROM `news`";
$news = mysqli_query($conn,$sql);






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
                               اضافة خبر
                            </button>

                    </div>
                    <div id="news_table">
                    <table class="table table-bordered table-responsive">
                        <thead>
                        <tr>
                            <td width="70%"> عنوان الخبر </td>
                            <td width="15%">تعديل</td>
                            <td width="15%">عرض</td>
                            <td width="15%">حذف</td>

                        </tr>
                        </thead>
                        <tbody>
                        <?php

                        while($rows = mysqli_fetch_assoc($news)){?>
                            <tr>
                                <td><?= $rows['title'] ?></td>
                                <td><input type="button" name="edit" value="تعديل" id="<?php echo $rows["news_id"]; ?>" class="btn btn-info btn-xs edit_data btn-warning" /></td>
                                <td><input type="button" name="view" value="عرض" id="<?php echo $rows["news_id"]; ?>" class="btn btn-info btn-xs view_data btn-secondary" /></td>
                                <td><input type="button" name="delete" value="حذف" class="btn btn-info bt-xs delete_data btn-danger" id="<?php echo $rows["news_id"]; ?>"></td>

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
                    <h4 class="modal-title">تفاصيل الخبر</h4>
                </div>
                <div class="modal-body" id="employee_detail">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>


    <!-- *************************** form add data*****************************************************************-->
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
                <form class="form-horizontal form-material" id="insert_form" method="post" enctype="multipart/form-data">

                    <div class="form-group">
                        <label class="col-md-12">العنوان</label>
                        <div class="col-md-12">
                            <input type="text" name="title" id="title" placeholder="" class="form-control form-control-line">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-12">تفاصيل الخبر</label>
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
                            <input type="hidden" name="action" id="action" value="insert" />
                            <input type="hidden" name="news_id" id="news_id" />
                            <input class="btn btn-success" name="insert" id="insert" type="submit">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">اغلاق</button>

                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
<!-- ***************************end form add data*****************************************************************-->

<script>
    $(document).ready(function(){

        fetch_data();

        function fetch_data()
        {
            var action = "fetch";
            $.ajax({
                url:"add&edit/add&editNews.php",
                method:"POST",
                data:{action:action},
                success:function(data)
                {
                    $('#news_table').html(data);
                }
            })
        }

        $('#add').click(function(){
            $('#exampleModal').modal('show');
            $('#insert_form')[0].reset();
            $('#news_id').val('');
            $('#action').val('insert');
            $('#insert').val("Add");
            $('#modal-header').html('اضافة خبر');
        });
        $('#insert_form').submit(function(event){
            event.preventDefault();
            var image_name = $('#image').val();

            if($('#title').val() == "")
            {
                alert("الرجاء ادخل عنوان الخبر");
            }
            else if($('#details').val() == '')
            {
                alert("الرجاء ادخل تفاصيل الخبر");
            }
            else if(image_name == '')
            {
                alert("الرجاء ادخل صورة الخبر");
            }
            else if($('#publish_date').val() == '')
            {
                alert("الرجاء ادخل تاريخ نشر الخبر");
            }
            else if($('#is_active').val() == '')
            {
                alert("هل تريد تفعيل الخبر ؟ ");
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
                        url:"add&edit/add&editNews.php",
                        method:"POST",
                        data:new FormData(this),
                        contentType:false,
                        processData:false,
                        success:function(data)
                        {
                            fetch_data();
                            $('#insert_form')[0].reset();
                            $('#news_table').html(data);
                        }
                    });
                }
            }
        });
        $(document).on('click', '.edit_data', function(){
            var news_id = $(this).attr("id");

            $.ajax({
                url:"fetch/fetchNews.php",
                method:"POST",
                data:{news_id:news_id},
                dataType:"json",
                success:function(data){
                    $('#news_id').val(data.news_id);
                    $('#title').val(data.title);
                    $('#details').val(data.details);
                    $('#publish_date').val(data.publish_date);
                    $('#is_active').val(data.is_active);
                    $('#action').val("update");
                    $('#insert').val("Edit");
                    $('#modal-header').html('تعديل الخبر');
                    $('#exampleModal').modal('show');
                }
            });
        });
        $(document).on('click', '.view_data', function(){
            var news_id = $(this).attr("id");
            $.ajax({
                url:"view/viewNews.php",
                method:"post",
                data:{news_id:news_id},
                success:function(data){
                    $('#employee_detail').html(data);
                    $('#dataModal').modal("show");
                }
            });
        });

        $(document).on('click', '.delete_data', function(){
            var news_id = $(this).attr("id");
            var $ele = $(this).parent().parent();

            if(confirm("هل أنت متأكد من عملية الحذف"))
            {
                $.ajax({
                    url:"delete/deleteNews.php",
                    method:"post",
                    data:{news_id:news_id},
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

