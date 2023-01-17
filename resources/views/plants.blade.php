<!doctype html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0,user-scalable=yes" />
<title>sample</title>
<link rel="stylesheet" href="{{ asset('/css/plants.css') }}" type="text/css">
<link href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.7.1/css/lightbox.css" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.7.1/js/lightbox.min.js" type="text/javascript"></script>
<script>
//window.onload =function(){
//	let gazo =document.getElementById("gazo");
//}
function getCsv(no){
	var data='{{ asset('/csv/list.csv') }}';
	let xhr = new XMLHttpRequest(); 
	xhr.open("GET",data,true);
	xhr.onload = function (e) {
		if (xhr.readyState === 4) {
			if (xhr.status === 200) {
				let responce = xhr.responseText;
				if(no==0){
					load(responce);
				}else{
					csvArr(responce,no);
				}
			} else {
				console.error(xhr.statusText);
			}
		}
	};
	xhr.send(null);
}
function load(dataArr){
	var listL =document.getElementById("listL");
	var listR =document.getElementById("listR");
	var arr =[];
	var list = dataArr.split('\n');
	var insertL ="";
	var insertR ="";
	for(let i = 0; i <list.length; i++){
		arr = list[i].split(',');
		if(arr[0]>0){
			insertL +='<li>'+arr[1]+'　<span style="color:#ff0000">'+arr[2]+'</span>　<span onclick="getCsv('+arr[0]+')"><img src="{{ asset('/img/ten.png') }}" style="height:30px"></span><span id="gazoID'+arr[0]+'" name="gazoNM" class="_divR"></span></li>';
		}
	}
	listL.innerHTML = insertL;
}
function csvArr(dataArr,no){
	var gazoNM = document.getElementsByName('gazoNM');
	for (let j = 0; j < gazoNM.length; j++){
		gazoNM[j].style.visibility="hidden";
		gazoNM[j].innerHTML="";
	}
	var gazoIDname="gazoID"+no;
	var gazoID =document.getElementById(gazoIDname);

	var arr =[];
	var list = dataArr.split('\n');
	for(let i = 0; i <list.length; i++){
		arr = list[i].split(',');
		if(arr[0]==no){
			var insert ="<br>"
			if(arr[3]!=""){
				insert+=arr[3]+"<br>";
			}
			for(let j=4;j<arr.length;j++){
				if(arr[j].match(/jpg/)){
				//	insert +='<a href="'+arr[j]+'" data-lightbox="group"><img src="'+arr[j]+'" width="200"></a><br>';
					insert +='<a href="../img/'+arr[j]+'" data-lightbox="group"><img src="../img/'+arr[j]+'" width="200"></a><br>';
				}
			}
			gazoID.style.visibility="visible";
			gazoID.innerHTML = insert;
		}
	}
}
//https://notetoself-dy.com/javascript-csv/
</script>
</head>
<body onload="getCsv(0);">
<div class="header">
	<span class="h1">さらせに屋</span>
	<div style="position:fixed;top:0px;right:0px;"><img src="{{ asset('/img/ten.png') }}" style="height:80px"></div>
</div>

<div class="wrapper">
	<div class="divL">
		<ol><span id="listL"></span></ol>
	</div>
	<div class="divR">
		販売 >> とりあえずヤフオク<br>
		<script type="text/javascript">
		<!--
		function aitai(){
		//var bfr="%119*%100*%54*%53*%53*%55*%50*%48*%53*%64*%111*%98*%46*%97*%105*%116*%97*%105*%46*%110*%101*%46*%106*%112*";
		var bfr="%115*%97*%109*%112*%108*%101*%64*%115*%97*%109*%112*%108*%101*%46*%99*%111*%109*";
		var aft=bfr.replaceAll('%','&#');
		aft=aft.replaceAll('*',';');
		document.getElementById("aitai").innerHTML=aft;
		}
		//-->
		</script>
		<a href="#" onclick="aitai()">お問い合わせ >> </a>　　　<span id="aitai"></span>
		<br><br><br><br>
		注※ここはサンプルページなので植物の画像と名前は適当です
		<br>
		<a href="{{url('/')}}">TOPへ戻る</a>
	</div>
</div>

<div class="footer">
	<div class="right">&copy; さらせに屋 2022 　</div>
</div>
</body>
</html>
