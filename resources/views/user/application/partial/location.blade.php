<div class="tab-pane fade" role="tabpanel" aria-labelledby="facility-location-tab" id="step2">
    <div class="card-body">
        <div class="form-group row">
            <label class="col-sm-4 col-form-label">Street</label>
            <div class="col-sm-8">
                <div class="form-group">
                    <input type="text" class="form-control" id="street" name="street" required />
                    <span class="text-danger" id="street_error"></span>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-4 col-form-label">Address</label>
            <div class="col-sm-8">
                <div class="form-group">
                    <input type="text" class="form-control" id="address" name="address" required />
                    <span class="text-danger" id="address_error"></span>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-4 col-form-label">Village</label>
            <div class="col-sm-8">
                <div class="form-group">
                    <input type="text" class="form-control" id="village" name="village" required />
                    <span class="text-danger" id="village_error"></span>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-4 col-form-label">Ward</label>
            <div class="col-sm-8">
                <div class="form-group">
                    <input type="text" class="form-control" id="ward" name="ward" required/>
                    <span class="text-danger" id="ward_error"></span>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-4 col-form-label">PO BOX</label>
            <div class="col-sm-8">
                <div class="form-group">
                    <input type="text" class="form-control" id="po_box" name="po_box" required />
                    <span class="text-danger" id="po_box_error"></span>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-4 col-form-label">District Name</label>
            <div class="col-sm-8">
                <select class="form-control" required id="district_id" name="district_id" style="width: 100%;">
                <option value="">--Select--</option>
                @foreach ($districts as $district)
                <option value="{{ $district->id }}">{{ $district->name }}</option>
                @endforeach
            </select>
                <span class="text-danger" id="district_id_error"></span>
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-4 col-form-label">Region</label>
            <div class="col-sm-8">
                <div class="form-group">
                    <input type="text" class="form-control" id="region" name="region" required />
                    <span class="text-danger" id="region_error"></span>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-4 col-form-label">Latitude</label>
            <div class="col-sm-8">
                <div class="form-group">
                    <input type="text" class="form-control" id="latitude" name="latitude" required />
                    <span class="text-danger" id="latitude_error"></span>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-4 col-form-label">Longitude</label>
            <div class="col-sm-8">
                <div class="form-group">
                    <input type="text" class="form-control" id="longitude" name="longitude" required />
                    <span class="text-danger" id="longitude_error"></span>
                </div>
            </div>
        </div>
    </div>
    <div class="card-footer">
        <button type="button"   onclick="changeTab(1)"  class="btn btn-primary">Previous</button>
        <button type="button"  onclick="changeTab(3)"  class="btn btn-primary float-right">Next</button>
    </div>
</div>
