
<div style="padding:5px 0px;margin: 0px 5px;">
    <form id="<?=$form_id?>" method="post">
        <input type="hidden" name="id" value="<?=$value['id']?>">
        <table cellpadding="5">

            <tr>
                <td class="input_tit60">姓名:</td>
                <td>
                    <input class="easyui-textbox" type="text" name="value[name]" value="<?=$value['name']?>"  data-options="required:true"></input>
                </td>
            </tr>

            <tr>
                <td class="input_tit60">性别:</td>
                <td height="30">
                    <input class="easyui-radiobox" name="value[sex]" data-options="label:'男'" value="1" <?php if($value['sex'] == 1) echo 'checked'; ?>>
                    <input class="easyui-radiobox" name="value[sex]" data-options="label:'女'" value="0" <?php if($value['sex'] == 0) echo 'checked'; ?>>
                </td>
            </tr>

            <tr>
                <td class="input_tit60">警号:</td>
                <td>
                    <input     name="value[police_num]" value="<?=$value['police_num']?>" type= "text" class= "easyui-textbox" required =""> </input>
                </td>
            </tr>

            <tr>
                <td class="input_tit60">出生年月:</td>
                <td>
                    <input  id="dd"  name="value[birth]" value="<?=$value['birth']?>" type= "text" class= "easyui-datebox" required =""> </input>
                </td>
            </tr>

            <tr>
                <td class="input_tit60">所教课程:</td>
                <td>
                    <input style="width: 400px;"  id="good_at_c" class="easyui-combobox" name="curriculum_id[]"
                           data-options="multiple:true,editable:false,required:true,valueField:'id',textField:'training_name',url:'index.php?d=admin&c=Curriculum&m=get_curriculum'" />

                </td>
            </tr>

            <tr>
                <td class="input_tit60">工作单位:</td>
                <td>
                    <input     name="value[work_unit]" value="<?=$value['work_unit']?>" type= "text" class= "easyui-textbox input_w_400" required =""> </input>
                </td>
            </tr>

            <tr>
                <td class="input_tit60">教官类别:</td>
                <td>
                    <input     name="value[style]" value="<?=$value['style']?>" type= "text" class= "easyui-textbox input_w_400" required =""> </input>
                </td>
            </tr>

            <tr>
                <td class="input_tit60">专长:</td>
                <td>
                    <input style="width: 400px;height:80px;" class="easyui-textbox input_w_400" type="text" name="value[speciality]" value="<?=$value['speciality']?>"  data-options="multiline:true"></input>

                </td>
            </tr>

            <tr>
                <td class="input_tit60">经历:</td>
                <td>
                    <input style="width: 400px;height:80px;" class="easyui-textbox input_w_400" type="text" name="value[experience]" value="<?=$value['experience']?>"  data-options="multiline:true"></input>

                </td>
            </tr>

        </table>

    </form>
</div>

<script>
    $(function () {
        $('#good_at_c').combobox({
            onLoadSuccess: function () {
                var good_at_type_ids = "<?=$value['curriculum_id']?>";
                if(good_at_type_ids != ""){
                    var ids = good_at_type_ids.split(",");
                    $('#good_at_c').combobox('setValues', ids);
                }

            }
        })

    })
</script>


