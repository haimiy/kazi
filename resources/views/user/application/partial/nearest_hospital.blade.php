<div class="tab-pane fade" role="tabpanel" aria-labelledby="facility-near-tab" id="step3">
    <div class="card-body">
        <div class="form-group row">
            <label class="col-sm-4 col-form-label">Nearest Hospital Name</label>
            <div class="col-sm-8">
                <div class="form-group">
                    <input type="text" class="form-control" name="nearest_hospital_name" required />
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-4 col-form-label">Nearest Hospital Owner (if owner known)</label>
            <div class="col-sm-8">
                <div class="form-group">
                    <input type="text" class="form-control" name="nearest_hospital_owner" />
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-4 col-form-label">Nearest Hospital Distance</label>
            <div class="col-sm-8">
                <div class="form-group">
                    <input type="text" class="form-control" name="nearest_hospital_distance" required />
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-4 col-form-label">Latitude</label>
            <div class="col-sm-8">
                <div class="form-group">
                    <input type="text" class="form-control" name="latitude" required />
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-4 col-form-label">Longitude</label>
            <div class="col-sm-8">
                <div class="form-group">
                    <input type="text" class="form-control" name="Longitude" required />
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-4 col-form-label">Type of Health Unit</label>
            <div class="col-sm-8">
                <select class="form-control" name="nearest_hospital_type_of_health_unit" style="width: 100%;">
                    <option value="">--Select--</option>
                    <option value="Hospital">Hospital</option>
                    <option value="Healt Center">Healt Center</option>
                    <option value="Dispensary">Dispensary</option>
                    <option value="Clinic">Clinic</option>
            </select>
            </div>
        </div>
    </div>
    <div class="card-footer">
        <button type="button"  onclick="changeTab(2)"  class="btn btn-primary">Previous</button>
        <button type="button"   onclick="changeTab(4)"  class="btn btn-primary float-right">Next</button>
    </div>
</div>
