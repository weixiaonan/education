<div id="<?=$this->datagrid?>_heard" style="height:35px;padding:2px 5px;">
    <?php if(role_check(5)){?>
        <a href="#" onclick="edit_<?=$this->datagrid?>('add')" class="easyui-linkbutton" iconCls="icon-add" plain="true">添加</a>
    <?php } if(role_check(7)){?>
        <a href="#" onclick="edit_<?=$this->datagrid?>(0)"class="easyui-linkbutton" iconCls="icon-edit" plain="true">编辑</a>
    <?php } if(role_check(8)){?>
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
        <th data-options="field:'training_name'" width="30">训练名称</th>
        <th data-options="field:'training_type'" width="20">训练类型</th>
        <th data-options="field:'training_object'" width="40">训练对象</th>
        <th data-options="field:'training_people'" width="20">计划参训人数</th>
        <th data-options="field:'curriculum_num'" width="20">当前参训人数</th>
        <th data-options="field:'training_days'" width="15">训练天数</th>
        <th data-options="field:'start_time'" width="20">开始时间</th>
        <th data-options="field:'end_time'" width="20">结束时间</th>
        <th data-options="field:'training_info'" width="80">训练内容</th>
        <th data-options="field:'status'" width="12">状态</th>
        <th data-options="field:'add_time'" width="30">添加时间</th>
        <th data-options="field:'mark_num'" width="20">评价数</th>
        <th data-options="field:'button',align:'left',formatter:curriculum_operate" width="15">操作</th>

    </tr>
    </thead>
</table>
<div id="look_curriculum_p"></div>
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
            url:'<?=$this->base_url?>&m=list_data',
            onBeforeLoad: function (param) {
                $('#<?=$this->datagrid?>_dgd').datagrid('loading');

            },
            onLoadSuccess:function(data){
                $('.curriculum-button').linkbutton({
                });
            },
            onLoadError: function (data) {
                $.messager.alert('系统提示','数据加载出错','error');
            },
            onAfterEdit:function(index,row,changes) {

            },onDblClickRow:function(rowIndex,rowData){
                <?php  if(role_check(7)){?>
                var id = rowData.id;
                if(id){
                    edit_curriculum(id);
                }
                <?php  }?>
            }
        }).datagrid('getPager');//enableCellEditing


        $('#look_curriculum_p').dialog({
            title: '查看培训班人员',
            width: 1400,
            height: 900,
            closed: true,
            cache: false,
           // href: 'index.php?d=admin&c=User&m=user_edit&type=reset',
            modal: true,
            buttons: [ {
                    text:'关闭',
                    handler:function(){
                        $('#look_curriculum_p').dialog("close");
                        $('##<?=$this->datagrid?>_dgd').datagrid('clearSelections');
                    }}
            ]
        });


    });
    
    function look_curriculum_people(curriculum_id) {
        var url =  'index.php?d=admin&c=Training_files&m=index&curriculum_id=' + curriculum_id;
        $('#look_curriculum_p').dialog({href:url}).dialog('open');
    }
    
    function curriculum_operate(value,row,index) {
        var btns  = '';
        <?php if(role_check(6)){?>
        btns += "<a href='#' onclick='mark("+row.id+", 2, \""+row.training_name+"\", \"" + '<?=$this->datagrid?>_dgd' + "\" )'  class='curriculum-button button-info'>评价</a>&nbsp;&nbsp;";
        <?php } ?>
        return btns;
    }


    function  edit_curriculum(id) {

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
            height: 550,
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

    function dels_curriculum() {
        var ids = [];
        var rows = $('#<?=$this->datagrid?>_dgd').datagrid('getSelections');
        if(rows.length < 1){$.messager.alert('操作提示',"请选择一行后再操作！",'warning');return false;}
        for(var i=0; i<rows.length; i++){
            ids.push(rows[i].id);
        }
        ids = ids.join(',');
        del_curriculum(ids);
    }

    function del_curriculum(ids) {
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


    function curriculum_search() {
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

