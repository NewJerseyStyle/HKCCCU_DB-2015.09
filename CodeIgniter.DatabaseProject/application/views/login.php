
 <section>
   <div class="container">
<div class="row">
				<div class="col-sm-4 col-sm-offset-1">
					<div class="login-form"><!--login form-->
						<h2>Login to your account</h2>
						<form action="loginaction" method="post">
							<input type="text" name="loginusername" id="loginusername" placeholder="username" />
							<input type="password" name="loginpassword" id="loginpassword" placeholder="password" />
							<span>
								<input type="checkbox" class="checkbox"> 
								Keep me signed in
							</span>
							<button type="submit" class="btn btn-default">Login</button>
						</form>
						<p> <?php echo $responsemessage; ?></p>
					</div><!--/login form-->
				</div>
			</div>
		</div>
	</section>