
<div style="padding:5px 0px;margin: 0px 5px;">
    <form id="<?=$form_id?>" method="post">
        <input type="hidden" name="value[type]" value="<?=$type?>">
        <input type="hidden" name="value[data_id]" value="<?=$id?>">
        <input type="hidden" name="id" value="<?=$value[id]?>">
        <table cellpadding="5">

            <tr>
                <td class="input_tit60">您的姓名:</td>
                <td>
                    <input class="easyui-textbox" type="text" name="value[name]" value="<?=$value['name']?>"  data-options="required:true"></input>
                </td>
            </tr>

            <tr>
                <td class="input_tit60">评价分数:</td>
                <td>
                    <input class="easyui-numberbox" type="text" name="value[score]" value="<?=$value['score']?>"  data-options="required:true,min:0,max:100"></input>
                </td>
            </tr>

            <tr>
                <td class="input_tit60">评价内容:</td>
                <td>
                    <input style="width: 400px;height:80px;"  class="easyui-textbox" type="text" name="value[title]" value="<?=$value['title']?>"  data-options="multiline:true"></input>

                </td>
            </tr>

        </table>

    </form>
</div>

<script>

</script>


