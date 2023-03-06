                <form>
                	<h3 class="float-left">Các bình luận mới</h3>
                	<button type="button" class="btn btn-light float-right mb-1" onclick="sendMessage();">Gửi bình luận</button>
                    <fieldset>
                        <div class="row">
                            <div class="col-sm-3 col-lg-2 hidden-xs">
                            	<img class="img-responsive" src="https://static2.yan.vn/YanNews/2167221/202102/facebook-cap-nhat-avatar-doi-voi-tai-khoan-khong-su-dung-anh-dai-dien-e4abd14d.jpg" alt="">
                            </div>
                            <div class="form-group col-xs-12 col-sm-9 col-lg-10">

                            	<input type="hidden" name="idsp" id="idsp" value="<?php echo $_GET['idsp']; ?>">

                            	<input type="text" name="name" class="form-control mb-1" id="name" placeholder="Tên của bạn" required="">
                                <textarea class="form-control" id="message" placeholder="Hãy để lại lời nhắn..." required=""></textarea> 
                            </div>
                        </div>  	
                    </fieldset>
                </form>
                
                <h3><?php echo count($data['selectAllCOm']); ?> Comments</h3>

<script>
	function sendMessage(){

		name = "";
		if($("#name").val() == ""){
			return $("input#name").after('<p class="text-danger">Bạn không được để trống tên</p>');
		}else{
			name = $("#name").val();
		}

		message = "";
		if($("#message").val() == ""){
			return $("textarea#message").after('<p class="text-danger">Bạn chưa bình luận</p>');
		}else{
			message = $("#message").val();
		}

		idsp = $("#idsp").val();

	    $.post('ajax/customer/comments.php?action=add',{ name,message,idsp }, function(data) {

	    	$("#name").val("");

	    	$("#message").val("");
				
			return $("textarea#message").after('<p class="text-danger">Cám ơn bạn, bình luận của bạn đang được chờ phê duyệt.</p>');

		});

	};
</script>
                <?php 

                	// if($)

                	if($data['selectAllCOm'] == []){
                		echo "Chưa có phản hồi cho sản phẩm này";
                	}else{
                	foreach ($data['selectAllCOm'] as $key => $value) {
                ?>

               <div class="media">
                    <a class="pull-left" href="#">
                    	<img class="media-object" src="https://static2.yan.vn/YanNews/2167221/202102/facebook-cap-nhat-avatar-doi-voi-tai-khoan-khong-su-dung-anh-dai-dien-e4abd14d.jpg" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading"><?php echo $value['ten']; ?></h4>
                        <p><?php echo $value['binh_luan']; ?>.</p>
                        <div class="row">
	                        <ul class="row col-md-6 list-unstyled list-inline media-detail pull-left">
                        		<li><i class="fa fa-calendar"></i><?php echo $value['thoigian_dang']; ?></li>
	                        </ul>
	                        <ul class="row col-md-6 list-unstyled list-inline media-detail">
	                            <li class=""><a href="" class="text-primary float-end">Reply</a></li>
	                        </ul>
                        </div>
                    </div>
                </div>

                <?php
                   	}
                   }
                ?>