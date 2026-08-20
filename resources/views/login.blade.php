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
        background-color: var(--jungle-teal);
        font-family: sans-serif;
    }

    .login {
        background-color: var(--muted-teal);
        border: 2px solid black;
    }

    form {
        margin: 0 auto;
        height: 50vh;
        align-content: center;
        padding: 10px;
    }

    .form-control {
        background-color: var(--mint-cream);
        border: 3px solid var(--jungle-teal);
        margin: 20px auto;
        color: black;
        font-size: 13px;
    }

    .form-control::placeholder {
        color: var(--jungle-teal);
        font-size: 13px;
    }

    .form-control:focus {
        background-color: var(--mint-cream);
        border: 3px solid var(--jungle-teal);
        margin: 20px auto;
        color: black;
    }

    .btn {
        background-color: var(--jungle-teal);
        height: 3rem;
        font-size: 15px;
        border-radius: 15px;
        color: white;
    }

    .btn:hover {
        background-color: var(--frozen-water);
        color: black;
    }
</style>

<body>

    <div class="col-xl-4 col-md-6 p-3 mx-auto align-content-center">
        <div class="login p-2 rounded rounded-5">
            <form id="content" action="" method="post">
                @csrf
                <p class="text text-dark text-center">Masukkan Email & Password anda</p>
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
