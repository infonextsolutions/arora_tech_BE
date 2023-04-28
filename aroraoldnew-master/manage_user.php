<html>

<style type="text/css">
.box {
        width: 100px;
        border: solid #884400;
        border-width: 8px 3px 8px 3px;
        background-color: #ccaa77;
}

.box ul {
        margin: 0px;
        padding: 0px;
        padding-top: 50px; /* presuming the non-list header space at the top of
                              your box is desirable */
}

.box ul li {
        margin: 0px 2px 2px 2px; /* reduce to 1px if you find the separation
                                    sufficiently visible */
        background-color: #ffffff;
        list-style-type: none;
        padding-left: 2px;
}

</style>

<div class="box"><ul > <li> <a href="/auth/admin/change_pass.php"><span class="value">Change password</span></a> </li> 
	<li><a href="/auth/admin/edit_profile.php">Edit Profile</a> </li> 
	<li><a href="/auth/admin/manage_users.php">Manage Users</a> </li>
	 <li><a href="/auth/register.php">Register Users </a></li> 
	<li><a href="/auth/admin/site_settings.php">Manage Site Settings</a></li>
	 <li><a href="/auth/admin/log_off.php?action=logoff">Sign out</a></li>
	 </ul>
	 </div>
	 
	 </html>