
<div style="padding:5px 0px;margin: 0px 5px;">
    <form id="<?=$form_id?>" method="post">
        <input type="hidden" name="id" value="<?=$value['id']?>">
        <table cellpadding="5">

            <tr>
                <td class="input_tit60">考试名称:</td>
                <td>
                    <input class="easyui-textbox input_w_400" type="text" name="value[title]" value="<?=$value['title']?>"  data-options="required:true"></input>
                </td>
            </tr>

            <tr>
                <td class="input_tit60">考试起止时间:</td>
                <td>
                    <input  id="st"  style="width: 170px;"  name="value[start_time]" value="<?=$value['start_time']?>" type= "text" class= "easyui-datetimebox" data-options="showSeconds:false,required:true"> </input>
                    至
                    <input  id="et" style="width: 170px;" name="value[end_time]" value="<?=$value['end_time']?>" type= "text" class= "easyui-datetimebox" data-options="showSeconds:false,required:true"> </input>
                </td>
            </tr>

            <tr>
                <td class="input_tit60">考试用时:</td>
                <td>
                    <input class="easyui-numberbox" type="text" name="value[exam_time]" value="<?=$value['exam_time']?>"  data-options="required:true,min:1"></input>分钟
                </td>
            </tr>

            <tr>
                <td class="input_tit60">是否用预约:</td>
                <td>
                     <span class="radioSpan">
                         <input type="radio" name="value[used_book]" <?php if($value['used_book'] == 1) echo 'checked'; ?> value="1">是</input>
                         <input type="radio" name="value[used_book]" <?php if($value['used_book'] == 0) echo 'checked'; ?> value="0">否</input>

                     </span>
                </td>
            </tr>


            <tr>
                <td class="input_tit60">考试简介:</td>
                <td>
                  <!--  <input style="width: 400px;height:80px;"  class="easyui-textbox" type="text" name="value[content]" value="<?/*=$value['content']*/?>"  data-options="multiline:true"></input>
                 -->
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
            width:"90%",
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


