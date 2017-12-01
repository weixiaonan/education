<div id="<?=$this->datagrid?>_heard" style="height:35px;padding:2px 5px;">
    <?php if(role_check(51)){?>
        <a href="#" onclick="edit_<?=$this->datagrid?>('add')" class="easyui-linkbutton" iconCls="icon-add" plain="true">添加</a>
    <?php } if(role_check(52)){?>
        <a href="#" onclick="edit_<?=$this->datagrid?>(0)"class="easyui-linkbutton" iconCls="icon-edit" plain="true">编辑</a>
    <?php } if(role_check(53)){?>
        <a href="#" onclick="dels_<?=$this->datagrid?>()" class="easyui-linkbutton" iconCls="icon-remove" plain="true">批量删除</a>
    <?php } if(role_check(58)){?>
        <a href="#" onclick="sync_<?=$this->datagrid?>()" class="easyui-linkbutton" iconCls="icon-add" plain="true">同步</a>
    <?php } ?>
</div>


<div id="<?=$this->datagrid?>_toolbar">
    关键字:<input class="easyui-textbox" type="text" id="<?=$this->datagrid?>_title" name="name" data-options="prompt:'模糊查找'" />
    &nbsp;&nbsp;
    性别:<select style="width: 80px;" class="easyui-combobox" id="<?=$this->datagrid?>_sex">
            <option value="">全部</option>
            <option value="1">男</option>
            <option value="0">女</option>
        </select>
    &nbsp;&nbsp;
    民族:
    <input   id="<?=$this->datagrid?>_mz" class="easyui-combobox"
             data-options="prompt:'请选择',editable:false,valueField:'mz_title',textField:'mz_title',url:'index.php?d=admin&c=Police&m=get_mz'" />


    <a href="javascript:void(0);" style="margin:0px 10px 0px 15px;width: 78px;" class="easyui-linkbutton" iconCls="icon-search" onclick="<?=$this->datagrid?>_search();"> 搜 索 </a>
</div>

<table id="<?=$this->datagrid?>_dgd">
    <thead>
    <tr>
        <th data-options="field:'id',checkbox:true"></th>
        <th data-options="field:'name'" width="20">姓名</th>
        <th data-options="field:'sex'" width="10">性别</th>
        <th data-options="field:'jiguan'" width="20">籍贯</th>
        <th data-options="field:'birth_time'" width="30">出生日期</th>
        <th data-options="field:'mz'" width="30">民族</th>
        <th data-options="field:'sfz'" width="60">身份证号</th>
        <th data-options="field:'political_status'" width="20">政治面貌</th>
        <th data-options="field:'position'" width="40">职务</th>
        <th data-options="field:'department'" width="40">所属部门</th>
        <th data-options="field:'xueli'" width="40">学历</th>
        <th data-options="field:'zhuanye'" width="40">专业</th>
        <th data-options="field:'tel'" width="40">联系电话</th>
        <th data-options="field:'job_num'" width="40">工号</th>

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
          //  checkOnSelect:false,
            fitColumns:true,
            method:'get',
            pageSize:20,
            url:'<?=$this->base_url?>&m=list_data',
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
                <?php  if(role_check(52)){?>
                var id = rowData.id;
                if(id){
                    edit_police(id);
                }
                <?php  }?>
            }
        }).datagrid('getPager');


    });

    
    function sync_police() {
        $('#com_edit').dialog({
            title: '同步民警信息',
            width: 1400,
            height: 800,
            top:50,
           // left:250,
            closed: false,
            cache: false,
            href: '<?=$this->base_url?>&m=show_sync_list',
            modal: true,
            buttons: [{
                    text:'关闭',
                    handler:function(){
                       // $('#com_edit').dialog("close");
                    }}
            ],
            onClose:function () {
                $('#com_edit').window('resize');
            }
        });
    }


    function  edit_police(id) {

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
            height: 650,
            top:100,
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

    function dels_police() {
        var ids = [];
        var rows = $('#<?=$this->datagrid?>_dgd').datagrid('getSelections');
        if(rows.length < 1){$.messager.alert('操作提示',"请选择一行后再操作！",'warning');return false;}
        for(var i=0; i<rows.length; i++){
            ids.push(rows[i].id);
        }
        ids = ids.join(',');
        del_police(ids);
    }

    function del_police(ids) {
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


    function police_search() {
        var title = $("#<?=$this->datagrid?>_title").val().length > 0 ? $("#<?=$this->datagrid?>_title").val() : "";
        var sex = $("#<?=$this->datagrid?>_sex").val().length > 0 ? $("#<?=$this->datagrid?>_sex").val() : "";
        var mz = $("#<?=$this->datagrid?>_mz").val() != '请选择' ? $("#<?=$this->datagrid?>_mz").val() : "";

        $('#<?=$this->datagrid?>_dgd').datagrid('load',{
            'title':title,
            'sex':sex,
            'mz':mz
        });
    }

</script>

