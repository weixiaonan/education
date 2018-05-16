
<div style="padding:5px 0px;margin: 0px 5px;">
    <form id="<?=$form_id?>" method="post">
        <input type="hidden" name="id" value="<?=$value['id']?>">
        <table cellpadding="5">

            <tr>
                <td class="input_tit60">申请名称:</td>
                <td>
                    <input style="width: 400px;"  id="flow_path_id" class="easyui-combobox" name="value[flow_id]"
                           data-options="value:'<?=$value['flow_id']?>',editable:false,required:true,valueField:'id',textField:'name',url:'index.php?d=admin&c=Flow_path&m=get_flow'" />

                </td>
            </tr>

            <tr>
                <td class="input_tit60">说明:</td>
                <td>

                    <textarea name="value[content]" style="width: 250px;height:80px;" id="<?=$this->datagrid?>content" class="form-control"><?=$value['content']?></textarea>
                </td>
            </tr>

        </table>

    </form>
</div>

<script>
    KindEditor.ready(function(K) {
        K.create('#<?=$this->datagrid?>content',{
            urlType :'relative',
            width:"100%",
            items : [
                'fontname', 'fontsize', '|', 'forecolor', 'hilitecolor', 'bold', 'italic', 'underline',
                'removeformat', '|', 'justifyleft', 'justifycenter', 'justifyright', 'insertorderedlist',
                'insertunorderedlist', '|', 'emoticons', 'image', 'link']
            ,afterChange:function(){
                this.sync();
            },afterBlur:function(){
                this.sync();
            }
        });
    });
</script>


