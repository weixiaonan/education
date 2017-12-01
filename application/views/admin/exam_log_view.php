<div id="exam_log_heard" style="height:35px;padding:2px 5px;">




</div>


<div id="choose_ques_toolbar">
    名称:<input class="easyui-textbox" type="text" id="exam_log_title" name="name" data-options="prompt:'模糊查找'" />

    <a href="javascript:void(0);" style="margin:0px 10px 0px 15px;width: 78px;" class="easyui-linkbutton" iconCls="icon-search" onclick="exam_log_search();"> 搜 索 </a>
</div>

<table id="exam_log_dgd">
    <thead>
    <tr>
        <th class="not-select" data-options="field:'id',checkbox:true"></th>
        <th data-options="field:'name'" width="40">考试名称</th>
        <th data-options="field:'score'" width="10">考试成绩</th>
        <th data-options="field:'start_time'" width="60">开始时间</th>
        <th data-options="field:'end_time'" width="60">结束时间</th>
    </tr>
    </thead>
</table>

<script type="text/javascript">

    $(function(){
        var obj = $('#exam_log_dgd').datagrid({
            rownumbers:true,
            fit:true,
            header:'#choose_ques_heard',
            toolbar:'#choose_ques_toolbar',
            pagination:true,
            // checkOnSelect:false,
            fitColumns:true,
            method:'get',
            pageSize:20,
            url:'index.php?d=admin&c=Exam&m=exam_log_list_data',
            onBeforeLoad: function (param) {
                $('#exam_log_dgd').datagrid('loading');

            },
            onLoadSuccess:function(data){



            },
            onLoadError: function (data) {
                $.messager.alert('系统提示','数据加载出错','error');
            }

        }).datagrid('getPager');


    });





    function exam_log_search() {
        var title = $("#exam_log_title").val().length > 0 ? $("#exam_log_title").val() : "";
        /* var good_at_type = '';
         $("input[name='good_at_type[]']").each(function(i){
             if($(this).val() != "") good_at_type += $(this).val() + ",";
         });*/
        $('#exam_log_dgd').datagrid('load',{
            'title':title,
            //   'good_at_type':good_at_type
        });
    }
</script>


