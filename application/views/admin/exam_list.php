<div id="<?=$this->datagrid?>_heard" style="height:35px;padding:2px 5px;">
    <?php if(role_check(59)){?>
        <a href="#" onclick="edit_<?=$this->datagrid?>('add')" class="easyui-linkbutton" iconCls="icon-add" plain="true">添加</a>
    <?php } if(role_check(60)){?>
        <a href="#" onclick="edit_<?=$this->datagrid?>(0)"class="easyui-linkbutton" iconCls="icon-edit" plain="true">编辑</a>
    <?php } if(role_check(61)){?>
        <a href="#" onclick="dels_<?=$this->datagrid?>()" class="easyui-linkbutton" iconCls="icon-remove" plain="true">批量删除</a>
    <?php } ?>
</div>


<div id="<?=$this->datagrid?>_toolbar">
    名称:<input class="easyui-textbox" type="text" id="<?=$this->datagrid?>_title" name="name" data-options="prompt:'模糊查找'" />

    类别:<select style="width: 120px;" class="easyui-combobox" id="<?=$this->datagrid?>_type">
        <option value="">全部</option>
        <option value="1">未开考</option>
        <option value="2">进行中</option>
        <option value="3">已结束</option>
        <option value="4">我的预约</option>
    </select>

    <a href="javascript:void(0);" style="margin:0px 10px 0px 15px;width: 78px;" class="easyui-linkbutton" iconCls="icon-search" onclick="<?=$this->datagrid?>_search();"> 搜 索 </a>
</div>

<table id="<?=$this->datagrid?>_dgd">
    <thead>
    <tr>
        <th data-options="field:'id',checkbox:true"></th>
        <th data-options="field:'title'" width="20">考试名称</th>
        <th data-options="field:'content'" width="120">考试简介</th>
        <th data-options="field:'ques_num'" width="10">题目数</th>
        <th data-options="field:'exam_time'" width="80">考试时间</th>
        <th data-options="field:'used_book'" width="20">是否用预约</th>
        <th data-options="field:'exam_status_txt'" width="20">状态</th>
        <th data-options="field:'add_time'" width="40">添加时间</th>
        <th data-options="field:'button',align:'left',formatter:exam_operate" width="65">操作</th>

    </tr>
    </thead>
</table>

<script type="text/javascript">

    $(function(){
        var obj = $('#<?=$this->datagrid?>_dgd').datagrid({
            rownumbers:true,
            fit:true,
            header:'#<?=$this->datagrid?>_heard',
            toolbar:'#<?=$this->datagrid?>_toolbar',
            pagination:true,
            //checkOnSelect:false,
            fitColumns:true,
            method:'get',
            pageSize:20,
            url:'<?=$this->base_url?>&m=list_data',
            onBeforeLoad: function (param) {
                $('#<?=$this->datagrid?>_dgd').datagrid('loading');

            },
            onLoadSuccess:function(data){
                $('.exam-button').linkbutton({
                });
            },
            onLoadError: function (data) {
                $.messager.alert('系统提示','数据加载出错','error');
            },
            onAfterEdit:function(index,row,changes) {

            },onDblClickRow:function(rowIndex,rowData){
                <?php  if(role_check(60)){?>
                var id = rowData.id;
                if(id){
                    edit_exam(id);
                }
                <?php  }?>
            }
        }).datagrid('getPager');//enableCellEditing


    });

    function exam_operate(value,row,index) {
        var btns  = '';
        <?php if(role_check(62)){?>
        if(row.exam_status == 1) {
            btns += "<a href='#' onclick='choose_ques(" + row.id + ", \"" + row.title + "\", \"" + '<?=$this->datagrid?>_dgd' + "\" )'  class='exam-button button-info'>选择题目</a>&nbsp;&emsp;";
        }
        <?php } ?>
        <?php if(role_check(63)){?>
        if(row.exam_status == 2) {
            btns += "<a href='#' onclick='start_exam(" + row.id + ", \"" + row.title + "\", \"" + '<?=$this->datagrid?>_dgd' + "\" )'  class='exam-button button-default'>开始考试</a>&nbsp;&emsp;";
        }
        <?php } ?>

        <?php if(role_check(69)){?>
            if(row.book_status == -1 && row.exam_status == 1){
                btns += "<a href='#' onclick='book_exam("+row.id+", \""+row.title+"\", \"" + '预约考试' + "\" )'  class='exam-button button-success'>预约考试</a>&emsp;&emsp;";
            }else if(row.book_status == 1 && row.exam_status == 1)
            {
                btns += "<a href='#' onclick='book_exam("+row.id+", \""+row.title+"\", \"" + '重新预约' + "\" )'  class='exam-button button-success'>重新预约</a>&emsp;&emsp;";
            }else if(row.book_status == 0 && row.exam_status == 1)
            {
                btns += "<a href='#' onclick='book_exam("+row.id+", \""+row.title+"\", \"" + '取消预约' + "\" )'  class='exam-button button-success'>取消预约</a>&emsp;&emsp;";
            }
        <?php } ?>

        return btns;
    }

    //选中题目
    function choose_ques(id, title) {

        $('#com_edit').dialog({
            title: title,
            width: 1100,
            height: 700,
            closed: false,
            top:100,
            cache: false,
            href: 'index.php?d=admin&c=Exam&m=choose_ques&exam_id='+id,
            modal: true,
            buttons: [
                {
                    text:'关闭',
                    handler:function(){
                        $('#com_edit').dialog("close");
                    }}
            ],
            onClose:function(){
                $('#<?=$this->datagrid?>_dgd').datagrid('reload');
            }
        });
    }
    
    //开始考试
    var exam_t = null;
    var exam_log_id = 0;
    var bClose = true;
    function start_exam(id, title) {
        exam_t = null;
        bClose = false;
        var confirm_c = false;
        $('#com_edit').dialog({
            title: title,
            width: 900,
            height: 700,
            closed: false,
            cache: false,
            top:100,
            href: 'index.php?d=admin&c=Exam&m=start_exam&exam_id='+id,
            modal: true,
            buttons: [
               /* {
                    text:'取消',
                    handler:function(){
                        //$('#com_edit').dialog("close");
                    }}*/
            ],
            onClose:function(){
                $(".timeShow").html('');
                if(exam_t != null)
                {
                    clearInterval(exam_t);
                }
            },
            onBeforeClose:function(){
                $('#<?=$this->datagrid?>_dgd').datagrid('clearSelections');
                if (!bClose)
                {
                    $.messager.confirm('操作提示','确定要退出考试吗？',function(res){
                        if (res) {
                            bClose = true;//标记可以退出
                            $("#com_edit").dialog("close");
                        }
                    })
                }
                return bClose;
            }
        });
        
    }
    
    //预约考试
    function book_exam(id, title, op_txt) {
        if(id)
        {
            $.messager.confirm('操作提示','确定要'+op_txt+'['+title+']吗？',function(res){
                if(res){
                    $.ajax({
                        url: '<?=$this->base_url?>&m=book_exam',
                        type:"Post",
                        dataType:"json",
                        data:{
                            id : id,
                        },
                        success: function (data) {
                            $('#<?=$this->datagrid?>_dgd').datagrid('clearSelections');
                            if(data.success){
                                $.messager.alert('操作提示',data.message,'success',function(){
                                    $('#<?=$this->datagrid?>_dgd').datagrid("reload");
                                });
                            }else{
                                $.messager.alert('操作提示',data.message,'error');
                            }
                        }
                    });
                }
            });
        }
    }

    function  edit_exam(id) {

        if(id == 0){
            var row = $('#<?=$this->datagrid?>_dgd').datagrid('getSelections');
            if(row.length < 1){$.messager.alert('操作提示',"请选择一行后再操作！",'warning');return false;}
            if(row.length > 1){$.messager.alert('操作提示',"只能选择一行操作！",'warning');return false;}
            var ids = [];
            $.each(row, function(index, item){
                ids.push(item.id);
            });
            id = ids[0];
        }
        var url = '<?=$this->base_url?>&m=edit&id='+id;
        if(id == 'add'){
            url = '<?=$this->base_url?>&m=add&id='+id;
        }

        $('#com_edit').dialog({
            title: '编辑',
            width: 600,
            height: 450,
            closed: false,
            cache: false,
            href: url,
            modal: true,
            buttons: [{
                text: ' 保 存 ',
                iconCls: 'icon-ok',
                handler: function () {
                    $.messager.progress();
                    $('#<?=$this->datagrid?>_form').form('submit', {
                        url:'<?=$this->base_url?>&m=save',
                        onSubmit: function(){
                            var isValid = $(this).form('validate');
                            if (!isValid){
                                $.messager.progress('close');
                            }
                            return isValid;	// 返回false终止表单提交
                        },
                        success:function(data){
                            $.messager.progress('close');
                            var data = eval('(' + data + ')');
                            if(data.success){
                                $.messager.alert('操作提示',data.message,'info',function () {
                                    $('#com_edit').dialog("close");
                                    $('#<?=$this->datagrid?>_dgd').datagrid('reload');
                                });
                            }else{
                                $.messager.alert('操作提示',data.message,'error');
                            }
                        }
                    });
                }
            },
                {
                    text:'取消',
                    handler:function(){
                        $('#com_edit').dialog("close");
                        $('#<?=$this->datagrid?>_dgd').datagrid('clearSelections');
                    }}
            ]
        });

    }

    function dels_exam() {
        var ids = [];
        var rows = $('#<?=$this->datagrid?>_dgd').datagrid('getSelections');
        if(rows.length < 1){$.messager.alert('操作提示',"请选择一行后再操作！",'warning');return false;}
        for(var i=0; i<rows.length; i++){
            ids.push(rows[i].id);
        }
        ids = ids.join(',');
        del_exam(ids);
    }

    function del_exam(ids) {
        if(ids){
            $.messager.confirm('操作提示','确定要删除吗？',function(res){
                if(res){
                    $.ajax({
                        url: '<?=$this->base_url?>&m=del',
                        type:"Post",
                        dataType:"json",
                        data:{
                            id_str : ids,
                        },
                        success: function (data) {
                            if(data.success){
                                $.messager.alert('操作提示',data.message,'info',function(){
                                    $('#<?=$this->datagrid?>_dgd').datagrid("reload");
                                });
                            }else{
                                $.messager.alert('操作提示',data.message,'error');
                            }
                        }
                    });
                }
            });
        }
    }


    function exam_search() {
        var title = $("#<?=$this->datagrid?>_title").val().length > 0 ? $("#<?=$this->datagrid?>_title").val() : "";
        var type = $("#<?=$this->datagrid?>_type").val().length > 0 ? $("#<?=$this->datagrid?>_type").val() : "";
       /* var good_at_type = '';
        $("input[name='good_at_type[]']").each(function(i){
            if($(this).val() != "") good_at_type += $(this).val() + ",";
        });*/
        $('#<?=$this->datagrid?>_dgd').datagrid('load',{
            'title':title,
            'type':type
        });
    }

</script>

