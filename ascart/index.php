<!doctype html>
<html lang="zh">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>ASCII ART</title>
	<link rel="stylesheet" type="text/css" href="css/default.css">
	<link href='http://fonts.useso.com/css?family=Open+Sans:400,300,700' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="css/reset.css"> <!-- CSS reset -->
	<link rel="stylesheet" href="css/style.css"> <!-- Resource style -->
	<script src="js/modernizr.js"></script> <!-- Modernizr -->
	<!--[if IE]>
		<script src="http://libs.useso.com/js/html5shiv/3.7/html5shiv.min.js"></script>
	<![endif]-->

	<script language="javascript">
	function check(form)
	{
		if(document.ascii.f_filename.value=="")
		{
			alert("Please upload your picture.")
			return false;
		}
		if(document.ascii.bcolor.value=="")
		{
			alert("Please input background color(REG).")
			return false;
		}
		if(document.ascii.fchar.value=="")
		{
			alert("Please input your filling color.")
			return false;
		}
	}
</script>
</head>


<body>
	<div class="htmleaf-container">
		<header class="htmleaf-header bgcolor-11">
			<h1>ASCII ART<span>Created by Liu Wang.</span></h1>
		</header>
		<!--<div class="htmleaf-content bgcolor-8">
			
		</div>-->
		<form 
			class="cd-form floating-labels" 
			name="ascii" 
			action="upload.php" 
			method="post" 
			enctype="multipart/form-data"
            onsubmit="javascript:return check();"
			>
			
				<legend>Have fun!</legend>

				
					<label>Choose File</label>
                	
					<input type="file" name="f_filename"/><br/><br/>
				

				<div >
			    	<label class="cd-label" for="cd-company">Filling Character</label>
					<input  type="text" name="fchar" id="fchar" value="HELLO">
			    </div> 

				<div >
					<label class="cd-label" for="cd-name">Background Color(RGB)</label>
					<input type="text" name="bcolor" id="bcolor" value="#000000">
			    </div> 

			    

			

				<div>
					<h4>Scaling Ratio</h4>

					<p class="cd-select"   >
						<select name="f_ratio">
							<option value="1" checked="checked">Default</option>
							<option value="0.05">0.05</option>
							<option value="0.1">0.1</option>
							<option value="0.25">0.25</option>
							<option value="0.5">0.5</option>
							<option value="0.75">0.75</option>
							<option value="1">1</option>
							<option value="1.25">1.25</option>
							<option value="1.5">1.5</option>
							<option value="2">2</option>
						</select>
					</p>
				</div> 

				<div>
					<h4>Fill mode</h4>

					<ul class="cd-form-list" >
						<li>
							<input type="radio" name="f_mode" value="1" checked>
							<label for="cd-radio-1">Random</label>
						</li>
							
						<li>
							<input type="radio" name="f_mode" value="0">
							<label for="cd-radio-2">Order</label>
						</li>

						
					</ul>
				</div>

				<div>
			      	<input type="submit" value="Create ASC Art">
			    </div>
			
		</form>

		<a href="http://www.liuw53.top">liuw53</a>
		<a href="http://coolspring1293.github.io">github</a>
        <a href="http://liuw53.mail.sinanet.com">mail</a><br/>
	</div>
	
	<script src="js/jquery-2.1.1.js"></script>
	<script src="js/main.js"></script> <!-- Resource jQuery -->
</body>
</html>