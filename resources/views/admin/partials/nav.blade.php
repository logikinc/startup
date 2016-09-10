        <div class="col-md-3">
            <div class="panel panel-default">
                <div class="panel-heading">Administration</div>

                <div class="admin-sidebar">    
                    <div class="admin-usermenu">
					<ul class="nav">
					    @can('view-backend')
						<li class="{{ set_active(['admin', 'admin']) }}">
							<a href="{{ url('/admin') }}">
							<i class="fa fa-dashboard"></i>
							Dashboard </a>
						</li>
						@endcan
						@can('manage-users')
						<li class="{{ set_active(['admin/users', 'admin/users/*']) }}">
							<a href="{{ url('/admin/users') }}">
							<i class="fa fa-users"></i>
							Users </a>
						</li>
						@endcan
						@can('manage-roles')
						<li class="{{ set_active(['admin/roles', 'admin/roles/*']) }}">
							<a href="{{ url('/admin/roles') }}">
							<i class="fa fa-unlock"></i>
							Roles </a>
						</li>
						@endcan
						@can('manage-permissions')
						<li class="{{ set_active(['admin/permissions', 'admin/permissions/*']) }}">
							<a href="{{ url('/admin/permissions') }}">
							<i class="fa fa-key"></i>
							Permissions </a>
						</li>
						@endcan
						@can('manage-uploads')
						<li class="{{ set_active(['admin/upload', 'admin/upload/*']) }}">
							<a href="{{ url('/admin/upload') }}">
							<i class="fa fa-file"></i>
							Uploads </a>
						</li>
						@endcan						
						@can('manage-settings')
						<li class="{{ set_active(['admin/settings', 'admin/settings/*']) }}">
							<a href="{{ url('/admin/settings') }}">
							<i class="fa fa-cog"></i>
							Settings </a>
						</li>
						@endcan
						
					</ul>
					</div>
                </div>
            </div>
        </div> 