<div class="modal fade" id="loginModal" role="dialog">

    <div class="container modal-content">

        <div class=" container modal-header bg-primary">
            <button type="button" class="close " data-dismiss="modal">&times;</button>
            <h4 class="modal-title"> Welcome! </h4>
        </div>

        <div class="form-group container modal-body">
            <form>

                <div class="modalInput">
                    <input type="email" class="container form-control" id="email" placeholder="Email"><br>
                    <input type="password" class="container form-control" id="pwd" placeholder="Password">
                </div>

                <button class="btn btn-default submit-button">Login</button> <br>
                <div class="rememberMe">
                    <input type="checkbox" name="rememberMe">
                    <h>Remember me</h><br>
                </div>

            </form>


        </div>

        <div class="form-group container modal-body">
            <span><a href="#"> Forgot password?</a></span><br><br>
            <span data-dismiss="modal">Not yet registered? <a id="registerLink" href="#"> Register! </a></span>
        </div>
    </div>
</div>