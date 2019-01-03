<?php
echo "<h2>Login</h2>
<form method=POST action=cek_login.php enctype='multypart/form-data'>
<table>
<tr><td>Username</td><td> : <input type=text name='username'></td></tr>
<tr><td>Password</td><td> : <input type=password name='password'></td></tr>
<tr><td colspan='3' align='right' font-size='10'><img src='captcha.php'></td></tr>
<tr><td>Captcha</td><td> : <input type=text name='captcha'></td></tr>
<tr><td><br /><input type=submit value=Login></td></tr>
</table>
</form>";
?>
