<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8"><!--  http-equiv="Content-Type" content="text/html;" -->
	<title>测试</title>
</head>
<body>
	<h1>模板用法</h1>
	姓名:{{$name}}
	<hr>
	<h1>使用php函数</h1>
	<h2>模板用法</h2>
	当前时间:{{time()}}
	<hr>
	<h1>使用遍历</h1>
	<h2>使用模板标签遍历</h2>
	@foreach($data as $grs)
		姓名:{{ $grs['name'] }}------年龄:{{ $grs['age'] }}
		<br>
	@endforeach
	<hr>
	<h2>使用原生php</h2>
	<?php foreach ($data as $key => $value): ?>
		姓名: <?php echo $value['name']; ?>-----年龄: <?php echo $value['age']; ?>
		<br>
	<?php endforeach ?>
</body>
</html>