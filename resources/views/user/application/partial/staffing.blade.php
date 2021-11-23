 <div class="tab-pane fade" role="tabpanel" aria-labelledby="staffing" id="step5">
                                            <div class="card-body">
                                                <table class="table table-sm table-bordered">
                                                    <thead>
                                                    <tr>
                                                        <th rowspan="2">
                                                            #
                                                        </th>
                                                        <th rowspan="2">
                                                            Staffing
                                                        </th>
                                                        <th colspan="2" style="text-align: center;">
                                                            Number of Employed
                                                        </th>
                                                    </tr>
                                                    <tr>
                                                        <th>Full time</th>
                                                        <th>Part time</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($occupations as $occupation)
                                                        <tr>
                                                            <input type="hidden" name="staff_occupation_id[]" value="{{ $occupation->id }}"/>
                                                            <td>{{ $loop->iteration }}</td>
                                                            <td>
                                                                {{ $occupation->name }}
                                                                @if($occupation->is_specified)
                                                                    <input type="text" id="occupation-specified" class="form-control-sm form-control" placeholder="Please specify here...." name="specified_occupation">
                                                                @endif
                                                            </td>
                                                            <td>
                                                                <input type="number" value="0" id="staffing-full-time-{{$occupation->id}}" class="form-control form-control-sm" name="no_of_full_time">
                                                            </td>
                                                            <td>
                                                                <input type="number" value="0" id="staffing-part-time-{{$occupation->id}}" class="form-control form-control-sm" name="no_of_part_time">
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                                </table>
                                            </div>

                                            <div class="card-footer">
                                                <button type="button"  onclick="changeTab(4)" class="btn btn-primary">Previous</button>
                                                <button type="button" class="btn btn-primary float-right" onclick="changeTab(6)">Next</button>
                                            </div>
                                        </div>