

	<div class="map">
		<iframe src="https://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=Kuningan,+Jakarta+Capital+Region,+Indonesia&amp;aq=3&amp;oq=kuningan+&amp;sll=37.0625,-95.677068&amp;sspn=37.410045,86.572266&amp;ie=UTF8&amp;hq=&amp;hnear=Kuningan&amp;t=m&amp;z=14&amp;ll=-6.238824,106.830177&amp;output=embed">
		</iframe>
	</div>
	
	<section class="contact-page">
        <div class="container">
            <div class="text-center">        
                <h2>Drop Your Message</h2>
                <p>Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
            </div> 
            <div class="row contact-wrap"> 
                <div class="status alert alert-success" style="display: none"></div>
                {# <form id="main-contact-form" class="contact-form" name="contact-form" method="post" action="sendemail.php"> #}
                    {{ form('contact/send', 'role': 'form', 'class': 'contact-form', 'name': 'contact-form','id':'main-contact-form') }}
                    <div class="col-sm-10 col-sm-offset-1">
                        <div class="form-group">
                            {{ form.label('name') }}
                            {{ form.render('name', ['class': 'form-control']) }}
                        </div>
                        <div class="form-group">
                            {{ form.label('email') }}
                            {{ form.render('email', ['class': 'form-control']) }}
                        </div>
                        <div class="form-group">
                            {{ form.label('comments') }}
                            {{ form.render('comments', ['class': 'form-control']) }}
                        </div>   
                        
                        <div class="form-group">
                            {{ submit_button('Send', 'class': 'btn btn-primary btn-large') }}
                        </div>
                    </div>
                    
                </form> 
            </div><!--/.row-->
        </div><!--/.container-->
    </section><!--/#contact-page-->