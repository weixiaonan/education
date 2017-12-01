<div id="<?=$this->datagrid?>_heard" style="height:35px;padding:2px 5px;">
    <?php if(role_check(36)){?>
        <a href="#" onclick="edit_<?=$this->datagrid?>('add')" class="easyui-linkbutton" iconCls="icon-add" plain="true">添加</a>
    <?php } if(role_check(37)){?>
        <a href="#" onclick="edit_<?=$this->datagrid?>(0)"class="easyui-linkbutton" iconCls="icon-edit" plain="true">编辑</a>
    <?php } if(role_check(39)){?>
        <a href="#" onclick="dels_<?=$this->datagrid?>()" class="easyui-linkbutton" iconCls="icon-remove" plain="true">批量删除</a>
    <?php } ?>
</div>


<div id="<?=$this->datagrid?>_toolbar">
    姓名:<input class="easyui-textbox" type="text" id="<?=$this->datagrid?>_title" name="name" data-options="prompt:'模糊查找'" />
    &nbsp; &nbsp;
    课程： <input   id="sele_training_c_id" class="easyui-combobox"
               data-options="" />



    <a href="javascript:void(0);" style="margin:0px 10px 0px 15px;width: 78px;" class="easyui-linkbutton" iconCls="icon-search" onclick="<?=$this->datagrid?>_search();"> 搜 索 </a>
</div>

<table id="<?=$this->datagrid?>_dgd">
    <thead>
    <tr>
        <th data-options="field:'id',checkbox:true"></th>
        <th data-options="field:'name'" width="50">姓名</th>
        <th data-options="field:'sign_in'" width="30">签到时间</th>
        <th data-options="field:'score'" width="10">分数</th>
        <th data-options="field:'ranking'" width="10">排名</th>
        <th data-options="field:'training_time'" width="20">训练时间</th>
        <th data-options="field:'is_overtime'" width="10">是否超时</th>
        <th data-options="field:'curriculum_name'" width="30">训练课程</th>
        <th data-options="field:'training_pro_info'" width="50">训练过程信息</th>
        <th data-options="field:'add_time'" width="120">添加时间</th>

    </tr>
    </thead>
</table>

<script type="text/javascript">

    $(function(){

        $.ajax({
            url:'index.php?d=admin&c=Curriculum&m=get_curriculum',
            dataType: 'json',
            success: function (jsonstr) {
                jsonstr.unshift({
                    'id': '',
                    'training_name': '-请选择-'
                });//向json数组开头添加自定义数据
                $('#sele_training_c_id').combobox({
                    editable:false,
                    valueField:'id',
                    textField:'training_name',
                    data: jsonstr,
                    onLoadSuccess: function () { //加载完成后,设置选中第一项
                        var val = $(this).combobox('getData');
                        for (var item in val[0]) {
                            if (item == 'id') {
                                $(this).combobox('select', val[0][item]);
                            }
                        }
                    }
                });
            }
        });



        var obj = $('#<?=$this->datagrid?>_dgd').datagrid({
            rownumbers:true,
            fit:true,
            header:'#<?=$this->datagrid?>_heard',
            toolbar:'#<?=$this->datagrid?>_toolbar',
            pagination:true,
            checkOnSelect:false,
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
                <?php  if(role_check(37)){?>
                var id = rowData.id;
                if(id){
                    edit_training_files(id);
                }
                <?php  }?>
            }
        }).datagrid('getPager');//enableCellEditing


    });






    function  edit_training_files(id) {

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
            height: 430,
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

    function dels_training_files() {
        var ids = [];
        var rows = $('#<?=$this->datagrid?>_dgd').datagrid('getSelections');
        if(rows.length < 1){$.messager.alert('操作提示',"请选择一行后再操作！",'warning');return false;}
        for(var i=0; i<rows.length; i++){
            ids.push(rows[i].id);
        }
        ids = ids.join(',');
        del_training_files(ids);
    }

    function del_training_files(ids) {
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


    function training_files_search() {
        var title     = $("#<?=$this->datagrid?>_title").val().length > 0 ? $("#<?=$this->datagrid?>_title").val() : "";
        var sele_c_id = $("#sele_training_c_id").val().length > 0 ? $("#sele_training_c_id").val() : "";

        $('#<?=$this->datagrid?>_dgd').datagrid('load',{
            'title':title,
            'c_id' :sele_c_id
         //   'good_at_type':good_at_type
        });
    }

</script>

