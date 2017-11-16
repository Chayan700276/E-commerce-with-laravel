 @extends('index')
 @section('main_content')
<!-- register -->
	<div class="register">
		<div class="container">
			<h2>Register Here</h2>
			<div class="login-form-grids">
				<h5>profile information</h5>
				<form action="{{url('customer')}}" method="POST">
					{{csrf_field()}}
					<input type="text" name="name" placeholder="Name..." >
					<input type="text" name="mobile_number" placeholder="Mobile No..." >
					<input type="text" name="address" placeholder="Address..">
					<input type="text" name="country" placeholder="Country">

					<input type="text" name="zip_code" placeholder="Zip Code..."  >
		
				
				<h6>Login information</h6>
					
					<input type="email" name="email" placeholder="Email Address" >
					<input type="text" id="pass" onchange="check()"  name="password" placeholder="Password">
					<input type="text" id="con_pass" onchange="check()"  name="confirm_password" placeholder="Password Confirmation">

					<p style="margin-left: 10px; margin-top: 10px;color:green" id="result"></p>
					<span style="margin-left: 10px; margin-top: 10px;color:red" id="result2"></span>

					<input type="submit" value="Register">
				</form>
			</div>
			<div class="register-home">
				<a href="index.html">Home</a>
			</div>
		</div>


	</div>
<!-- //register -->
		<script type="text/javascript">
			
					function check(){
						var pass = document.getElementById('pass').value;
						var con_pass = document.getElementById('con_pass');

				 	
						if (con_pass) {
							document.getElementById('result2').innerHTML = "Password  matched";
						}

						

					
				
				  }

		</script>



 @endsection

