@include('hrd.partials.head')
<style>
    :root {
        --average: "Average Sans";
        --mulish: "Mulish";

        --jungle-teal: #6b9080ff;
        --muted-teal: #a4c3b2ff;
        --frozen-water: #cce3deff;
        --azure-mist: #eaf4f4ff;
        --mint-cream: #f6fff8ff;
    }

    body {
        align-content: center;
        font-family: sans-serif;
    }

    .login {
        background-color: var(--jungle-teal);
        border: 2px solid black;
    }

    form {
        align-content: center;
        padding: 5px;
    }

    .form-control {
        background-color: var(--mint-cream);
        border: 3px solid var(--muted-teal);
        margin: 10px auto;
        color: black;
        font-size: 13px;
    }

    .form-control::placeholder {
        color: var(--jungle-teal);
        font-size: 13px;
    }

    .form-control:focus {
        background-color: var(--mint-cream);
        border: 3px solid var(--muted-teal);
        margin: 10px auto;
        color: black;
    }

    .btn {
        background-color: #ffc107;
        height: 3rem;
        font-size: 15px;
        border-radius: 15px;
        color: black;
    }

    .btn:hover {
        background-color: var(--muted-teal);
        border: 2px solid var(--frozen-water);
        color: black;
    }
</style>

<body>

    <div class="col-md-4 col-sm-8 p-3 mx-auto align-content-center">
        <div class="login p-2 rounded rounded-5">
            <img class="img-fluid mt-3 p-1" src="{{asset('admin/hrd/img/logo_white_d.png')}}" alt="logo">
            <form id="content" action="" method="post">
                @csrf
                <input class="form form-control" type="text" name="email" id="" placeholder="Email">
                <input class="form form-control mb-0" type="password" name="password" id="" placeholder="Password">
                <div class="d-flex justify-content-center">
                    <button type="submit" class="btn w-50 mt-3 bi bi-box-arrow-in-right"><span class="mx-2">Sign In</span></button>
                </div>
            </form>
        </div>
    </div>
    @include('hrd.partials.script')
</body>
