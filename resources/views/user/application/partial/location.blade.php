<div class="tab-pane fade" role="tabpanel" aria-labelledby="facility-location-tab" id="step2">
                                            <div class="card-body">
                                                <div class="form-group row">
                                                    <label class="col-sm-4 col-form-label">Street</label>
                                                    <div class="col-sm-8">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control" name="street" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-4 col-form-label">Address</label>
                                                    <div class="col-sm-8">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control" name="address" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-4 col-form-label">Village</label>
                                                    <div class="col-sm-8">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control" name="village" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-4 col-form-label">Ward</label>
                                                    <div class="col-sm-8">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control" name="ward" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-4 col-form-label">PO BOX</label>
                                                    <div class="col-sm-8">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control" name="po_box" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-4 col-form-label">District Name</label>
                                                    <div class="col-sm-8">
                                                        <select class="form-control" name="district_id" style="width: 100%;">
                                                        <option value="#">--Select--</option>
                                                        @foreach ($districts as $district)
                                                        <option value="{{ $district->id }}">{{ $district->name }}</option>
                                                        @endforeach
                                                    </select>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-sm-4 col-form-label">Region</label>
                                                    <div class="col-sm-8">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control" name="region" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-footer">
                                                <button type="button"   onclick="changeTab(1)"  class="btn btn-primary">Previous</button>
                                                <button type="button"  onclick="changeTab(3)"  class="btn btn-primary float-right">Next</button>
                                            </div>
                                        </div>