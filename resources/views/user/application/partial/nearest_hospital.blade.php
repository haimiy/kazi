<div class="tab-pane fade" role="tabpanel" aria-labelledby="facility-near-tab" id="step3">
    <div class="card-body">
        <div class="form-group row">
            <label class="col-sm-4 col-form-label">Nearest Hospital Name</label>
            <div class="col-sm-8">
                <div class="form-group">
                    <input type="text" class="form-control" id="nearest_hospital_name" name="nearest_hospital_name" required />
                    <span class="text-danger" id="nearest_hospital_name_error"></span>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-4 col-form-label">Nearest Hospital Owner (if owner known)</label>
            <div class="col-sm-8">
                <div class="form-group">
                    <input type="text" class="form-control" id="nearest_hospital_owner" name="nearest_hospital_owner" />
                    <span class="text-danger" id="nearest_hospital_owner_error"></span>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-4 col-form-label">Nearest Hospital Distance</label>
            <div class="col-sm-8">
                <div class="form-group">
                    <input type="text" class="form-control" id="nearest_hospital_distance" name="nearest_hospital_distance" required />
                    <span class="text-danger" id="nearest_hospital_distance_error"></span>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-4 col-form-label">Type of Health Unit</label>
            <div class="col-sm-8">
            <select class="form-control" id="nearest_hospital_type_of_health_unit" name="nearest_hospital_type_of_health_unit" style="width: 100%;">
                    <option value="">--Select--</option>
                    <option value="Hospital">Hospital</option>
                    <option value="Healt Center">Healt Center</option>
                    <option value="Dispensary">Dispensary</option>
                    <option value="Clinic">Clinic</option>
            </select>
                <span class="text-danger" id="nearest_hospital_type_of_health_unit_error"></span>
            </div>
        </div>
    </div>
    <div class="card-footer">
        <button type="button"  onclick="changeTab(2)"  class="btn btn-primary">Previous</button>
        <button type="button"   onclick="changeTab(4)"  class="btn btn-primary float-right">Next</button>
    </div>
</div>
