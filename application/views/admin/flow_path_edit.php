
<div style="padding:5px 0px;margin: 0px 5px;">
    <form id="<?=$form_id?>" method="post">
        <input type="hidden" name="id" value="<?=$value['id']?>">
        <table cellpadding="5" style="width: 95%;">

            <tr>
                <td style="width: 120px;" class="input_tit60">流程名称:</td>
                <td>
                    <input style="width:100%" class="easyui-textbox" type="text" name="value[title]" value="<?=$value['name']?>"  data-options="required:true"></input>
                </td>
            </tr>

            <tr>
                <td class="input_tit60">流程顺序:</td>
                <td>


                    <input name="value[path][]" class="easyui-tagbox" label="" style="width:100%" data-options="
				url: 'index.php?d=admin&c=Flow_path&m=get_user_list',
				method: 'get',
				value: '<?=$flow_path?>',
				valueField: 'id',
				textField: 'nickname',
				limitToList: true,
				hasDownArrow: true,
				prompt: '',
				tagFormatter: function(value, row){
				    if (!row) return;
                    return '' + row.name + '=>';
        }
			">

                </td>
            </tr>



        </table>

    </form>
</div>

<script>



</script>


