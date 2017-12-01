<link rel="stylesheet" type="text/css" href="static/css/exam.css" />
<script type="text/javascript" src="static/js/quizs.js"></script>

<div id="main" style="margin-top: 30px;"">
    <h2 class="top_title"><span class="timeShow"></span></h2>
    <div class="demo">
        <div id='quiz-container'></div>
    </div>

</div>

<script>
    $(function(){
        $('#quiz-container').jquizzy({
            questions: <?php echo $json;?>,
            sendResultsURL: 'index.php?d=admin&c=Exam&m=get_exam_data&exam_id=<?=$exam_id?>',
            ques_num:'<?=$ques_num?>',
            exam_time:'<?=$row['exam_time']?>'
        });
    });


    function exam_timer(intDiff){
        exam_t = setInterval(function(){
            var day=0,
                hour=0,
                minute=0,
                second=0;//时间默认值
            if(intDiff > 0){
                day = Math.floor(intDiff / (60 * 60 * 24));
                hour = Math.floor(intDiff / (60 * 60)) - (day * 24);
                minute = Math.floor(intDiff / 60) - (day * 24 * 60) - (hour * 60);
                second = Math.floor(intDiff) - (day * 24 * 60 * 60) - (hour * 60 * 60) - (minute * 60);
            }else{//当时间耗尽，刷新页面
                //window.location.reload();
                $(".timeShow").html('考试时间到！');
            }
            if (minute <= 9) minute = '0' + minute;
            if (second <= 9) second = '0' + second;
            $(".timeShow").html('考试倒计时<font>'+minute+'分'+second+'</font>秒');
            intDiff--;
        }, 1000);

        $.ajax({
            url: 'index.php?d=admin&c=Exam&m=go_start&exam_id=<?=$exam_id?>',
            type:"Post",
            dataType:"json",
            data:{
                exam_id : '<?=$exam_id?>',
            },
            success: function (data) {
                if(data.success){
                    exam_log_id = data.message;

                }else{
                    $.messager.alert('操作提示',data.message,'error');
                }
            }
        });



    }


</script>
