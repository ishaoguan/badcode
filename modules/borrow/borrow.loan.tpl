<div class="module_add">
<form action="{$_A.query_url}/loan" method="post" enctype="multipart/form-data">	
	<div class="module_title"><strong>发布借款</strong><font style="color:red">（温馨提示：发布借款时，请先查看此借款人是否有借款额度，如没有，则请需先<a href="/?dyryr&q=code/borrow/amount">添加</a>；抵押标=抵押额度，流转标=授信额度）</font></div>
	<div class="module_border">
		<div class="l">借款人：</div>
		<div class="c">
		<input type="text" name="username" id="username" onblur="checkusername()" style="width:200px;  height:18px;">
		<input type="hidden" name="borrow_type" value="{$magic.request.type_nid}" />	<span class="warning" style="color:#FF0000" id="username_notice"></span>
		</div>
	</div>
	<div class="module_border">
		<div class="l">借款标题：</div>
		<div class="c">
		<input type="text" name="name" id="name" style="width:200px;  height:18px;">
		</div>
	</div>	
	<div class="module_border">
		<div class="l">借款金额：</div>
		<div class="c">
		<input type="text" name="account" id="account" style="width:100px;" onkeyup="value=value.replace(/[^0-9.]/g,'')" />元（借款金额{$_A.borrow_type_result.amount_first}元-{$_A.borrow_type_result.amount_end}元{if $_A.borrow_type_result.account_multiple>0}，需为{$_A.borrow_type_result.account_multiple}的倍数{/if}） 
		</div>
	</div>
	<div class="module_border">
		<div class="l">借款期限：</div>
		<div class="c">
		{if $_A.borrow_type_result.period_first==$_A.borrow_type_result.period_end}
		<input type="hidden" name="borrow_period"  id="borrow_period"  value="{$_A.borrow_type_result.period_first}" />{$_A.borrow_type_result.period_first}个月
		{else}
		<select name="borrow_period">
		{foreach from=$_A.borrow_type_result.period_result key=key item=item}<option value='{$item.value}'>{$item.name}</option>{/foreach}
		</select>
		{/if}
		</div>
	</div>
	<div class="module_border">
		<div class="l">年利率：</div>
		<div class="c">
		<input type="text" name="borrow_apr" id="borrow_apr" style="width:50px; border:#BFBFBF solid 1px; height:18px;" onkeyup="value=value.replace(/[^0-9.]/g,'')" />% 
	
		（利率精确到小数点后两位，范围{$_A.borrow_type_result.apr_first}%-{$_A.borrow_type_result.apr_end}%之间）<font style="color:#999999">一般来说借款利率越高，借款速度越快。</font>
		</div>
	</div>	
	<div class="module_border">
		<div class="l">还款方式：</div>
		<div class="c">
		<select name='borrow_style' >{foreach from=$_A.borrow_type_result.style_result key=key item=item}<option value='{$item.nid}'>{$item.name}</option>{/foreach}</select>
		</div>
	</div>
	<div class="module_border" >
		<div class="l">债权转让：</div>
		<div class="c"><label style="margin-right:5px;"><input type="radio" name="sell[ok]" value="1" onclick="sell_info(this)">是</label><label><input type="radio" name="sell[ok]" value="0" onclick="sell_info(this)" checked="checked">否</label></div>
	</div>
	<div class="module_border" id="sell_info" style="display:none;">
		<div class="l">债权转让信息：</div>
		<div class="c">
			<label for="sell_name">借款人：</label><input type="text" name="sell[name]" id="sell_name"></br>
			<label for="sell_name">借款总额：</label><input type="text" name="sell[total]" id="sell_total" onkeyup="value=value.replace(/[^0-9.]/g,'')">元</br>
			<label for="sell_name">合同签订时间：</label><input type="text" name="sell[signing]" id="sell_signing" onclick="change_picktime()" readonly="readonly"></br>
			<label for="sell_name">放款日：</label><input type="text" name="sell[loan]" id="sell_loan" onclick="change_picktime()" readonly="readonly"></br>
		</div>
	</div>
    <div class="module_border">
		<div class="l">投标奖励：</div>
		<div class="c"><label style="margin-right:5px;"><input type="radio" name="award_status" value="0" onclick="award_info(this)" checked="checked">关闭</label><label style="margin-right:5px;"><input type="radio" name="award_status" value="1" onclick="award_info(this)">奖励固定金额</label><label><input type="radio" name="award_status" value="2" onclick="award_info(this)">按比例奖励</label></div>
	</div>
    <div class="module_border award_info" style="display:none;">
		<div class="l">投标奖励先后设置：</div>
		<div class="c"><label style="margin-right:5px;"><input type="radio" name="award_false" value="1" checked="checked">投标成功即奖励</label><label><input type="radio" name="award_false" value="0">投标成功后奖励和利息一起发放</label></div>
	</div>
    <div class="module_border award_info" style="display:none;">
		<div class="l">投标奖励标准：</div>
		<div class="c"><label style="margin-right:5px;" id="award_scale">奖励比例:<input type="text" name="award_scale">（奖励比例到小数点后两位，范围{$_A.borrow_type_result.award_scale_first}%-{$_A.borrow_type_result.award_scale_end}%之间）</label><label id="award_account">奖励金额：<input type="text" name="award_account" value="2" onclick="sell_info(this)">（奖励金额保留到小数点后两位，范围{$_A.borrow_type_result.award_account_first}元-{$_A.borrow_type_result.award_account_end}元之间）</label></div>
	</div>
    <div class="module_border">
		<div class="l">续投奖励开启：</div>
		<div class="c"><label style="margin-right:5px;"><input type="radio" name="continued_status" value="0" onclick="continued_info(this)" checked="checked">关闭</label><label style="margin-right:5px;"><input type="radio" name="continued_status" value="1" onclick="continued_info(this)">奖励固定金额</label><label><input type="radio" name="continued_status" value="2" onclick="continued_info(this)">按比例奖励</label></div>
	</div>
    <div class="module_border continued_info" style="display:none;">
		<div class="l">续投奖励标准：</div>
		<div class="c"><label style="margin-right:5px;" id="continued_2">奖励比例:<input type="text" name="continued_2">（奖励比例到小数点后两位，范围{$_A.borrow_type_result.award_scale_first}%-{$_A.borrow_type_result.award_scale_end}%之间）</label><label id="continued_1" style="margin-right:5px;display:none">奖励金额：<input type="text" name="continued_1" onclick="sell_info(this)">（奖励金额保留到小数点后两位，范围{$_A.borrow_type_result.award_account_first}元-{$_A.borrow_type_result.award_account_end}元之间）</label></div>
	</div>
    <div class="module_border continued_info" style="display:none;">
		<div class="l">续投奖励限制（最小额）：</div>
		<div class="c"><label style="margin-right:5px;"><input type="text" name="continued_min" value="5000"></label></div>
	</div>
	{if $magic.request.type_nid!="roam"}
	<div class="module_border" >
		<div class="l">担保机构：</div>
		<div class="c">
	<input type="text" name="pawnins"  id="pawnins" value=""/>
	</div>	
	<div class="module_border">
		<div class="l">有效期：</div>
		<div class="c">
		<select name='borrow_valid_time' >{foreach from=$_A.borrow_type_result.validate_result key=key item=item}<option value='{$item.value}'>{$item.name}</option>{/foreach}</select>
		</div>
	</div>	
	<div class="module_border">
		<div class="l">最低投标金额：</div>
		<div class="c">
		<select name='tender_account_min' >{foreach from=$_A.borrow_type_result.tender_account_min_result key=key item=item}<option value='{$item}'>{if $item==0}不限{else}{$item}元{/if}</option>{/foreach}</select>
		</div>
	</div>
	<div class="module_border">
		<div class="l">最多投标总额：</div>
		<div class="c">
		<select name='tender_account_max' >{foreach from=$_A.borrow_type_result.tender_account_max_result key=key item=item}<option value='{$item}'>{if $item==0}不限{else}{$item}元{/if}</option>{/foreach}</select>
		</div>
	</div>
	
	{/if}	
	
	{if $magic.request.type_nid=="roam"}
	<div class="module_border" >
		<div class="l">最小流转单位：</div>
		<div class="c">
	<input type="text" name="account_min" onblur="roamnum()"  id="account_min" value="" onkeyup="value=value.replace(/[^0-9]/g,'')" />元（流转份数: <span id=roam_num>0</span> 份）
	</div>
	<div class="module_border" >
		<div class="l">担保机构：</div>
		<div class="c">
	<input type="text" name="voucher"  id="voucher" value=""/>
	</div>
	<div class="module_border" >
		<div class="l">反担保方式：</div>
		<div class="c">
	<input type="text" name="vouch_style"  id="vouch_style" value=""/>
	</div>
	<div class="module_border" >
		<div class="l">借款方商业概述：</div>
		<div class="c">
	<textarea id="borrow_contents" name="borrow_contents"  style="width:530px;height:200px;"></textarea>
	</div>
	<div class="module_border" >
		<div class="l">借款方资产情况：</div>
		<div class="c">
	<textarea id="borrow_account" name="borrow_account"  style="width:530px;height:200px;"></textarea>	
	</div>
	<div class="module_border" >
		<div class="l">借款方资金用途：</div>
		<div class="c">
	<textarea id="borrow_account_use" name="borrow_account_use"  style="width:530px;height:200px;"></textarea>	
	</div>
	<div class="module_border" >
		<div class="l">风险控制措施：</div>
		<div class="c">
	 <textarea id="risk" name="risk"  style="width:530px;height:200px;"></textarea>	
	</div>
	{else}
	<div class="module_border" >
		<div class="l">借款详情：</div>
		<div class="c">
	 <textarea rows="5" cols="70" name="borrow_contents"></textarea>
	</div>
	{/if}
	<div class="module_border" >
		<div class="l">验证码：</div>
		<div class="c">
	 <input name="valicode" type="text" class="in_text" style="width:50px;"/><img src="/?plugins&q=imgcode" id="valicode" alt="点击刷新" onClick="this.src='/?plugins&q=imgcode&t=' + Math.random();" align="absmiddle" style="cursor:pointer" /><em>看不清？<a href="javascript:void(0)" onClick="$('#valicode').attr('src','/?plugins&q=imgcode&t=' + Math.random());">换一张！</a>
	</div>
	<div class="module_border" >
		<div class="l">&nbsp;</div>
		<div class="c">
	 <input type="submit" value="提交" /><input type="hidden" name="status" value="1" />
	</div>	
	</form>	
	</div>
	{literal}
<script>

function checkusername(){
	var username = $("#username").val();
	if(username!=''){
		$.ajax({
				type:"get",
				url:'/?user&q=login',
				data:'&q=check_username&username='+username,
				success:function(result){
					if (result=="1"){
						msg = "";	
					}else{
						msg = "<font color='red'>用户名不存在</font>";	
					}
					$("#username_notice").html(msg);
				},
				cache:false
			});
		
	}else{
		$("#username_notice").html();
	}
}

function roamnum(){
	var account = $("#account").val();
	var account_min = $("#account_min").val();
	if(account_min!=''){
		var num = account/account_min;	
		$("#roam_num").html(Math.floor(num));
	}else{
		$("#roam_num").html(0);
	}
}

function sell_info(d){
	if($(d).val()==1){
	$('#sell_info').show();
	}else{
	$('#sell_info').hide();
	}
}
function award_info(d){
    if($(d).val()==0){
	    $('.award_info').hide();
	}else{
	    $('.award_info').show();
	}
    if($(d).val()==1){
        $('#award_scale').hide();
        $('#award_account').show();
    }else if($(d).val()==2){
        $('#award_account').hide();
        $('#award_scale').show();
    }
}
function continued_info(d){
    if($(d).val()==0){
	    $('.continued_info').hide();
	}else{
	    $('.continued_info').show();
	}
    if($(d).val()==1){
        $('#continued_2').hide();
        $('#continued_1').show();
    }else if($(d).val()==2){
        $('#continued_1').hide();
        $('#continued_2').show();
    }
}
</script>
{/literal}
	