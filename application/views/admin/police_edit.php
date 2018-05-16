
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
                <td class="input_tit60">出生年月:</td>
                <td>
                    <input  id="dd"  name="value[birth_time]" value="<?=$value['birth_time']?>" type= "text" class= "easyui-datebox" required =""> </input>
                </td>
            </tr>

            <tr>
                <td class="input_tit60">民族:</td>
                <td>
                    <input   id="good_at_type" class="easyui-combobox" name="value[mz]"
                           data-options="prompt:'请选择',value:'<?=$value['mz']?>',editable:false,required:true,valueField:'mz_title',textField:'mz_title',url:'index.php?d=admin&c=Police&m=get_mz'" />

                </td>
            </tr>

            <tr>
                <td class="input_tit60">籍贯:</td>
                <td>
                    <input  class="easyui-textbox input_w_400" type="text" name="value[jiguan]" value="<?=$value['jiguan']?>"  data-options=""></input>

                </td>
            </tr>

            <tr>
                <td class="input_tit60">身份证号:</td>
                <td>
                    <input  class="easyui-textbox input_w_400" type="text" name="value[sfz]" value="<?=$value['sfz']?>"  data-options="required:true"></input>

                </td>
            </tr>

            <tr>
                <td class="input_tit60">警号:</td>
                <td>
                    <input  class="easyui-textbox input_w_400" type="text" name="value[job_num]" value="<?=$value['job_num']?>"  data-options=""></input>

                </td>
            </tr>

            <tr>
                <td class="input_tit60">政治面貌:</td>
                <td>
                    <input  class="easyui-textbox input_w_400" type="text" name="value[political_status]" value="<?=$value['political_status']?>"  data-options=""></input>

                </td>
            </tr>

            <tr>
                <td class="input_tit60">学历:</td>
                <td>
                    <input  class="easyui-textbox input_w_400" type="text" name="value[xueli]" value="<?=$value['xueli']?>"  data-options=""></input>

                </td>
            </tr>

            <tr>
                <td class="input_tit60">专业:</td>
                <td>
                    <input  class="easyui-textbox input_w_400" type="text" name="value[zhuanye]" value="<?=$value['zhuanye']?>"  data-options=""></input>

                </td>
            </tr>

            <tr>
                <td class="input_tit60">工作单位:</td>
                <td>
                    <input  class="easyui-textbox input_w_400" type="text" name="value[in_org]" value="<?=$value['in_org']?>"  data-options=""></input>

                </td>
            </tr>

            <tr>
                <td class="input_tit60">职务:</td>
                <td>
                    <input  class="easyui-textbox input_w_400" type="text" name="value[position]" value="<?=$value['position']?>"  data-options=""></input>

                </td>
            </tr>

            <tr>
                <td class="input_tit60">所属部门:</td>
                <td>
                    <input  class="easyui-textbox input_w_400" type="text" name="value[department]" value="<?=$value['department']?>"  data-options=""></input>

                </td>
            </tr>


            <tr>
                <td class="input_tit60">文体类特长:</td>
                <td>
                    <input  class="easyui-textbox input_w_400" type="text" name="value[specialty]" value="<?=$value['specialty']?>"  data-options=""></input>

                </td>
            </tr>



            <tr>
                <td class="input_tit60">联系电话:</td>
                <td>
                    <input  class="easyui-textbox input_w_400" type="text" name="value[tel]" value="<?=$value['tel']?>"  data-options=""></input>

                </td>
            </tr>

            <tr>
                <td class="input_tit60">家庭地址:</td>
                <td>
                    <input  class="easyui-textbox input_w_400" type="text" name="value[family_address]" value="<?=$value['family_address']?>"  data-options=""></input>

                </td>
            </tr>

            <tr>
                <td class="input_tit60">现在住址:</td>
                <td>
                    <input  class="easyui-textbox input_w_400" type="text" name="value[now_address]" value="<?=$value['now_address']?>"  data-options=""></input>

                </td>
            </tr>



        </table>

    </form>
</div>



