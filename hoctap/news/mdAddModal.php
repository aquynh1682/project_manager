
<script src="./ckeditor/ckeditor.js"></script>
<div class="modal fade bd-example-modal-lg" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
            
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Thêm bài viết</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                <?php echo isset($error['note']) ? $error['note'] : ''; ?>
				<form action="upNews.php"  method="post" enctype="multipart/form-data">

					Tiêu đề: <?php echo isset($error['title']) ? $error['title'] : ''; ?><br>
					<input type="text" id="title" name="title" value="<?php echo isset($data['title']) ? $data['title'] : ''; ?>" class="form-control"><br>

					Nội dung: <?php echo isset($error['content']) ? $error['content'] : ''; ?><br>
					<textarea name="content" id="content"  rows="25" cols="93"><?php echo isset($data['title']) ? $data['title'] : ''; ?></textarea>
					<script>
						CKEDITOR.replace('content');
					</script>
					<br>

					Hình ảnh: <?php echo isset($error['image'] ) ? $error['image'] : ''; ?><br>
					<input name="fileToUpload"id="image" type="file"><br>

					Chuyên mục: <?php echo isset($error['category_id']) ? $error['category_id'] : ''; ?><br>
					<select name="category_id" id ="category_id">
					<?php echo $adminlib->get_dropdown_category($list_category, $value) ?>
					</select><br><br>
					
				</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" id="btnBack" type="button" data-dismiss="modal">Thoát</button>
                    <input type="submit" class="btn btn-primary" id="btnUpdate" value="Thêm bài viết" name="update_action">
                </div>
            </form>
            </div>
        </div>
    </div>