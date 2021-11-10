
<style>
    input{
        color: grey !important;
        border: none !important;
        border-bottom: 1px solid grey !important;
        border-radius: 0 !important;
    }
    input:focus{
        outline: 0 !important;
    }
    button{
        color: grey !important;
        border: none !important;
        border-bottom: 1px solid grey !important;
        border-radius: 0 !important;
    }
    button:focus{
        outline: 0 !important;
    }
    legend{
        color: grey !important;
    }
</style>
<form action="/mvc/user/do-sign-in" method="post" id="sign_in_form" class="p-5 col-10 offset-1 col-md-8 offset-md-2 col-lg-6 offset-lg-3">
    <fieldset>
        <?php
            if(isset($_SESSION['error'])){
                ?>
                    <div class="errors">
                        <p class="alert alert-danger">
                            <i class="fa fa-exclamation-triangle"></i>&nbsp;    
                            <?=isset($_SESSION['error']) ? $_SESSION['error'] : "it is ok" ?>
                        </p>
                    </div>
                <?php
            }
        ?>
        <legend class="pb-3">Sign In</legend>
        <input type="text" name="eml" placeholder="Email" class="form-control"><br>
        <input type="text" name="pwd" placeholder="Password" class="form-control"><br>
        <button type="submit" name="sign_in" class="btn btn-light btn-sm float-right">
            <i class="fa fa-sign-in"></i>
            Sign In
        </button>
    </fieldset>
</form>