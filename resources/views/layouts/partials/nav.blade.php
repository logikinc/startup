        <div class="col-md-3">
            <div class="panel panel-default">
                <div class="panel-heading">Settings</div>

                <div class="admin-sidebar">    
                    <div class="admin-usermenu">
					<ul class="nav">
						<li class="{{ set_active(['profile', 'profile']) }}">
							<a href="{{ url('/profile') }}">
							<i class="fa fa-user"></i>
							Profile </a>
						</li>
						<li class="{{ set_active(['profile/security', 'profile/security']) }}">
							<a href="{{ url('/profile/security') }}">
							<i class="fa fa-key"></i>
							Security </a>
						</li>						
					</ul>
					</div>
                </div>
            </div>
        </div> 