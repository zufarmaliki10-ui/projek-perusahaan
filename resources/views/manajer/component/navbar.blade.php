<nav class="navbar navbar-expand-lg">
    <div class="container-fluid">
        <div class="search d-flex justify-content-between col-md-5">
            <div class="input-group my-2 mx-2 w-100">
                <input
                    type="text"
                    class="form-control"
                    placeholder="Search"
                    aria-label="Search"
                    aria-describedby="basic-addon1" />
                <span
                    class="btn btn-secondary align-content-center"
                    id="basic-addon1"><i class="bi bi-search"></i></span>
            </div>
        </div>
        <div class="profil d-flex col-md-2 justify-content-evenly">
            <div class="align-content-center text-dark">
                <h6 class="m-0">
                    <strong>{{auth()->user()->name}}</strong>
                </h6>
                <p class="m-0">as Manajer</p>
            </div>
        </div>
    </div>
</nav>
