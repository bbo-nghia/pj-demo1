<form action="{{ route('admin.account.index') }}" method="get">
    <div class="form-group row">
        <label for="inputName" class="col-sm-2 col-form-label">Name</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="inputName" placeholder="Name">
        </div>
    </div>
    <div class="form-group row">
        <label for="inputMobile" class="col-sm-2 col-form-label">Mobile</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="inputMobile" placeholder="Mobile">
        </div>
    </div>
    <div class="form-group row">
        <label for="inputBirthday" class="col-sm-2 col-form-label">Birthday</label>
        <div class="col-sm-10">
            <input type="date" class="form-control" id="inputBirthday" placeholder="Birthday">
        </div>
    </div>
    <fieldset class="form-group">
        <div class="row">
            <legend class="col-form-label col-sm-2 pt-0">Mail Flag</legend>
            <div class="col-sm-10">
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="gridSelect" id="gridSelect1" value="1" checked>
                    <label class="form-check-label" for="gridSelect1">
                        On
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="gridSelect" id="gridSelect2" value="2">
                    <label class="form-check-label" for="gridSelect2">
                        Off
                    </label>
                </div>
            </div>
        </div>
    </fieldset>
    <div class="form-group row">
        <div class="col-sm-10">
            <button type="submit" class="btn btn-primary">Create</button>
            <a href="{{ route('admin.account.index') }}" class="btn btn-light">Back</a>
        </div>
    </div>
</form>