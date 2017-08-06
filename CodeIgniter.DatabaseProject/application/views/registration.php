 <section>
   <div class="container">
<div class="row">
				<div class="col-sm-4 col-sm-offset-1">
					<div class="login-form"><!--login form-->
						<h2>Login to your account</h2>
						<form action="registeraction" method="post">
							<input type="text" name="username" id="username" placeholder="username" />
							<input type="password" name="password" id="password" placeholder="password" />
							<input type="password" name="password2" id="password2" placeholder="Enter password again" />
							<input type="text" name="Firstname" id="Firstname" placeholder="First Name" />
							<input type="text" name="Lastname" id="Lastname" placeholder="Last Name" />
						
							<select id="Gender" name="Gender">
								<option value="M">Male</option>
								<option value="F">Female</option>
							</select>
							<br>
							<br>
			
							
							<input type="text" name="BirthDay" id="BirthDay" placeholder="Birthday in DD-MM-YYYY" maxlength= "10">
							<input type="text" name="EmailAddress" id="EmailAddress" placeholder="Email Address" >
							<input type="number" name="PhoneNumber" id="PhoneNumber" maxlength= "8" min= "10000000" placeholder="PhoneNumber" />
						


							<span>
								<input type="checkbox" class="checkbox"> 
								I agree with the agreement
							</span>
							<button type="submit" class="btn btn-default">Register</button>
						</form>
						<p> <?php echo $responsemessage; ?></p>
					</div><!--/login form-->
				</div>
			</div>
		</div>
	</section>