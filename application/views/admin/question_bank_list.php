<div id="<?=$this->datagrid?>_heard" style="height:35px;padding:2px 5px;">


        <?php if(role_check(49)){?>
            <a href="#" onclick="edit_<?=$this->datagrid?>('add')" class="easyui-linkbutton" iconCls="icon-add" plain="true">添加</a>
        <?php } if(role_check(55)){?>
            <a href="#" onclick="edit_<?=$this->datagrid?>(0)"class="easyui-linkbutton" iconCls="icon-edit" plain="true">编辑</a>
        <?php } if(role_check(30)){?>
            <a href="#" onclick="dels_<?=$this->datagrid?>()" class="easyui-linkbutton" iconCls="icon-remove" plain="true">批量删除</a>
        <?php } ?>

</div>


<div id="<?=$this->datagrid?>_toolbar">
    名称:<input class="easyui-textbox" type="text" id="<?=$this->datagrid?>_title" name="name" data-options="prompt:'模糊查找'" />

    <a href="javascript:void(0);" style="margin:0px 10px 0px 15px;width: 78px;" class="easyui-linkbutton" iconCls="icon-search" onclick="<?=$this->datagrid?>_search();"> 搜 索 </a>
</div>

<table id="<?=$this->datagrid?>_dgd">
    <thead>
    <tr>
        <th data-options="field:'id',checkbox:true"></th>
        <th data-options="field:'question'" width="120">题目</th>
        <th data-options="field:'answer'" width="350">题量</th>
        <th data-options="field:'correct'" width="20">类型</th>
        <th data-options="field:'use_num'" width="20">使用（次）</th>
        <th data-options="field:'add_time'" width="80">添加时间</th>

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
           // checkOnSelect:false,
            fitColumns:true,
            method:'get',
            pageSize:20,
            url:'<?=$this->base_url?>&m=list_data&exam_id=<?=$exam_id?>',
            onBeforeLoad: function (param) {
                $('#<?=$this->datagrid?>_dgd').datagrid('loading');

            },
            onLoadSuccess:function(data){




            },
            onLoadError: function (data) {
                $.messager.alert('系统提示','数据加载出错','error');
            },
            onAfterEdit:function(index,row,changes) {

            },onDblClickRow:function(rowIndex,rowData){
                <?php if($exam_id == '' && role_check(55)){?>
                    var id = rowData.id;
                    if(id){
                        edit_question_bank(id);
                    }
                <?php } ?>
            },
        }).datagrid('getPager');


    });


    //设为题目
    function set_exam() {
       var ids = [];
        var rows = $('#<?=$this->datagrid?>_dgd').datagrid('getSelections');
        if(rows.length < 1){$.messager.alert('操作提示',"请选择一行后再操作！",'warning');return false;}
        for(var i=0; i<rows.length; i++){
            ids.push(rows[i].id);
        }
        ids = ids.join(',');

        if(ids){
            $.messager.confirm('操作提示','确定要把选中的设为题目吗？',function(res){
                if(res){
                    $.ajax({
                        url: '<?=$this->base_url?>&m=set_exam&exam_id=<?=$exam_id?>',
                        type:"Post",
                        dataType:"json",
                        data:{
                            id_str : ids,
                            exam_id:'<?=$exam_id?>',
                            type :type
                        },
                        success: function (data) {
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
    
    //添加题目
    function add_ques(id, type) {
        if(id){
            $.ajax({
                url: '<?=$this->base_url?>&m=add_ques&exam_id=<?=$exam_id?>',
                type:"Post",
                dataType:"json",
                data:{
                    id : id,
                    exam_id:'<?=$exam_id?>',
                    type :type
                },
                success: function (data) {
                    if(data.success){
                        var num = Number( $.trim( $("#selected_num").html() ) );

                        if(data.dt == "add")
                        {
                            num++;
                        }else if(data.dt == "del"){
                            num--;
                        }
                        $("#selected_num").html(num);
                    }else{
                        $.messager.alert('操作提示',data.message,'error');
                    }
                }
            });
        }
    }


    function  edit_question_bank(id) {

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
            height: 400,
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
                    }}
            ]
        });

    }

    function dels_question_bank() {
        var ids = [];
        var rows = $('#<?=$this->datagrid?>_dgd').datagrid('getSelections');
        if(rows.length < 1){$.messager.alert('操作提示',"请选择一行后再操作！",'warning');return false;}
        for(var i=0; i<rows.length; i++){
            if (rows[i].use_num > 0) continue;
            ids.push(rows[i].id);
        }
        ids = ids.join(',');
        del_question_bank(ids);
    }

    function del_question_bank(ids) {
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
        } else {
            $.messager.alert('操作提示',"选择失败或者当前题目正在被使用！",'warning');
        }
    }


    function question_bank_search() {
        var title = $("#<?=$this->datagrid?>_title").val().length > 0 ? $("#<?=$this->datagrid?>_title").val() : "";
       /* var good_at_type = '';
        $("input[name='good_at_type[]']").each(function(i){
            if($(this).val() != "") good_at_type += $(this).val() + ",";
        });*/
        $('#<?=$this->datagrid?>_dgd').datagrid('load',{
            'title':title,
         //   'good_at_type':good_at_type
        });
    }

</script>

