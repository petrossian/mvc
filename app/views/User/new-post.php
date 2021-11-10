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
<form action="/mvc/user/add-new-post" method="post" id="sign_in_form" class="p-5 col-10 offset-1 col-md-8 offset-md-2 col-lg-6 offset-lg-3">
    <fieldset>
        <legend class="pb-3">New Post</legend>
        <p class="alert alert-success">
            <?=isset($_SESSION['new-post']) ? $_SESSION['new-post'] : "" ?>
        </p>
        <input type="text" name="title" placeholder="Title" class="form-control"><br>
        <textarea type="text" name="body" placeholder="Body" class="form-control"></textarea><br>
        <button type="submit" class="btn btn-light btn-sm float-right">
            <i class="fa fa-check"></i>
            Go
        </button>
    </fieldset>
</form>