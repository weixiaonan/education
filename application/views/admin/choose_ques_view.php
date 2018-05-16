<div id="choose_ques_heard" style="height:35px;padding:2px 5px;">


        <!-- <a href="#" onclick="set_exam()" class="easyui-linkbutton" iconCls="icon-add" plain="true">设为题目</a>-->
    <p  style="line-height: 35px; font-size: 16px;" class="font-red">本次考试一共选择了<b id="tip_post">&nbsp;</b><b id="selected_num"><?=$selected_num?></b><b id="">&nbsp;</b>道题目。</p>

</div>


<div id="choose_ques_toolbar">
    名称:<input class="easyui-textbox" type="text" id="choose_ques_title" name="name" data-options="prompt:'模糊查找'" />

    <a href="javascript:void(0);" style="margin:0px 10px 0px 15px;width: 78px;" class="easyui-linkbutton" iconCls="icon-search" onclick="choose_ques_search();"> 搜 索 </a>
</div>

<table id="choose_ques_dgd">
    <thead>
    <tr>
        <th class="not-select" data-options="field:'id',checkbox:true"></th>
        <th data-options="field:'question'" width="120">题目</th>
        <th data-options="field:'answer'" width="120">题量</th>
        <th data-options="field:'correct',id:'1'" width="20">类型</th>
        <th data-options="field:'add_time'" width="60">添加时间</th>

    </tr>
    </thead>
</table>


<script type="text/javascript">

        $(function(){

        var obj = $('#choose_ques_dgd').datagrid({
            rownumbers:true,
            fit:true,
            header:'#choose_ques_heard',
            toolbar:'#choose_ques_toolbar',
            pagination:true,
            // checkOnSelect:false,
            fitColumns:true,
            method:'get',
            pageSize:20,
            url:'index.php?d=admin&c=Question_bank&m=list_data&exam_id=<?=$exam_id?>',
            onBeforeLoad: function (param) {
                $('#choose_ques_dgd').datagrid('loading');

            },
            onLoadSuccess:function(data){

                if(data){
                    $.each(data.rows, function(index, item){
                        if(item.checked){
                            $('#choose_ques_dgd').datagrid('checkRow', index);
                        }
                    });
                }
                $('#choose_ques_dgd').parent().find("div .datagrid-header-check").children("input[type='checkbox']").eq(0).remove();

                $('input:checkbox[name="id"]').on('click', function () {
                    var id = $(this).val();
                    if(id){
                        add_ques(id);
                    }
                })
            },
            onLoadError: function (data) {
                $.messager.alert('系统提示','数据加载出错','error');
            },
            onAfterEdit:function(index,row,changes) {

            },
            onClickRow:function(rowIndex,rowData){
                <?php if($exam_id != ''){?>
                var id = rowData.id;
                add_ques(id);
                <?php } ?>
            }
        }).datagrid('getPager');




    });


    //添加题目
    function add_ques(id) {
        if(id){
            $.ajax({
                url: 'index.php?d=admin&c=Question_bank&m=add_ques&exam_id=<?=$exam_id?>',
                type:"Post",
                dataType:"json",
                data:{
                    id : id,
                    exam_id:'<?=$exam_id?>',
                },
                success: function (data) {
                    if(data.success){

                        var num = Number( $.trim( $("#selected_num").html() ) );
                        var tip_txt = '';
                        if(data.dt == "add")
                        {
                            num++;
                            tip_txt = '添加成功';
                        }else if(data.dt == "del"){
                            num--;
                            tip_txt = '取消成功';
                        }
                        $("#selected_num").html(num);
                        layer.tips(tip_txt, '#tip_post', {
                            tips: [1, '#0c80d7'],
                            time: 1500
                        });
                    }else{
                        $.messager.alert('操作提示',data.message,'error');
                    }
                }
            });
        }
    }


    function choose_ques_search() {
        var title = $("#choose_ques_title").val().length > 0 ? $("#choose_ques_title").val() : "";
        /* var good_at_type = '';
         $("input[name='good_at_type[]']").each(function(i){
             if($(this).val() != "") good_at_type += $(this).val() + ",";
         });*/
        $('#choose_ques_dgd').datagrid('load',{
            'title':title,
            //   'good_at_type':good_at_type
        });
    }
</script>


