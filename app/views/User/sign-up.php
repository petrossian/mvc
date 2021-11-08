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
<form action="/mvc/user/do-sign-up" method="post" id="sign_up_form" class="p-5 col-10 offset-1 col-md-8 offset-md-2 col-lg-6 offset-lg-3">
    <fieldset>
        <legend class="pb-3">Sign Up</legend>
        <input type="text" name="name" placeholder="Name" class="form-control"><br>
        <input type="text" name="email" placeholder="Email" class="form-control"><br>
        <input type="text" name="password" placeholder="Password" class="form-control"><br>
        <button type="submit" name="sign_up"  class="btn btn-light btn-sm float-right">
            Sign Up
            <i class="fa fa-user"></i>
        </button>
    </fieldset>
</form>