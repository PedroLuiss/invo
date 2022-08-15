{# <!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        {{ get_title() }}
        {{ stylesheet_link('css/bootstrap.min.css') }}
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Your invoices">
        <meta name="author" content="Phalcon Team">
    </head>
    <body>
        {{ content() }}
        {{ javascript_include('js/jquery.min.js') }}
        {{ javascript_include('js/bootstrap.min.js') }}
        {{ javascript_include('js/utils.js') }}
    </body>
</html> #}

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Day - HTML Bootstrap Template</title>

    <!-- Bootstrap -->
    {{ stylesheet_link('css/bootstrap.min.css') }}
    {{ stylesheet_link('css/font-awesome.min.css') }}
    {{ stylesheet_link('css/animate.css') }}
    {{ stylesheet_link('css/animate.min.css') }}
    {{ stylesheet_link('css/style.css') }}
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>

  </head>
  <body>	
    {# {{ content() }} #}
	<header id="header">
        <nav class="navbar navbar-default navbar-static-top" role="banner">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                   <div class="navbar-brand">
						<a href="index.html"><h1>Day</h1></a>
					</div>
                </div>				
                {# <div class="navbar-collapse collapse">							
					<div class="menu">
						<ul class="nav nav-tabs" role="tablist">
							<li role="presentation" class="active"><a href="index.html" >Home</a></li>
							<li role="presentation"><a href="about.html">About Us</a></li>
							<li role="presentation"><a href="services.html">Services</a></li>
							<li role="presentation"><a href="gallery.html">Gallery</a></li>
							<li role="presentation"><a href="contact.html">Contact</a></li>						
						</ul>
					</div>
				</div>		 #}
                {{ elements.getMenu() }}
            </div><!--/.container-->
        </nav><!--/nav-->		
    </header><!--/header-->	

    {{ content() }}
		
{# pedro.rodriguez@datia.co #}
	
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <!--<script src="../js/jquery.js"></script>-->
    {{ javascript_include('js/jquery.js') }}
    {{ javascript_include('js/bootstrap.min.js') }}
    {{ javascript_include('js/wow.min.js') }}
    <!-- Include all compiled plugins (below), or include individual files as needed -->
	<script>
	wow = new WOW(
	 {
	
		}	) 
		.init();
	</script>	
  </body>
</html>