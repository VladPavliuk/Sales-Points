{extends file='../layouts/main.tpl'}

{block name="content"}
    <div class="row">
        <form action="/user/sign-in" method="POST">

            <div class="input-group">
                <label for="user_nickname">User login</label>
                <input class="form-control" type="text" value="" id="user_nickname"
                       name="user_nickname" required>
            </div>

            <div class="input-group">
                <label for="user_password">User password</label>
                <input class="form-control" type="password" value="" id="user_password"
                       name="user_password" required>
            </div>
            <br>
            <div class="input-group">
                <input type="submit" class="btn btn-primary" value="Sign In">
            </div>
        </form>
    </div>
{/block}