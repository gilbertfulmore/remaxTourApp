<form method="post" action="login">
    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
    <p>Agent ID<br/>
        <input type="number" name="agent_id"/>
    </p>
    <p>Password<br/>
        <input type="password" name="password"/>
    </p>
    <p>
        <input type="submit" name="submit" value="Login"/>
    </p>
</form>