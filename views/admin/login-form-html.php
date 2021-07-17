<?php
    return "<form action='admin.php' method='post'>
        <p> Login to access restricted area </p>
        <label> Email </label> <input type='email' name='email' required >
        <label> Password </label>
        <input  type='password' name='password' required >
        <input type='submit' value= 'Login' name='log-in'>
    </form>";