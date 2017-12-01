<div id="<?=$this->datagrid?>_heard" style="height:35px;padding:2px 5px;">
    <?php if(role_check($upload_access)){?>
    <form style="float: left;margin-right: 50px;" id="<?=$this->datagrid?>_form"  method="post" enctype="multipart/form-data">
        <input value="<?=$type?>" name="type" type="hidden">
        <input value="<?=$id?>" name="data_id" type="hidden">
        <input name="upload_file" id="<?=$this->datagrid?>_file" style="width:300px">
    </form>
    <?php } ?>
    <?php if(role_check($del_access)){?>
        <a href="#" onclick="dels_<?=$this->datagrid?>()" class="easyui-linkbutton" iconCls="icon-remove" plain="true">删除</a>
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
        <th data-options="field:'file_name'" width="80">名称</th>
        <th data-options="field:'file_size'" width="20">大小</th>
        <th data-options="field:'file_ext'" width="20">类型</th>
        <th data-options="field:'download_num'" width="20">下载次数</th>
        <th data-options="field:'name'" width="20">上传人</th>
        <th data-options="field:'add_time'" width="80">添加时间</th>
        <th data-options="field:'button',align:'left',formatter:attach_operate" width="20">操作</th>
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
            url:'index.php?d=admin&c=Attachment&m=list_data&type=<?=$type?>&data_id=<?=$data_id?>',
            onBeforeLoad: function (param) {
                $('#<?=$this->datagrid?>_dgd').datagrid('loading');

            },
            onLoadSuccess:function(data){
                $('.attach-button').linkbutton({
                });
            },
            onLoadError: function (data) {
                $.messager.alert('系统提示','数据加载出错','error');
            },
            onAfterEdit:function(index,row,changes) {

            },onDblClickRow:function(rowIndex,rowData){


            }
        }).datagrid('getPager');//enableCellEditing

        $('#<?=$this->datagrid?>_file').filebox({
            buttonText: '上传<?=$btn_text?>',
            onChange:function(){
                $.messager.progress();
                $('#<?=$this->datagrid?>_form').form('submit', {
                    url:'index.php?d=admin&c=Attachment&m=upload',
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
                        $('#<?=$this->datagrid?>_file').filebox('setValue','');
                        $('#<?=$this->datagrid?>_file').filebox('setText','');
                        if(data.success){
                            $.messager.alert('操作提示',data.message,'info',function () {
                                $('#<?=$this->datagrid?>_dgd').datagrid('reload');
                            });
                        }else{
                            $.messager.alert('操作提示',data.message,'error');
                        }
                    }
                });
            }
        })
    });

    function attach_operate(value,row,index) {
        var btns  = '';
        <?php if(role_check($download_access)){?>
        if(row.is_exits>0) {
            btns += "<a href='#' onclick='download_attach(" + row.id + ")'  class='attach-button button-info'>下载</a>&nbsp;&nbsp;";
        }else{
            btns += "<a href='#'   class='font-red'>文件不存在</a>&nbsp;&nbsp;";
        }
        <?php } ?>
        return btns;
    }
    
    function download_attach(id) {
        //取消选择行
        $('#<?=$this->datagrid?>_dgd').datagrid('clearSelections');
        window.location.href = 'index.php?d=admin&c=Attachment&m=download&id=' +id;
    }

    function dels_attachment() {
        var ids = [];
        var rows = $('#<?=$this->datagrid?>_dgd').datagrid('getSelections');
        if(rows.length < 1){$.messager.alert('操作提示',"请选择一行后再操作！",'warning');return false;}
        for(var i=0; i<rows.length; i++){
            ids.push(rows[i].id);
        }
        ids = ids.join(',');
        del_attachment(ids);
    }

    function del_attachment(ids) {
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


    function attachment_search() {
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

