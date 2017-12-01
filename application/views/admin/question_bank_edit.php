
<div style="padding:5px 0px;margin: 0px 5px;">
    <form id="<?=$form_id?>" method="post">
        <input type="hidden" name="id" value="<?=$value['id']?>">
        <table cellpadding="5">

            <tr>
                <td class="input_tit60">题目:</td>
                <td>
                    <input style="width: 400px;height:50px;"  class="easyui-textbox" type="text" name="value[question]" value="<?=$value['question']?>"  data-options="required:true,multiline:true"></input>

                </td>
            </tr>
        <?php $arr = array('A.', 'B.', 'C.', 'D.');foreach($arr as $k=>$v){ ?>
            <tr>
                <td class="input_tit60"><?=$v?>选项:</td>
                <td>
                    <input class="easyui-textbox input_w_400" type="text" name="value[answer][]" value="<?=$value['answer'][$k] ? $value['answer'][$k] : $v?>"  data-options="required:true"></input>
                </td>
            </tr>
        <?php }?>

            <tr>
                <td class="input_tit60">正确答案:</td>
                <td>
                    <input class="easyui-textbox input_w_400" type="text" name="value[correct]" value="<?=$value['correct']?>"  data-options="required:true,prompt:'填数字，A就是1'"></input>
                </td>
            </tr>

        </table>

    </form>
</div>


