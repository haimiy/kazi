<div class="tab-pane fade" role="tabpanel" aria-labelledby="services-offered-tab" id="step7">
                                            <div class="card-body">
                                                <table class="table table-bordered table-sm">
                                                    <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Type of ward</th>
                                                        <th>Number of Beds</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($typeOfWards as $typeOfWard)
                                                    <tr>
                                                        <input type="hidden" value="{{$typeOfWard->id}}" name="type_of_ward_id[]">
                                                        <td>{{$loop->iteration}}</td>
                                                        <td>
                                                            {{$typeOfWard->name}}
                                                            @if($typeOfWard->is_specified)
                                                                <input type="text" id="type-of-ward-specified" class="form-control-sm form-control" placeholder="Please enter type of ward here..." name="specified_ward_type">
                                                            @endif
                                                        </td>
                                                        <td>
                                                            <input type="number" value="0" id="number-of-bed-by-type-of-ward-{{$typeOfWard->id}}" class="form-control form-control-sm" name="no_of_beds">
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                    </tbody>

                                                </table>
                                            </div>

                                            <div class="card-footer">
                                                <button type="button"  onclick="changeTab(6)" class="btn btn-primary">Previous</button>
                                                <button type="button" class="btn btn-primary float-right" onclick="changeTab(8)">Next</button>
                                            </div>
                                        </div>