<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>iBlood App</title>
</head>
<body>
	<div class="machine-wrap">
	<center>iBlood V2 - Site em Construção</center>
<div class="machine">
	<div class="machine-roof">
		<div class="machine-silencer">
			<div class="machine-smoke"></div>
		</div>
	</div>
	<div class="machine-main">
		<div class="machine-body"></div>
		<div class="machine-back"></div>
		<div class="machine-front"></div>
	</div>	
</div>
<div class="road">
	<div class="mud-wrap clearfix">
		<div class="mud"></div>
		<div class="mud"></div>
		<div class="mud"></div>
		<div class="mud"></div>
	</div>
</div>

<center>Acompanhe o desenvolvimento no nosso <a class="link-constru" href="https://github.com/florence-dawn/iBloodV2">Git Hub</a></center>
<center>Ou faça o <a class="link-constru" href="/login">Login no App</a></center>

</div>

<style>
    body{
	margin:0;
	color:#ffffff;
	background:#a21322;
	font:300 18px/18px Roboto, sans-serif;
}
*,:after,:before{box-sizing:border-box}
.pull-left{float:left}
.pull-right{float:right}
.clearfix:after,.clearfix:before{content:'';display:table}
.clearfix:after{clear:both;display:block}
center{
    margin-top:10px!important;
}

.link-constru{
    color:#f8f8d9
}
.link-constru:hover, .link-constru:active{
    color:#e0e094
}
.machine-wrap{
	top:40%;
	left:50%;
	width:475px;
	height:145px;
	position:absolute;
	margin-top:-72.5px;
	margin-left:-237.5px;
	border-bottom:5px solid #ffffff; 
}
.machine{
	margin-top: 20px;

	width:475px;
	height:145px;
	padding-bottom:20px;
}
.machine .machine-roof,
.machine .machine-main{
	margin:auto;
}
.machine-wrap .road .mud:before,
.machine-wrap .road .mud:after,
.machine .machine-roof .machine-silencer:before,
.machine .machine-roof .machine-silencer:after,
.machine .machine-body:before,
.machine .machine-body:after,
.machine .machine-main .machine-back:before,
.machine .machine-main .machine-back:after,
.machine .machine-main .machine-front:after{
	content:'';
	position:absolute;
}
.machine .machine-roof{
	width:80px;
	height:60px;
	bottom:-1px;
	position:relative;
	background:#a21322;
	border:15px solid #ffffff;
	border-bottom:none;
}
.machine .machine-roof .machine-silencer{
	width:14px;
	left:-50px;
	height:12px;
	bottom:-1px;
	position:absolute;
	background:#ffffff;
}
.machine .machine-roof .machine-silencer:before{
	height:0;
	bottom:100%;
	width:inherit;
	border:6px solid #ffffff;
	border-top:4px solid transparent;
	border-left:8px solid transparent;
}
.machine .machine-roof .machine-silencer:after{
	left:4px;
	width:5px;
	height:12px;
	bottom:100%;
	background:inherit;
	transform:skewY(-35deg);
}
.machine .machine-roof .machine-silencer .machine-smoke{
	left:-5px;
	width:16px;
	height:16px;
	bottom:20px;
	border-radius:50%;
	position:absolute;
	background:#ffffff;
	transform:scale(0);
	animation:moveSmoke .5s linear infinite;
}
.machine-main{
	height:60px;
	width:185px;
	position:relative;
}
.machine .machine-main .machine-body{
	height:inherit;
	width:inherit;
	position:relative;
	background:#ffffff;
}
.machine .machine-main .machine-body:before{
	left:-15px;
	width:30px;
	height:inherit;
	background:inherit;
	transform:skewX(-20deg);
}
.machine .machine-main .machine-body:after{
	bottom:0;
	right:15px;
	width:35px;
	height:41px;
	background:#a21322;
}
.machine .machine-main .machine-back{
	bottom:-1px;
	width:75px;
	height:45px;
	position:absolute;
}
.machine .machine-main .machine-back:before{
	width:75px;
	height:45px;
	background:#a21322;
	border-radius:50% 50% 0 0 / 85% 85% 0 0;
}
.machine .machine-main .machine-back:after{
	top:50%;
	left:50%;
	width:60px;
	height:60px;
	border-radius:50%;
	margin-top:-15px;
	margin-left:-30px;
	background:transparent;
	border:15px solid #ffffff;
}
.machine .machine-main .machine-front{
	z-index:1;
	width:60px;
	height:60px;
	right:-24px;
	bottom:-20px;
	border-radius:50%;
	position:absolute;
	background:#ffffff;
	border-top:2px solid #a21322;
}
.machine .machine-main .machine-front:after{
	top:50%;
	left:50%;
	width:80px;
	height:20px;
	margin-top:-10px;
	margin-left:-40px;
	background:inherit;
	border:2px solid #a21322;
}
.machine-wrap .road{
	right:0;
	bottom:0;
	height:15px;
	width:140px;
	overflow:hidden;
	position:absolute;
}
.machine-wrap .road .mud-wrap{
	width:160px;
	position:absolute;
	animation:moveRoad .4s linear infinite;
}
.machine-wrap .road .mud{
	bottom:0;
	width:40px;
	float:left;
	height:15px;
	position:relative;
	display:inline-block;
}
.machine-wrap .road .mud:before,
.machine-wrap .road .mud:after{
	width:20px;
	height:20px;
	border-radius:4px;
	background:#ffffff;
	transform:rotate(45deg);
}
.machine-wrap .road .mud:before{
	left:0;
	bottom:-17px;
}
.machine-wrap .road .mud:after{
	right:0;
	bottom:-20px;
}

.machine-wrap .machine-roof,
.machine-wrap .machine-body,
.machine-wrap .machine-silencer,
.machine-wrap .machine-back:before,
.machine-wrap .machine-front{
	animation:upDown .6s linear infinite;
}
.machine-wrap .machine-silencer{
	animation-duration:.4s;
}
.machine-wrap .machine-front{
	animation-duration:.3s;
}
.machine-wrap .machine-back{
	animation:upDown .8s linear infinite;
}
@keyframes moveRoad{
	0%{
		right:-40px;
	}
	100%{
		right:0;
	}
}
@keyframes moveSmoke{
	0%{
		opacity:0;
		transform:scale(0) translate(0);
	}
	60%{
		transform:scale(.5) translate(0);
	}
	100%{
		opacity:.6;
		transform:scale(1) translate(-10px,-40px);
	}
}
@keyframes upDown{
	0%{
		transform:translateY(0);
	}
	50%{
		transform:translateY(2px);
	}
	100%{
		transform:translateY(0);
	}
}
</style>
</body>
</html>