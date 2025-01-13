@extends("layout.default")

@section("title", "Login")
@section("content")
	<div class="section login">
		<div class="container">
			<div class="row full-height justify-content-center">
				<div class="col-12 text-center align-self-center py-5">
					<div class="section pb-5 pt-5 pt-sm-2 text-center">
						<div class="card-3d-wrap mx-auto">
							<div class="card-3d-wrapper">
								<div class="card-front">
                                    <!-- Show error message -->
                                    @if(session()->has("error"))
                                    <div class="m-3 alert alert-danger">
                                        {{session()->get("error")}}
                                    </div>
                                    @endif
									<div class="center-wrap">
										<div class="section text-center">
                                            
											<h4 class="mt-3 mb-4 pb-3">Log In</h4>
                                            <form method="POST" action="{{route('login')}}">
                                                @csrf
                                                <div class="form-group">
                                                    <input type="email" name="email" class="form-style" placeholder="Your Email" id="email" autocomplete="off">
                                                    <i class="input-icon uil uil-at"></i>
                                                    <!-- Show error email -->
                                                    @if ($errors->has('email'))
                                                        <span class="text-danger">{{ $errors->first('email') }}</span>
                                                    @endif
                                                </div>	
                                                <div class="form-group mt-2">
                                                    <input type="password" name="password" class="form-style" placeholder="Your Password" id="password" autocomplete="off">
                                                    <i class="input-icon uil uil-lock-alt"></i>
                                                    <!-- Show error password -->
                                                    @if ($errors->has('password'))
                                                        <span class="text-danger">{{ $errors->first('password') }}</span>
                                                    @endif
                                                </div>
											    <button type="submit" class="btn_login mt-4">LOGIN</button>
                                            </form>
				      					</div>
			      					</div>
			      				</div>
			      			</div>
			      		</div>
			      	</div>
		      	</div>
	      	</div>
	    </div>
	</div>
@endsection