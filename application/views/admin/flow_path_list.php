<div id="<?=$this->datagrid?>_heard" style="height:35px;padding:2px 5px;">
    <?php if(role_check(87)){?>
        <a href="#" onclick="edit_<?=$this->datagrid?>('add')" class="easyui-linkbutton" iconCls="icon-add" plain="true">添加</a>
    <?php } if(role_check(88)){?>
        <a href="#" onclick="edit_<?=$this->datagrid?>(0)"class="easyui-linkbutton" iconCls="icon-edit" plain="true">编辑</a>
    <?php } if(role_check(89)){?>
        <a href="#" onclick="dels_<?=$this->datagrid?>()" class="easyui-linkbutton" iconCls="icon-remove" plain="true">批量删除</a>
    <?php } ?>
    <span style="color: red">(有审批记录的不能修改及删除。)</span>
</div>


<div id="<?=$this->datagrid?>_toolbar">
    名称:<input class="easyui-textbox" type="text" id="<?=$this->datagrid?>_title" name="name" data-options="prompt:'模糊查找'" />

    <a href="javascript:void(0);" style="margin:0px 10px 0px 15px;width: 78px;" class="easyui-linkbutton" iconCls="icon-search" onclick="<?=$this->datagrid?>_search();"> 搜 索 </a>
</div>

<table id="<?=$this->datagrid?>_dgd">
    <thead>
    <tr>
        <th data-options="field:'id',checkbox:true"></th>
        <th data-options="field:'name'" width="20">名称</th>
        <th data-options="field:'flow_path'" width="120">流程</th>
        <th data-options="field:'user_flow_num'" width="15">申请记录</th>
        <th data-options="field:'add_time'" width="120">添加时间</th>

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
            fitColumns:true,

            method:'get',
            pageSize:20,
            url:'<?=$this->base_url?>&m=list_data',
            onBeforeLoad: function (param) {
                $('#<?=$this->datagrid?>_dgd').datagrid('loading');

            },
            onLoadSuccess:function(data){
                if (data.rows.length > 0) {
                    for(var j=0;j<data.rows.length;j++){
                        if(data.rows[j]['user_flow_num'] > 0){

                            $("#flow_path_toolbar").next().find("input[type='checkbox'][value='" + data.rows[j]['id'] + "']").remove();

                        }
                       // console.log($("#flow_path_toolbar").next().find("input[type='checkbox']"));
                    }

                }
            },
            onLoadError: function (data) {
                $.messager.alert('系统提示','数据加载出错','error');
            },
            onAfterEdit:function(index,row,changes) {

            },onDblClickRow:function(rowIndex,rowData){

            },onCheck:function(index, row){
                if(row.user_flow_num > 0) {
                    $('#<?=$this->datagrid?>_dgd').datagrid('uncheckRow', index);
                }
            },onSelect:function (index, row) {
                if(row.user_flow_num > 0) {
                    $('#<?=$this->datagrid?>_dgd').datagrid('unselectRow', index);
                }
            },onCheckAll:function(rows){

                $.each(rows, function(index, item){
                    if(item.user_flow_num > 0) {
                        $('#<?=$this->datagrid?>_dgd').datagrid('unselectRow', index);
                        $('#<?=$this->datagrid?>_dgd').datagrid('uncheckRow', index);
                    }
                })
            }
        }).datagrid('getPager');//enableCellEditing


    });




    function  edit_flow_path(id) {

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
            height: 300,
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
                                $.messager.alert('操作提示',data.message,'success',function () {
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

    function dels_flow_path() {
        var ids = [];
        var rows = $('#<?=$this->datagrid?>_dgd').datagrid('getSelections');
        if(rows.length < 1){$.messager.alert('操作提示',"请选择一行后再操作！",'warning');return false;}
        for(var i=0; i<rows.length; i++){
            ids.push(rows[i].id);
        }
        ids = ids.join(',');
        del_flow_path(ids);
    }

    function del_flow_path(ids) {
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


    function flow_path_search() {
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

