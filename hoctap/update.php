<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- start library -->
	<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
	<link rel="shortcut icon" href="./news/assets/images/21.png" />
	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	<!-- end library -->
	<title> Đăng bài</title>
	<style>
		#liveSearch {
			position: absolute;
			z-index: 1000;
			background: white;
			width: 320px;
			/* height: 400px; */
			border: 15px;
			cursor: pointer;
			overflow-y: auto;
		}
	</style>
</head>

<body>
	<div class="container">
		<div class="row">
			<div class="col-sm-4">
				<div class="input-group">
					<input type="text" class="form-control" placeholder="tìm kiếm" name="search" id="txtSearch" onkeyup="showSearch(this.value)" />
					<div class="input-group-btn">
						<button class="btn btn-primary" type="submit" id="btnSearch">
							<span class="glyphicon glyphicon-search"></span>
						</button>
					</div>
				</div>
				<div id="liveSearch" name="liveSearch"></div>
			</div>
			<!-- kết thúc tìm kiếm -->
			<div class="col-sm-2">
				<nav aria-label="Page navigation example">
					<ul class="pagination" style="margin:0px; padding-top:0; margin-left:20px" id="pagination">
					</ul>
				</nav>
			</div>
			<div class="col-sm-4 text-left">
				<h4><b><i>Đăng Các câu hỏi trắc nghiệm</i></b></h4>
			</div>
			<div class="col-sm-1 text-right">
				<button id="btnQuestion" class="btn btn-success">Thêm</button>
			</div>
			<div class="col-sm-1 text-right">
				<button id="btnQuestion" class="btn btn-success" onclick="thoat()">Thoát</button>
			</div>
		</div>
		<!-- phần bảng -->
		<table class="table table-striped">
			<thead>
				<tr>
					<th scope="col">STT</th>
					<th scope="col">Câu hỏi</th>
					<th scope="col">Môn</th>
					<th scope="col"></th>
				</tr>
			</thead>
			<tbody id="questions">
			</tbody>
		</table>
	</div>
</body>

</html>
<?php include('mdQuestion.php') ?>
<script type="text/javascript">
	function thoat() {
		window.location.href = "index.php";
	}
	var page = 1;
	$(document).ready(function() {
		$('#btnSearch').click();
	})

	$('#btnQuestion').click(function() {
		$('#txtQuestionid').val('');
		$('#txaQuestion').val('');
		$('#txaQuestionA').val('');
		$('#txaQuestionB').val('');
		$('#txaQuestionC').val('');
		$('#txaQuestionD').val('');
		$('#rdOptionA').prop('checked', false);
		$('#rdOptionB').prop('checked', false);
		$('#rdOptionC').prop('checked', false);
		$('#rdOptionD').prop('checked', false);
		$('#rdT').prop('checked', false);
		$('#rdLS').prop('checked', false);
		$('#rdVL').prop('checked', false);
		$('#rdHH').prop('checked', false);
		$('#rdSH').prop('checked', false);
		$('#rdDL').prop('checked', false);
		$('#rdTA').prop('checked', false);
		$('#rdGD').prop('checked', false);
		$('#modalQuestion').modal();
	});

	$('#btnSearch').click(function() {
		let search = $('#txtSearch').val().trim();
		readData(search);
		$('#pagination').empty();
		pagination(search);
	});

	$(document).on('click', "input[name='view']", function() {
		var bid = this.id;
		var trid = $(this).closest('tr').attr('id'); //lấy id của dòng được chọn
		GetDetail(trid); //dựa vào id rồi đổ dữ liệu vào cho input
		$('#txaQuestion').attr('readonly', 'readonly'); //ẩn đi giá trị nhập vào cho ô câu hỏi vì chỉ đưỢc xem
		$('#txaQuestionA').attr('readonly', 'readonly');
		$('#txaQuestionB').attr('readonly', 'readonly');
		$('#txaQuestionC').attr('readonly', 'readonly');
		$('#txaQuestionD').attr('readonly', 'readonly');
		$('#rdOptionA').attr('disabled', 'readonly');
		$('#rdOptionB').attr('disabled', 'readonly');
		$('#rdOptionC').attr('disabled', 'readonly');
		$('#rdOptionD').attr('disabled', 'readonly');
		$('#rdT').attr('disabled', 'readonly');
		$('#rdLS').attr('disabled', 'readonly');
		$('#rdVL').attr('disabled', 'readonly');
		$('#rdHH').attr('disabled', 'readonly');
		$('#rdSH').attr('disabled', 'readonly');
		$('#rdDL').attr('disabled', 'readonly');
		$('#rdTA').attr('disabled', 'readonly');
		$('#rdGD').attr('disabled', 'readonly');
		$('#btnSubmit').hide();
	});

	$(document).on('click', "input[name='update']", function() {
		$('#btnSubmit').show();
		var bid = this.id;
		var trid = $(this).closest('tr').attr('id');
		GetDetail(trid);


		$('#txtQuestionId').val(trid);
	})

	function GetDetail(id) {

		//ajax để đọc dữ liệu khi nhấn nút xem
		$.ajax({
			url: 'detail.php',
			type: 'get',
			data: {
				id: id
			},
			success: function(data) {
				var q = jQuery.parseJSON(data);
				$('#txaQuestion').val(q['question']);
				$('#modalQuestion').modal();
				$('#txaQuestionA').val(q['question_a']);
				$('#txaQuestionB').val(q['question_b']);
				$('#txaQuestionC').val(q['question_c']);
				$('#txaQuestionD').val(q['question_d']);

				switch (q['answer']) {
					case 'A':
						$('#rdOptionA').prop('checked', true);
						break;
					case 'B':
						$('#rdOptionB').prop('checked', true);
						break;
					case 'C':
						$('#rdOptionC').prop('checked', true);
						break;
					case 'D':
						$('#rdOptionD').prop('checked', true);
						break;
				}
				switch (q['id_mon']) {
					case '0':
						$('#rdT').prop('checked', true);
						break;
					case '1':
						$('#rdLS').prop('checked', true);
						break;
					case '2':
						$('#rdVL').prop('checked', true);
						break;
					case '3':
						$('#rdHH').prop('checked', true);
						break;
					case '4':
						$('#rdSH').prop('checked', true);
						break;
					case '5':
						$('#rdDL').prop('checked', true);
						break;
					case '6':
						$('#rdTA').prop('checked', true);
						break;
					case '7':
						$('#rdGD').prop('checked', true);
						break;
				}
			}
		});
	}

	function readData(search) {
		$.ajax({
			url: 'view.php',
			type: 'get',
			data: {
				search: search,
				page: page
			},
			success: function(data) {
				$('#questions').empty();
				$('#questions').append(data);
			}
		})
	}

	$(document).on('click', "input[name='delete']", function() {
		var trid = $(this).closest('tr').attr('id');
		if (confirm("bạn có chắc muốn xoá câu này không?") == true) {
			$.ajax({
				url: 'delete.php',
				type: 'post',
				data: {
					id: trid
				},
				success: function(data) {
					alert(data);
					readData($('#txtSearch').val());
				}
			});
		}
	});

	$('#txtSearch').on('keypress', function(e) {
		if (e.which === 13) {
			$('#btnSearch').click();
		}
	});

	$("#pagination").on("click", "li a", function(event) {
		event.preventDefault();
		page = $(this).text();
		readData($('#txtSearch').val());
	})

	function pagination(search) {
		$.ajax({
			url: 'pagination.php',
			type: 'get',
			data: {
				search: search
			},
			success: function(data) {
				if (data <= 1) {
					$('#pagination').hide();
				} else {
					$('#pagination').show();
					let pagi = '';
					for (i = 1; i <= data; i++) {
						pagi += '<li class="page-item"><a class="page-link" href="#">' + i + '</a></li>';
					}
					$('#pagination').append(pagi);
				}
			}
		});
	}
	$(document).ready(function(){
		$('div[name="liveSearch"]').click(function(event){
			var search = event.target.id;
			if(search == "liveSearch" || search == "" || search == "btnQuestion" || search == "pagination" || search == "btnClose"){
				return;
			}else if(search == "btnSearch"){
				$('#txtSearch').val('');
				$('#liveSearch').hide();
			}else{
				console.log(search);
				var text = document.getElementById(search).innerHTML;
				// document.getElementById("txtSearch").innerHTML = text;
				$('#txtSearch').val(text);
				readData(text);
				$('#txtSearch').val('');
				$('#liveSearch').hide();
			}
		});
		$('div[name="liveSearch"]').mouseover(function(event) {
			var search = event.target.id;
			if(search == "liveSearch" || search == "" || search == "btnQuestion" || search == "pagination" || search == "btnSearch" || search == "txtSearch"){
				return;
			}
			else{
				document.getElementById(search).style.color = "blue";
			}
		})
		$('div[name="liveSearch"]').mouseout(function(event) {
			var search = event.target.id;
			if(search == "liveSearch" || search == "" || search == "btnQuestion" || search == "pagination" || search == "btnSearch" || search == "txtSearch"){
				return;
			}
			else{
				document.getElementById(search).style.color = "black";
			}
		})
	});

	function showSearch(str) {
		$('#liveSearch').show();
		if (str.length == 0) {
			document.getElementById("liveSearch").innerHTML = "";
			document.getElementById("liveSearch").style.border = "0px";
			return;
		} else {
			var xmlhttp = new XMLHttpRequest();
			xmlhttp.onreadystatechange = function() {
				if (this.readyState == 4 && this.status == 200) {
					document.getElementById("liveSearch").innerHTML = this.responseText;
					document.getElementById("liveSearch").style.border = "1px solid #A5ACB2";
					// console.log(responseText);
				}
			}
			xmlhttp.open("GET", "search.php?q=" + str, true);
			xmlhttp.send();
		}
	}

	window.load = function test(){
		$('#liveSearch').hide();
	}
</script>