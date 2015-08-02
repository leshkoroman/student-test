<html>
<head>

    <title>ІКТ TECT</title>
	<meta http-equiv="Content-Type" content="text/html;charset=utf-8">
       	<script type="text/javascript" src="js/jquery-1.4.2.min.js"></script>
        <script type="text/javascript" src="js/jquery.cookie.js"></script>

	<link rel="stylesheet" type="text/css" href="styles/reset.css">
	<link rel="stylesheet" type="text/css" href="styles/clearfix.css">

	<link rel="stylesheet" type="text/css" href="styles/base.css">
	<link rel="stylesheet" type="text/css" href="styles/dark.css">
       
        <script type="text/javascript" src="/js/main.js"></script>
	
	
</head>

<body>

<div id="header" class="clearfix">
	
	<div class="holder clearfix">
		<div id="title"><span><a href="/" title="ІКТ TECT" rel="home">ІКТ TECT</a></span></div>
		<ul id="siteNav">
			<li id='main_page' class="selected"><a href="/">Головна сторінка</a></li>
                        <!--<li id='test'><a href="javascript:void(o);">Тестування</a></li>-->
			<!--<li id='contact_page'><a href="javascript:void(o);">Контактка інформація</a></li>-->
		</ul>
	</div>
</div><!-- #header -->

<div id="wrapper">
	<div id="main" class="clearfix">
		<div class="mainCol">
                    <h1>Головна сторінка</h1>
                    <div id="maincontent" style="font-size: 14px; line-height: 30px;">
                        <ul>
                            <li>
                                Виберіть тему тестування. 
                            </li>
                            <li>
                                Введіть прізвище, імя, групу, email. 
                            </li>
                            <li>
                                Пройдіть тести, обираючи одну правильну з набору відповідей. 
                            </li>
                            <li>
                                Отримайте результат. 
                            </li>  
                        </ul>
                        Результати буде відправлено на ваш email і email викладача.
                    </div>
		</div>
		<div class="sidebarCol">	
                        <div>
                            <h2>Введіть ваші дані</h2>
				<div>
                                    <input id="name" type="text" placeholder="Прізвище та ініціали">
                                    <input id="email" type="text" placeholder="email" style="margin-top: 10px;">
				</div>
                            </br>
			</div>
			<div>
				<h2>Перелік тем</h2>
				<dl id='tems'>

				</dl>
			</div>			
		</div>
	</div><!-- #main -->

	<div id="footer">
		<p class="copyright">&copy; Roman Leshko.
                </p>		
	</div><!-- #footer -->
	
</div><!-- #wrapper -->

</body>
</html>