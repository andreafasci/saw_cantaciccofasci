<div class="modal fade" id="registerModal" role="dialog">
        <div class="container modal-content">

            <div class="container modal-header">
                <h4 class="modal-title"> Register </h4>
                <button type="button" class="close modal-title" data-dismiss="modal">&times;</button>
            </div>

            <form>
                <div class="form-group container modal-body modalInput">
                    <input type="text" class="form-control" id="user" placeholder="Full name"><br>
                    <input type="email" class="form-control" id="email" placeholder="Email"><br>
                    <input type="password" class="form-control" id="pwd" placeholder="Password"><br>
                    <input type="password" class="form-control" id="pwd-confirm" placeholder="Confirm password"><br>
                    <button class="btn btn-default submit-button">Submit</button>
                </div>
            </form>

            <div class="form-group container modal-body">
                <span data-dismiss="modal">Already registered? <a id="loginLink" href="#"> Login here! </a></span>
            </div>
        </div>
</div>