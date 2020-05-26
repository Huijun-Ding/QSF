<!DOCTYPE html>
<html lang="zh-cn">
<head>
	<meta charset="UTF-8">
	<title>Pagelation</title>
	<script src="http://libs.baidu.com/jquery/1.8.3/jquery.min.js"></script>
</head>
<body>
	<style>
		.rptIntfPortlet {
		    width: 1100px;
		    margin: 0px auto;
		}
		.rptIntfPortlet .portletBody .showSection{
			font-size: 12px;
		}
		.rptIntfPortlet .searchSection label input {
		    margin-left: 10px;
		}
		.rptIntfPortlet .searchSection label {
		    display: inline-block;
		}
		.rptIntfPortlet .searchSection label:nth-child(2) {
		    margin-left: 30px;
		    margin-right: 180px;
		}
		.rptIntfPortlet .searchSection label:nth-child(4) {
		    margin-left: 190px;
		}
		.rptIntfPortlet .searchSection label:nth-child(4) input {
		    height: 30px;
		    width: 100px;
		    margin-top: -8px;
		    /* border-radius: 0px; */
		}
		.rptIntfPortlet .portletBody .showSection .showMessage{
			min-height: 450px;
			/* border:1px solid black; */
		}
		.rptIntfPortlet .portletBody .showSection .showMessage table{
			border-collapse: collapse;
    		color: #333;
    		font-size: 14px;
		}
		.rptIntfPortlet .portletBody .showSection .showMessage table tr:first-child{
			background-color: #e5e5e5;
		}
		.rptIntfPortlet .showSection .showMessage table tr{
			background-color: white;
			height: 40px;
		}
		.rptIntfPortlet  .showSection .showMessage table tr:nth-child(2n+1){
			background-color:#fafafa;
		}
		/* .rptIntfPortlet  .showSection .showMessage table tr:hover{
			background-color:#e6e6e6;
			border: 1px solid white;
		} */
		.rptIntfPortlet .portletBody .showSection .showMessage table th{
			border-right: 1px solid white;
		    border-top: 1px solid #e5e5e5;
		    border-bottom: 1px solid #e5e5e5;
		    border-left: 1px solid #e5e5e5;
		}
		.rptIntfPortlet .portletBody .showSection .showMessage table th:last-child{
			border-right: 1px solid #e5e5e5;
		}
		.rptIntfPortlet .portletBody .showSection .showMessage table td{
			border: 1px solid #e5e5e5;
			text-align: center;
		}
		.rptIntfPortlet .portletBody .showSection .showBody .showMore span.input span{
			display: inline-block;
			border:1px solid #999;
			padding: 0px 8px;
			margin: 0px 2px;
			color: #3B5998;
			background-color:white;
			text-decoration: none;
			height: 22px;
			line-height: 22px;
			border-radius: 3px;
			cursor: pointer;
		}
		.rptIntfPortlet .portletBody .showSection .showMore {
		    text-align: center;
		    margin-top: 10px;
		}
		.hidden{
			display: none !important;
		}
		.inputSelect{
			background-color: #3B5998 !important;
    		color: white !important;
		}
		.rptIntfPortlet .searchSection .searchBody .errorMessage{
			color:red;
			font-weight:bold;
			position:absolute;
			height: 37px;
    		line-height: 30px;
		}
		
	</style>
	<div class="rptIntfPortlet">
		<div class="portletBody">

			<div class="showSection">
				<div class="showBody">
					<div class="showMessage">
						<table width="1100px">
							<tr class="title">
								<th style="min-width: 44px;">Titre</th>
								<th style="min-width: 44px;">Description</th>
								<th style="min-width: 86px;">Date butoire</th>
							</tr>
							
						</table>
					</div>
					<div class="showMore">
                                            <span class="totalNumber">Nombre de données: 8 <br></span>
                                            <span class="totalPage">Nombre de pages: 3 <br></span><br>
						<span class="before input hidden">
							<span mark="1" οnclick="servlet(this)">Première page</span>
							<span mark="1" οnclick="servlet(this)">précédent</span>
						</span>
						<span class="content input">
							<span mark="1" οnclick="servlet(this)" class="inputSelect">1</span>
						</span>
						<span class="after input">
							<span mark="1" οnclick="servlet(this)">Suivant</span>
							<span mark="1" οnclick="servlet(this)">Dernière page</span>
						</span>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script>
	var pageNumber=5;          //一页显示多少条数据
	var arrayLength=5;          //多少页码形成一组
	var totalPage=3;   			//总共的页码数
	var indexPage=1;   			//当前的页码数
	var totalArrayPage=1;    	//共多少组页码
	var showNumber=5;           //展示的内容数量
	
	//清空页面显示内容
	function clearMessage(){
		//console.log("清理数据");
		$(".rptIntfPortlet .portletBody .showSection .showMessage table tr.list").remove();
	}
	
	//点击页码触发的动作
	function servlet(item){
		clearMessage();
		indexPage=parseInt($(item).attr("mark"));
		//console.log(indexPage);
		setInput();
		selectAll('${search}');
	}
	//获取符合条件的记录数量
	function getTotalNumber(urlPath){
		beginTime=$(".rptIntfPortlet .searchBody .beginTime input").val();
		endTime=$(".rptIntfPortlet .searchBody .endTime input").val();
		$(".rptIntfPortlet .searchSection .searchBody .errorMessage").addClass("hidden");
		if(beginTime>endTime){
			//console.log("进入错误日期判断");
			$(".rptIntfPortlet .searchSection .searchBody .errorMessage").removeClass("hidden");
		}
		//console.log("开始时间为："+beginTime);
		//console.log("结束时间为："+endTime);
		$.ajax({
			url:urlPath,
			data:{beginTime:beginTime,endTime:endTime},
			dataType:'json',
			type:'post',
			success:function(data){
				var totalNumber=parseInt(data.totalNumber);
				//console.log("获取数据的长度为："+totalNumber);
				totalPage=Math.ceil(totalNumber/pageNumber);
				totalArrayPage=Math.ceil(totalPage/arrayLength);
				//在页面上设置总页数和结果总数量
				$(".rptIntfPortlet .showSection .showMore .totalNumber").text(totalNumber+"条");
				$(".rptIntfPortlet .showSection .showMore .totalPage").text("共"+totalPage+"页");
				//设置尾页的值
				$(".rptIntfPortlet .showSection .showMore span.after span:last-child").attr("mark",totalPage);
				//console.log("页码数为："+totalPage);
				indexPage=1;   //还原
				selectAll('${search}');
			},
			error:function(){
				console.log("没有获取总记录数");
			}
		});
		
	}

	//分组页码显示
	function setInput(){
		//防止当前页码大于最大页码
		if(indexPage>totalPage){
			indexPage=totalPage;
		}
		//防止当前页码小于1
		if(indexPage<1){
			indexPage=1;
		}
		var htmlCode="";
		var indexArrayPage=Math.ceil(indexPage/arrayLength);    	//当前下标是第几组页码
		var beforeArrayPage=0;      //倒数第二组的第一个下标
		var afterArrayPage=0;
		//控制首页、上一页;下一页、尾页的显示和隐藏
		$(".rptIntfPortlet .showSection .showMore span.input").removeClass("hidden");
		if(indexPage==1){
			$(".rptIntfPortlet .showSection .showMore span.before").addClass("hidden");
		}else if(indexPage==totalPage){
			$(".rptIntfPortlet .showSection .showMore span.after").addClass("hidden");
		}else{
 
		}
 
		//控制上一页、下一页中的值
		$(".rptIntfPortlet .showSection .showMore span.before span:last-child").attr("mark",(indexPage-1));
		$(".rptIntfPortlet .showSection .showMore span.after span:first-child").attr("mark",(indexPage+1));
 
		//控制页码的展示
		if(totalPage<=arrayLength){
			for(var i=1;i<=totalPage;i++){
				if(i==indexPage){
					htmlCode+='<span class="inputSelect"  οnclick="servlet(this)" mark="'+i+'">'+i+'</span>';
				}else{
					htmlCode+='<span  οnclick="servlet(this)" mark="'+i+'">'+i+'</span>';
				}
			}
			$(".rptIntfPortlet .showSection .showMore span.content").html(htmlCode);
		}else{
			if(indexArrayPage==1){
				for(var i=1;i<=arrayLength;i++){
					if(i==indexPage){
						htmlCode+='<span class="inputSelect"  οnclick="servlet(this)" mark="'+i+'">'+i+'</span>';
					}else{
						htmlCode+='<span  οnclick="servlet(this)" mark="'+i+'">'+i+'</span>';
					}
				}
				htmlCode+='<span  οnclick="servlet(this)" mark="'+(arrayLength+1)+'">...</span>';
				$(".rptIntfPortlet .showSection .showMore span.content").html(htmlCode);
			}else if(indexArrayPage==totalArrayPage){
				beforeArrayPage=(totalArrayPage-1)*arrayLength;
				htmlCode+='<span οnclick="servlet(this)" mark="'+beforeArrayPage+'">...</span>';
				for(var i=(beforeArrayPage+1);i<=totalPage;i++){
					if(i==indexPage){
						htmlCode+='<span class="inputSelect"  οnclick="servlet(this)" mark="'+i+'">'+i+'</span>';
					}else{
						htmlCode+='<span  οnclick="servlet(this)" mark="'+i+'">'+i+'</span>';
					}
				}
				$(".rptIntfPortlet .showSection .showMore span.content").html(htmlCode);
			}else{
				beforeArrayPage=(indexArrayPage-1)*arrayLength;
				afterArrayPage=indexArrayPage*arrayLength+1;
				htmlCode+='<span οnclick="servlet(this)" mark="'+beforeArrayPage+'">...</span>';
				for(var i=(beforeArrayPage+1);i<afterArrayPage;i++){
					if(i==indexPage){
						htmlCode+='<span class="inputSelect"  οnclick="servlet(this)" mark="'+i+'">'+i+'</span>';
					}else{
						htmlCode+='<span  οnclick="servlet(this)" mark="'+i+'">'+i+'</span>';
					}
				}
				htmlCode+='<span οnclick="servlet(this)" mark="'+afterArrayPage+'">...</span>';
				$(".rptIntfPortlet .showSection .showMore span.content").html(htmlCode);
			}
		}
	}
	</script>
</body>
</html>
