<div class="modal" tabindex="-1" role="dialog" id="modalQuestion">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">K12-HTHT</h5>
            </div>
            <div class="modal-body">
                <input type="hidden" id="txtQuestionId" value="">
                <div class="form-group">
                    <div class="row">
                        <div class="col-sm-3">
                            <div class="radio">
                                <label><input type="radio" name="opMon" id="rdT">Toán</label>
                            </div>
                        </div>
                    <div class="col-sm-3">
                        <div class="radio">
                            <label><input type="radio" name="opMon" id="rdLS" >Lịch Sử</label>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="radio">
                            <label><input type="radio" name="opMon" id="rdVL" >Vật Lý</label>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="radio">
                            <label><input type="radio" name="opMon" id="rdHH" >Hoá học</label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-3">
                        <div class="radio">
                            <label><input type="radio" name="opMon" id="rdSH">Sinh Học</label>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="radio">
                            <label><input type="radio" name="opMon" id="rdDL" >Địa lý</label>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="radio">
                            <label><input type="radio" name="opMon" id="rdTA" >Tiếng anh</label>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="radio">
                            <label><input type="radio" name="opMon" id="rdGD" >GDCD</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <textarea class="form-control" id="txaQuestion" rows="3" placeholder="câu hỏi"></textarea>
            </div>
            <div class="form-group">
                <textarea class="form-control" id="txaQuestionA" rows="1" placeholder="Đáp án A"></textarea>
            </div>
            <div class="form-group">
                <textarea class="form-control" id="txaQuestionB" rows="1" placeholder="Đáp án B"></textarea>
            </div>
            <div class="form-group">
                <textarea class="form-control" id="txaQuestionC" rows="1" placeholder="Đáp án C"></textarea>
            </div>
            <div class="form-group">
                <textarea class="form-control" id="txaQuestionD" rows="1" placeholder="Đáp án D"></textarea>  
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-sm-3">
                        <div class="radio">
                            <label><input type="radio" name="optradio" id="rdOptionA">Đáp án A</label>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="radio">
                            <label><input type="radio" name="optradio" id="rdOptionB" >Đáp án B</label>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="radio">
                            <label><input type="radio" name="optradio" id="rdOptionC" >Đáp án C</label>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="radio">
                            <label><input type="radio" name="optradio" id="rdOptionD" >Đáp án D</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-primary" id="btnSubmit">xác nhận</button>
            <button type="button" class="btn btn-secondary"id="btnClose" data-dismiss="modal">Close</button>
        </div>
    </div>
</div>

<script type="text/javascript">
    $('#btnSubmit').click(function(){
        let question = $('#txaQuestion').val().trim();
        let question_a = $('#txaQuestionA').val().trim();
        let question_b = $('#txaQuestionB').val().trim();
        let question_c = $('#txaQuestionC').val().trim();
        let question_d = $('#txaQuestionD').val().trim();
        let answer = $('#rdOptionA').is(':checked')?'A':$('#rdOptionB').is(':checked')?'B':$('#rdOptionC').is(':checked')?'C':$('#rdOptionD').is(':checked')?'D':'';
        let mon = $('#rdT').is(':checked')?'0':$('#rdLS').is(':checked')?'1':$('#rdVL').is(':checked')?'2':$('#rdHH').is(':checked')?'3':$('#rdSH').is(':checked')?'4':$('#rdDL').is(':checked')?'5':$('#rdTA').is(':checked')?'6':$('#rdGD').is(':checked')?'7':'';
        if(mon.length == 0){
            alert('Vui lòng chọn môn học');
            return;
        }
        if(question.length == 0 || question_a.length == 0|| question_b.length == 0 || question_c.length == 0 || question_d.length == 0){
            alert('vui lòng nhập đầY đủ câu hỏi và đáp án ');
            return;
        }
        if(answer.length == 0){ 
            alert('vui lòng chọn đáp án đúng');
            return;
        }
        let questionId = $('#txtQuestionId').val();
        if(questionId.length==0){
            $.ajax({
            url:'addQuestion.php',
            type:'post',
            data:{
                question:question,
                question_a:question_a,
                question_b:question_b,
                question_c:question_c,
                question_d:question_d,
                answer:answer,
                mon:mon,
            },
            success:function(data){
                alert(data);  
                $('#txaQuestion').val('');
                $('#txaQuestionA').val('');
                $('#txaQuestionB').val('');
                $('#txaQuestionC').val('');
                $('#txaQuestionD').val('');
                $('#rdOptionA').prop('checked',false);
                $('#rdOptionB').prop('checked',false);
                $('#rdOptionC').prop('checked',false);
                $('#rdOptionD').prop('checked',false);
                $('#rdT').prop('checked',false);
                $('#rdLS').prop('checked',false);
                $('#rdVL').prop('checked',false);
                $('#rdHH').prop('checked',false);
                $('#rdSH').prop('checked',false);
                $('#rdDL').prop('checked',false);
                $('#rdTA').prop('checked',false);
                $('#rdGD').prop('checked',false);
                $('#btnSearch').click();
            }
            });
        }else{
            $.ajax({
            url:'update_v2.php',
            type:'post',
            data:{
                id:questionId,
                question:question,
                question_a:question_a,
                question_b:question_b,
                question_c:question_c,
                question_d:question_d,
                answer:answer,
                mon:mon,
            },
            success:function(data){
                $('#modalQuestion').modal('hide');
                $('#btnSearch').click();
            }
            });
        }
    });

    $('#btnClose').click(function(){
        $('#txaQuestion').attr('readonly',false);
        $('#txaQuestionA').attr('readonly',false);
        $('#txaQuestionB').attr('readonly',false);
        $('#txaQuestionC').attr('readonly',false);
        $('#txaQuestionD').attr('readonly',false);

        $('#rdOptionA').attr('disabled',false);
        $('#rdOptionB').attr('disabled',false);
        $('#rdOptionC').attr('disabled',false);
        $('#rdOptionD').attr('disabled',false);
        $('#rdT').attr('disabled',false);
        $('#rdLS').attr('disabled',false);
        $('#rdVL').attr('disabled',false);
        $('#rdHH').attr('disabled',false);
        $('#rdSH').attr('disabled',false);
        $('#rdDL').attr('disabled',false);
        $('#rdTA').attr('disabled',false);
        $('#rdGD').attr('disabled',false);
        $('#btnSubmit').show();
    });

</script>