 <div class="tab-pane fade" role="tabpanel" aria-labelledby="services-offered-tab" id="step8">
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <label for="">1). Building (Wall intact/have cracks)</label>
                <ul>
                    @foreach($buildingParts as $buildingPart)
                        <li><label>{{$buildingPart->name}}</label>
                            <div class="form-group">
                                @foreach($buildingPart->state as $state)
                                    <div class="custom-control custom-radio">
                                        <input class="custom-control-input" type="radio" value="{{ $state->name }}" id="building-part-state-{{$state->id}}" name="building-part-state-{{$buildingPart->id}}">
                                        <label for="building-part-state-{{$state->id}}" class="custom-control-label">{{ $state->name }}</label>
                                    </div>
                                @endforeach
                            </div>
                        </li>
                    @endforeach
                </ul>
                <br/>
                <label for="">3). Sanitation:</label>
                <ul>
                    <li><label>Type of toilet</label>
                        <div class="form-group">
                            <div class="custom-control custom-radio">
                                <input class="custom-control-input" type="radio" value="None" id="toilet-sanitation-type-of-toilet-none" name="toilet-sanitation-type-of-toilet">
                                <label for="toilet-sanitation-type-of-toilet-none" class="custom-control-label">None</label>
                            </div>
                            <div class="custom-control custom-radio">
                                <input class="custom-control-input" type="radio" value="Flush" id="toilet-sanitation-type-of-toilet-flush" name="toilet-sanitation-type-of-toilet">
                                <label for="toilet-sanitation-type-of-toilet-flush" class="custom-control-label">Flush</label>
                            </div>
                            <div class="custom-control custom-radio">
                                <input class="custom-control-input" type="radio" value="Pit latrine" id="toilet-sanitation-type-of-toilet-pit-latrine" name="toilet-sanitation-type-of-toilet">
                                <label for="toilet-sanitation-type-of-toilet-pit-latrine" class="custom-control-label">Pit latrine</label>
                            </div>
                        </div>

                    </li>
                    <li><label>Type for Gender</label>
                        <div class="form-group">
                            <div class="custom-control custom-radio">
                                <input class="custom-control-input" type="radio" value="Male" id="toilet-sanitation-type-for-gender-male" name="toilet-sanitation-type-for-gender">
                                <label for="toilet-sanitation-type-for-gender-male" class="custom-control-label">Male</label>
                            </div>
                            <div class="custom-control custom-radio">
                                <input class="custom-control-input" type="radio" value="Female" id="toilet-sanitation-type-for-gender-female" name="toilet-sanitation-type-for-gender">
                                <label for="toilet-sanitation-type-for-gender-female" class="custom-control-label">Female</label>
                            </div>
                            <div class="custom-control custom-radio">
                                <input class="custom-control-input" type="radio" value="Both" id="toilet-sanitation-type-for-gender-both" name="toilet-sanitation-type-for-gender">
                                <label for="toilet-sanitation-type-for-gender-both" class="custom-control-label">Both</label>
                            </div>
                        </div>
                    </li>
                    <li><label>State of Toilet</label>
                        <div class="form-group">
                            @foreach($stateOfToilets as $stateOfToilet)
                                <div class="custom-control custom-radio">
                                    <input class="custom-control-input" type="radio" value="{{ $stateOfToilet }}" id="toilet-sanitation-state-of-toilet-{{ str_replace(' ','-',strtolower($stateOfToilet)) }}" name="toilet-sanitation-state-of-toilet">
                                    <label for="toilet-sanitation-state-of-toilet-{{ str_replace(' ','-',strtolower($stateOfToilet)) }}" class="custom-control-label">{{ $stateOfToilet }}</label>
                                </div>
                            @endforeach
                        </div>
                    </li>
                    <li><label>Sewerage system</label>
                        <div class="form-group">
                            @foreach($sewerageSystems as $sewerageSystem)
                                <div class="custom-control custom-radio">
                                    <input class="custom-control-input" type="radio" value="{{ $sewerageSystem }}" id="toilet-sanitation-sewerage-system-{{ str_replace(' ','-',strtolower($sewerageSystem)) }}" name="toilet-sanitation-sewerage-system">
                                    <label for="toilet-sanitation-sewerage-system-{{ str_replace(' ','-',strtolower($sewerageSystem)) }}" class="custom-control-label">{{ $sewerageSystem }}</label>
                                </div>
                            @endforeach
                        </div>
                    </li>
                </ul>
            </div>
            <div class="col-md-6">
                <label for="">2). Water Supply</label>
                <ul>
                    <li><label>Source of water</label>
                        <div class="form-group">
                            @foreach($waterSupplies as $waterSupply)
                                <div class="custom-control custom-checkbox">
                                    <input class="custom-control-input" type="checkbox" value="{{ $waterSupply->name }}" id="source-of-water-{{$waterSupply->id}}" name="source-of-water-opt">
                                    <label for="source-of-water-{{$waterSupply->id}}" class="custom-control-label">{{ $waterSupply->name }}</label>
                                </div>
                            @endforeach
                        </div>
                    </li>
                    <li><label>Is water adequate for all purposes?</label>
                        <div class="form-group">
                            <div class="custom-control custom-radio">
                                <input class="custom-control-input" type="radio" value="Yes" id="is-water-adequate-yes" name="is-water-adequate">
                                <label for="is-water-adequate-yes" class="custom-control-label">Yes</label>
                            </div>
                            <div class="custom-control custom-radio">
                                <input class="custom-control-input" type="radio" value="No" id="is-water-adequate-no" name="is-water-adequate">
                                <label for="is-water-adequate-no" class="custom-control-label">No</label>
                            </div>
                        </div>
                    </li>
                    <li><label>Water available for drink?</label>
                        <div class="form-group">
                            <div class="custom-control custom-radio">
                                <input class="custom-control-input" type="radio" value="None" id="water-for-drink-none" name="water-for-drink">
                                <label for="water-for-drink-none" class="custom-control-label">None</label>
                            </div>
                            <div class="custom-control custom-radio">
                                <input class="custom-control-input" type="radio" value="Not boiled" id="water-for-drink-not-boiled" name="water-for-drink">
                                <label for="water-for-drink-not-boiled" class="custom-control-label">Not boiled</label>
                            </div>
                            <div class="custom-control custom-radio">
                                <input class="custom-control-input" type="radio" value="Yes" id="water-for-drink-yes" name="water-for-drink">
                                <label for="water-for-drink-yes" class="custom-control-label">Yes (and boiled)</label>
                            </div>
                        </div>
                    </li>
                </ul><br/>
                <label for="">4). Waste Disposal</label>
                <ul>
                    @foreach($wasteDisposals as $wasteDisposal)
                        <li><label>{{$wasteDisposal['name']}}</label>
                            <div class="form-group">
                                @foreach($wasteDisposal['list'] as $list)
                                    <div class="custom-control custom-radio">
                                        <input class="custom-control-input" type="radio" value="{{ $list }}" id="waste-disposal-{{ str_replace('/','-',strtolower(str_replace(' ','-',$wasteDisposal['name']))) }}-{{str_replace('/','-',strtolower(str_replace(' ','-',$list)))}}" name="waste-disposal-{{ str_replace('/','-',strtolower(str_replace(' ','-',$wasteDisposal['name']))) }}">
                                        <label for="waste-disposal-{{ str_replace('/','-',strtolower(str_replace(' ','-',$wasteDisposal['name']))) }}-{{str_replace('/','-',strtolower(str_replace(' ','-',$list)))}}" class="custom-control-label">{{ $list }}</label>
                                    </div>
                                @endforeach
                            </div>
                        </li>
                    @endforeach
                </ul>

            </div>
        </div>
    </div>

    <div class="card-footer">
        <button type="button"  onclick="changeTab(7)" class="btn btn-primary">Previous</button>
        <button type="submit" class="btn btn-primary float-right">Submit</button>
    </div>
</div>
