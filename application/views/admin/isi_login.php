	<h1>Login Admin</h1>
    <form action="<?php echo base_url('login/aksi_login'); ?>" method="post">
    	<input type="text"  placeholder="Username" name="username_pegawai" required="required" />
        <input type="password" name="password_pegawai" placeholder="Password" required="required" />
        <button type="submit" value="Submit" class="btn btn-primary btn-block btn-large">Let me in.</button>
    </form>