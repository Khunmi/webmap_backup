<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>First WebMap</title>

    <link rel="stylesheet" href="styles.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.7.0/leaflet.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="source/jquery-ui.min.css">
    <link rel="stylesheet" href="plugins/sidebar/leaflet-sidebar.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/leaflet-easybutton@2/src/easy-button.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/fontawesome.min.css">
    <link rel="stylesheet" href="https://ppete2.github.io/Leaflet.PolylineMeasure/Leaflet.PolylineMeasure.css" />
    <link rel="stylesheet" href="https://unpkg.com/@geoman-io/leaflet-geoman-free@latest/dist/leaflet-geoman.css"/>
    <link rel="stylesheet" href="plugins/minimap/Control.MiniMap.css">
    <link rel="stylesheet" href="plugins/zoombar/L.Control.ZoomBar.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.26.17/dist/sweetalert2.min.css">



    <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.7.0/leaflet.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.7.0/leaflet-src.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.js"></script>
    <script src="source/jquery-ui.min.js"></script>
    <script src="plugins/sidebar/leaflet-sidebar.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/leaflet-easybutton@2/src/easy-button.js"></script>
    <script src="https://ppete2.github.io/Leaflet.PolylineMeasure/Leaflet.PolylineMeasure.js"></script>
    <script src="https://unpkg.com/@geoman-io/leaflet-geoman-free@latest/dist/leaflet-geoman.js"></script>
    <script src="plugins/minimap/Control.MiniMap.js"></script>
    <script src="plugins/zoombar/L.Control.ZoomBar.js"></script>
    <script src="plugins/ajax/leaflet.ajax.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.26.17/dist/sweetalert2.all.min.js"></script>

    <style>
        .bold {
            font-weight: bold;
            font-size: 16px;
        }
        .errorMsg {
            padding: 0;
            text-align: center;
            background-color: darksalmon;
        }
        .new_feature {
            border: 2px solid #5bc0de;
            padding: 10px;
            display: none;
            background-color: #f0f8ff;
        }
    </style>

</head>
<body>
    <!-- <div id="sidebar" class="col-nd-3">
        <div id="divValve" class="col-xs-12">

            <div class="col-xs-12" style="height: 10px;"></div>

            <div class="col-xs-12">
                <p class="text-center bold">Valve Information</p>
            </div>
            <div class="col-xs-12 errorMsg" id="valve_error"></div>

            <div class="col-xs-12" style="height: 10px;"></div>

            <div class="form-group">
                <div class="col-xs-6">
                    <input type="text" id ='valve_id' class="form-control" placeholder="Valve ID">
                </div>
                <div class="col-xs-6">
                    <button id="findValve" class="btn btn-primary btn-block">Find Valve</button>
                </div>
            </div>

            <div class="col-xs-12" id="valve_information"></div>
        </div>

        <div class="col-xs-12" style="height: 50px;"></div>
        
        <div id="divPipeline" class="col-xs-12">

            <div class="col-xs-12" style="height: 10px;"></div>

            <div class="col-xs-12">
                <p class="text-center bold">Pipeline Information</p>
            </div>
            <div class="col-xs-12 errorMsg" id="pipeline_error"></div>

            <div class="col-xs-12" style="height: 10px;"></div>

            <div class="form-group">
                <div class="col-xs-6">
                    <input type="text" id ='pipeline_id' class="form-control" placeholder="Pipeline ID">
                </div>
                <div class="col-xs-6">
                    <button id="findPipeline" class="btn btn-primary btn-block">Find Pipeline</button>
                </div>
            </div>
            <div class="col-xs-12" id="pipeline_information"></div>
        </div>

        <div class="col-xs-12" style="height: 50px;"></div>

        <div id="divBuilding" class="col-xs-12">

            <div class="col-xs-12" style="height: 10px;"></div>

            <div class="col-xs-12">
                <p class="text-center bold">Building Information</p>
            </div>
            <div class="col-xs-12 errorMsg" id="building_error"></div>

            <div class="col-xs-12" style="height: 10px;"></div>

            <div class="form-group">
                <div class="col-xs-6">
                    <input type="text" id ='building_id' class="form-control" placeholder="Building Account Number">
                </div>
                <div class="col-xs-6">
                    <button id="findBuilding" class="btn btn-primary btn-block">Find Building</button>
                </div>
            </div>
            <div class="col-xs-12" id="building_information"></div>
        </div>
    </div> -->

        <div id="sidebar" class="sidebar collapsed">
            <!-- Nav tabs -->
            <div class="sidebar-tabs">
                <ul role="tablist">
                    <li><a href="#home" role="tab"><i class="fa fa-home"></i></a></li>
                    <li><a href="#valve" role="tab"><i class="fa fa-puzzle-piece"></i></a></li>
                    <li><a href="#pipeline" role="tab"><i class="fa fa-sliders"></i></a></li>
                    <li><a href="#building" role="tab"><i class="fa fa-building"></i></a></li>
                </ul>
            </div>

            <!-- Tab panes -->
            <div class="sidebar-content">

                <div class="sidebar-pane" id="home">
                    <h1 class="sidebar-header">
                        Home
                        <span class="sidebar-close"><i class="fa fa-caret-left"></i></span>
                    </h1>
                    <div id="divHome" class="col-xs-12">

                        <div class="col-xs-12" style="height: 10px;"></div>

                        <div class="col-xs-12">
                            <p class="text-center bold">Filter an Area</p>
                        </div>
                        <div class="col-xs-12 errorMsg" id="home_error"></div>

                        <div class="col-xs-12" style="height: 10px;"></div>

                        <div class="form-group">
                            <div class="col-xs-6">
                                <select class="form-control" name="dma_id" id="dma_id">
                                    <option value=""></option>
                                    <option value="105">105</option>
                                    <option value="911B">911B</option>
                                </select>
                            </div>
                            <div class="col-xs-6">
                                <button id="filter_dma" class="btn btn-primary btn-block">Filter Area</button>
                            </div>
                        </div>

                        <div class="col-xs-12" id="home_information"></div>
                    </div>
                </div>

                <div class="sidebar-pane" id="valve">
                    <h1 class="sidebar-header">
                        Valves
                        <span class="sidebar-close"><i class="fa fa-caret-left"></i></span>
                    </h1>

                    <div id="divValve" class="col-xs-12">

                        <div class="col-xs-12" style="height: 10px;"></div>

                        <div class="col-xs-12">
                            <p class="text-center bold">Valve Information</p>
                        </div>
                        <div class="col-xs-12 errorMsg" id="valve_error"></div>

                        <div class="col-xs-12" style="height: 10px;"></div>

                        <div class="form-group">
                            <div class="col-xs-6">
                                <input type="text" id ='valve_id' class="form-control" placeholder="Valve ID">
                            </div>
                            <div class="col-xs-6">
                                <button id="findValve" class="btn btn-primary btn-block">Find Valve</button>
                            </div>
                        </div>

                        <div class="col-xs-12" id="valve_information"></div>
                    </div>
                 

                    <div class ="col-xs-12" style="height: 60px;"></div>

                    <div id="newValve" class="col-xs-12">

                        <div class="col-xs-8">
                            <button type="button" class="btn btn-info btn-block" id="btn_valve_form">Insert New Valve</button>
                        </div>

                        <div class="col-xs-4">
                            <button type="button" class="btn btn-success btn-block" id="btn_valve_refresh">Refresh</button>
                        </div>

                        <div class="col-xs-12" style="height: 10px;"></div>

                        <div id="new_valve_information" class="col-xs-12 new_feature">

                            <label class="control-lable col-sm-4" for="valve_id_new">Valve ID</label>
                            <div class="col-sm-8">
                                <input type="text" id="valve_id_new" name="valve_id_new" class="form-control">
                            </div>

                            <div class="col-xs-12" style="height: 10px;"></div>

                            <label class="control-lable col-sm-4" for="valve_id_new">Valve Type</label>
                            <div class="col-sm-8">
                                <select class="form-control" name="valve_type" id="valve_type">
                                    <option value=""></option>
                                    <option value="Gate Valve">Gate Valve</option>
                                    <option value="Air Release Valve">Air Release Valve</option>
                                    <option value="Washout Valve">Washout Valve</option>
                                </select>
                            </div>

                            <div class="col-xs-12" style="height: 10px;"></div>
                            <label class="control-lable col-sm-4" for="valve_dma_id">DMA ID</label>
                            <div class="col-sm-8">
                                <input type="text" id="valve_dma_id" name="valve_dma_id" class="form-control">
                            </div>

                            <div class="col-xs-12" style="height: 10px;"></div>

                            <label class="control-lable col-sm-4" for="valve_diameter">Diameter (mm)</label>
                            <div class="col-sm-8">
                                <input type="text" id="valve_diameter" name="valve_diameter" class="form-control">
                            </div>

                            <div class="col-xs-12" style="height: 10px;"></div>

                            <label class="control-lable col-sm-4" for="valve_visibility">Visibility</label>
                            <div class="col-sm-8">
                                <select class="form-control" name="valve_visibility" id="valve_visibility">
                                    <option value=""></option>
                                    <option value="Visible">Visible</option>
                                    <option value="Hidden">Hidden</option>
                                </select>
                            </div>

                            <div class="col-xs-12" style="height: 10px;"></div>

                            <label class="control-lable col-sm-4" for="valve_location">Location</label>
                            <div class="col-sm-8">
                                <input type="text" id="valve_location" name="valve_location" class="form-control">
                            </div>

                            <div class="col-xs-12" style="height: 10px;"></div>

                            <label class="control-lable col-sm-4" for="valve_geometry">Geometry</label>
                            <div class="col-sm-8">
                                <textarea id="valve_geometry" name="valve_geometry" disabled></textarea>
                            </div>

                            <div class="col-xs-12" style="height: 10px;"></div>

                            <div class="col-xs-6">
                                <button type="button" class="btn btn-danger btn-block" id="btn_valve_cancel">Cancel</button>
                            </div>
                            <div class="col-xs-6">
                                <button type="button" class="btn btn-success btn-block" id="btn_valve_insert">Insert Valve</button>
                            </div>
                        </div>
                    </div>

                    <div id="valve_status" class="col-xs-12"></div>
                </div>

                <div class="sidebar-pane" id="pipeline">
                    <h1 class="sidebar-header">
                        Pipelines
                        <span class="sidebar-close"><i class="fa fa-caret-left"></i></span>
                    </h1>
                    <div id="divPipeline" class="col-xs-12">

                        <div class="col-xs-12" style="height: 10px;"></div>

                        <div class="col-xs-12">
                            <p class="text-center bold">Pipeline Information</p>
                        </div>
                        <div class="col-xs-12 errorMsg" id="pipeline_error"></div>

                        <div class="col-xs-12" style="height: 10px;"></div>

                        <div class="form-group">
                            <div class="col-xs-6">
                                <input type="text" id ='pipeline_id' class="form-control" placeholder="Pipeline ID">
                            </div>
                            <div class="col-xs-6">
                                <button id="findPipeline" class="btn btn-primary btn-block">Find Pipeline</button>
                            </div>
                        </div>
                        <div class="col-xs-12" id="pipeline_information"></div>
                    </div>
                

                    <div class ="col-xs-12" style="height: 60px;"></div>

                    <div id="newPipeline" class="col-xs-12">

                        <div class="col-xs-8">
                            <button type="button" class="btn btn-info btn-block" id="btn_pipeline_form">Insert New Pipeline</button>
                        </div>

                        <div class="col-xs-4">
                            <button type="button" class="btn btn-success btn-block" id="btn_pipeline_refresh">Refresh</button>
                        </div>

                        <div class="col-xs-12" style="height: 10px;"></div>

                        <div id="new_pipeline_information" class="col-xs-12 new_feature">

                            <label class="control-lable col-sm-4" for="pipe_id_new">Pipeline ID</label>
                            <div class="col-sm-8">
                                <input type="text" id="pipe_id_new" name="pipe_id_new" class="form-control">
                            </div>

                            <div class="col-xs-12" style="height: 10px;"></div>

                            <label class="control-lable col-sm-4" for="pipeline_category">Category</label>
                            <div class="col-sm-8">
                                <select class="form-control" name="pipeline_category" id="pipeline_category">
                                    <option value=""></option>
                                    <option value="Distribution Pipeline">Distribution Pipeline</option>
                                    <option value="Reticulation Pipeline">Reticulation Pipeline</option>
                                    <option value="Transmission Pipeline">Transmission Pipeline</option>
                                </select>
                            </div>

                            <div class="col-xs-12" style="height: 10px;"></div>

                            <label class="control-lable col-sm-4" for="pipeline_diameter">Diameter (mm)</label>
                            <div class="col-sm-8">
                                <input type="text" id="pipeline_diameter" name="pipeline_diameter" class="form-control">
                            </div>

                            <div class="col-xs-12" style="height: 10px;"></div>

                            <label class="control-lable col-sm-4" for="pipeline_dma_id">DMA ID</label>
                            <div class="col-sm-8">
                                <input type="text" id="pipeline_dma_id" name="pipeline_dma_id" class="form-control">
                            </div>

                            <div class="col-xs-12" style="height: 10px;"></div>

                            <label class="control-lable col-sm-4" for="pipeline_material">Material</label>
                            <div class="col-sm-8">
                                <input type="text" id="pipeline_material" name="pipeline_material" class="form-control">
                            </div>

                            <div class="col-xs-12" style="height: 10px;"></div>

                            <label class="control-lable col-sm-4" for="pipeline_location">Location</label>
                            <div class="col-sm-8">
                                <input type="text" id="pipeline_location" name="pipeline_location" class="form-control">
                            </div>

                            <div class="col-xs-12" style="height: 10px;"></div>

                            <label class="control-lable col-sm-4" for="pipeline_geometry">Geometry</label>
                            <div class="col-sm-8">
                                <textarea id="pipeline_geometry" name="pipeline_geometry" disabled></textarea>
                            </div>

                            <div class="col-xs-12" style="height: 10px;"></div>

                            <div class="col-xs-6">
                                <button type="button" class="btn btn-danger btn-block" id="btn_pipeline_cancel">Cancel</button>
                            </div>
                            <div class="col-xs-6">
                                <button type="button" class="btn btn-success btn-block" id="btn_pipeline_insert">Insert Pipeline</button>
                            </div>
                        </div>
                    </div>

                    <div id="pipeline_status" class="col-xs-12"></div>
                </div>

                <div class="sidebar-pane" id="building">
                    <h1 class="sidebar-header">
                        Buildings
                        <span class="sidebar-close"><i class="fa fa-caret-left"></i></span>
                    </h1>
                    <div id="divBuilding" class="col-xs-12">
                        <div class="col-xs-12" style="height: 10px;"></div>

                        <div class="col-xs-12">
                            <p class="text-center bold">Building Information</p>
                        </div>
                        <div class="col-xs-12 errorMsg" id="building_error"></div>

                        <div class="col-xs-12" style="height: 10px;"></div>

                        <div class="form-group">
                            <div class="col-xs-6">
                                <input type="text" id ='building_id' class="form-control" placeholder="Building Account Number">
                            </div>
                            <div class="col-xs-6">
                                <button id="findBuilding" class="btn btn-primary btn-block">Find Building</button>
                            </div>
                        </div>
                        <div class="col-xs-12" id="building_information"></div>
                    </div>
                

                    <div class ="col-xs-12" style="height: 60px;"></div>

                    <div id="newBuilding" class="col-xs-12">

                        <div class="col-xs-8">
                            <button type="button" class="btn btn-info btn-block" id="btn_building_form">Insert New Building</button>
                        </div>

                        <div class="col-xs-4">
                            <button type="button" class="btn btn-success btn-block" id="btn_building_refresh">Refresh</button>
                        </div>

                        <div class="col-xs-12" style="height: 10px;"></div>

                        <div id="new_building_information" class="col-xs-12 new_feature">

                            <label class="control-lable col-sm-4" for="account_no_new">Building ID</label>
                            <div class="col-sm-8">
                                <input type="text" id="account_no_new" name="account_no_new" class="form-control">
                            </div>

                            <div class="col-xs-12" style="height: 10px;"></div>

                            <label class="control-lable col-sm-4" for="building_category">Building Category</label>
                            <div class="col-sm-8">
                                <select class="form-control" name="building_category" id="building_category">
                                    <option value=""></option>
                                    <option value="Building">Building</option>
                                    <option value="Tin Shed">Tin Shed</option>
                                    <option value="Open Plot">Open Plot</option>
                                </select>
                            </div>

                            <div class="col-xs-12" style="height: 10px;"></div>

                            <label class="control-lable col-sm-4" for="building_dma_id">DMA ID</label>
                            <div class="col-sm-8">
                                <input type="text" id="building_dma_id" name="building_dma_id" class="form-control">
                            </div>

                            <div class="col-xs-12" style="height: 10px;"></div>

                            <label class="control-lable col-sm-4" for="building_storey">Storey</label>
                            <div class="col-sm-8">
                                <input type="number" id="building_storey" name="building_storey" class="form-control">
                            </div>

                            <div class="col-xs-12" style="height: 10px;"></div>

                            <label class="control-lable col-sm-4" for="building_population">Population</label>
                            <div class="col-sm-8">
                                <input type="number" id="building_population" name="building_population" class="form-control">
                            </div>

                            <div class="col-xs-12" style="height: 10px;"></div>

                            <label class="control-lable col-sm-4" for="building_location">Location</label>
                            <div class="col-sm-8">
                                <input type="text" id="building_location" name="building_location" class="form-control">
                            </div>

                            <div class="col-xs-12" style="height: 10px;"></div>

                            <label class="control-lable col-sm-4" for="building_geometry">Geometry</label>
                            <div class="col-sm-8">
                                <textarea id="building_geometry" name="building_geometry" disabled></textarea>
                            </div>

                            <div class="col-xs-12" style="height: 10px;"></div>

                            <div class="col-xs-6">
                                <button type="button" class="btn btn-danger btn-block" id="btn_building_cancel">Cancel</button>
                            </div>
                            <div class="col-xs-6">
                                <button type="button" class="btn btn-success btn-block" id="btn_building_insert">Insert Building</button>
                            </div>
                        </div>
                    </div>

                    <div id="building_status" class="col-xs-12"></div>
                </div>
            </div>
            

        </div>

    <div id="mapdiv" class="col-md-12"></div>

    <script>
        var map;
        var baseLayers;
        var overlays;
        var lyrSearch;

        var layerValves;
        var layerPipelines;
        var layerBuildings;
        var raster_data;

        var valves_array = [];
        var pipeline_array =[];
        var building_array =[];

        var dma_id;

        $.ajaxSetup({
            headers: {
                'X-WEBMAP-TOKEN': 'Y389470d3872dfeac228dee57f0c5643b002c227ef2b6d9f991bfa2a7de23552b'
            }
        });

        map = L.map('mapdiv', {
            center: [23.7923, 90.4167],
            zoom: 13,
            attributionControl: false,
            zoomControl: false

        });

        var GoogleStreets = L.tileLayer('https://{s}.google.com/vt/lyrs=m&x={x}&y={y}&z={z}', {
            maxZoom: 23,
            subdomains:['mt0','mt1','mt2','mt3']
        });

        var openstreetmap = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png?', {maxZoom:23});

        var CartoDB_Positron = L.tileLayer('https://{s}.basemaps.cartocdn.com/light_all/{z}/{x}/{y}{r}.png', {maxZoom: 23});

        var Esri_WorldImagery = L.tileLayer('https://server.arcgisonline.com/ArcGIS/rest/services/World_Imagery/MapServer/tile/{z}/{y}/{x}', {maxZoom: 23});

        var OpenTopoMap = L.tileLayer('https://{s}.tile.opentopomap.org/{z}/{x}/{y}.png', {maxZoom: 23,});

        GoogleStreets.addTo(map);

        var sidebar = L.control.sidebar('sidebar', {
            position: 'left'
        });

        map.addControl(sidebar);



        // L.easyButton('glyphicon-transfer', function(){
        //     sidebar.toggle();

        // }).addTo( map );

        

        // ZOOM BAR
        var zoomBar = new L.Control.ZoomBar({ position: 'topright' }).addTo(map);

        // LAYER CONTROL
        baseLayers = {
            "Google Streets": GoogleStreets,
            "OSM": openstreetmap,
            "CartoDB Positron": CartoDB_Positron,
            "ESRI World Imagery": Esri_WorldImagery,
            "Open Topo Map": OpenTopoMap,
        };
        var controlLayers = L.control.layers(baseLayers, overlays).addTo(map);
        
        // MEASURE TOOL
        L.control.polylineMeasure({position:'topright'}).addTo(map);

        // add Leaflet-Geoman controls with some options to the map  
        map.pm.addControls({  
        position: 'topright',
        drawMarker: true, 
        drawPolyline: true,
        drawPolygon: true, 
        drawCircleMarker: false,
        rotateMode: false,
        drawCircle: false,
        drawRectangle: false,
        drawText: false,
        editMode: false,
        dragMode: false,
        cutPolygon: false,
        removalMode: true,
        }); 

        map.on('pm:create', function(e) {
            var jsn = e.layer.toGeoJSON().geometry;
            var jsn_modified;
            var shape = e.shape;

            if (shape === 'Marker') {

                if(confirm("Are you sure you want to add this new Valve?")){
                    jsn_modified ={
                        type: "Point",
                        coordinates:jsn.coordinates
                    };
                    $('#valve_geometry').val(JSON.stringify(jsn_modified));
                }
            }
            else if (shape === 'Line') {
                if(confirm("Are you sure you want to add this new Pipeline?")){
                    jsn_modified ={
                        type: "MultiLineString",
                        coordinates: [jsn.coordinates]
                    };
                    $('#pipeline_geometry').val(JSON.stringify(jsn_modified));
                }
            }
            else if (shape === 'Polygon') {
                if(confirm("Are you sure you want to add this new Building?")){
                    jsn_modified ={
                        type: "MultiPolygon",
                        coordinates: [jsn.coordinates]
                    };
                    $('#building_geometry').val(JSON.stringify(jsn_modified));
                }
            }
        });

        // MINIMAP
        var miniMap = new L.Control.MiniMap(OpenTopoMap,{position:'bottomright', height: 120, width: 120}).addTo(map);

        // SCALE
        L.control.scale({position:'bottomright', maxwidth: '300', imperial: false}).addTo(map);

        // DATA LOADING

        // HOME
        $("#filter_dma").click(function(){
            dma_id = $('#dma_id').val().trim();

            if(!dma_id){
                $('#home_error').html('<p class="text-danger text-center">Please enter a valid DMA ID to filter area.</p>');
            } else{
                load_valves(dma_id);
                load_pipelines(dma_id);
                load_buildings(dma_id);
                // load_rasterdata(dma_id);
            }
        });

        // VALVES
        function load_valves(dma_id){
            $.ajax({
                // dataType: "json",
                url: "load_data.php",
                data: {table:"valves", dma_id: dma_id},
                type: "POST",
                success: function(response){
                    if (response.trim().substr(0,5) == 'ERROR') {
                        console.log(response);
                    }else{
                        var jsnValve = JSON.parse(response);

                        if(layerValves){
                            map.removeLayer(layerValves);
                            controlLayers.removeLayer(layerValves);
                        }

                        layerValves = L.geoJSON(jsnValve, {pointToLayer:style_valves}).addTo(map);
                        controlLayers.addOverlay(layerValves, 'Valves');
                        map.fitBounds(layerValves.getBounds());


                    }
                },
                error:function(xhr, status, error){
                    console.log("Error loading valves data: " + error);
                }
            });
        }
        function refresh_valves(dma_id){
            $.ajax({
                // dataType: "json",
                url: "load_data.php",
                data: {table:"valves", dma_id: dma_id},
                type: "POST",
                success: function(response){
                    if (response.trim().substr(0,5) == 'ERROR') {
                        console.log(response);
                    }else{
                        var jsnValve = JSON.parse(response);

                        if(layerValves){
                            map.removeLayer(layerValves);
                            controlLayers.removeLayer(layerValves);
                        }

                        layerValves = L.geoJSON(jsnValve, {pointToLayer:style_valves}).addTo(map);
                        controlLayers.addOverlay(layerValves, 'Valves');


                    }
                },
                error:function(xhr, status, error){
                    console.log("Error loading valves data: " + error);
                }
            });
        }
        $("#valve_id").autocomplete({
            source:valves_array
        });        

        function style_valves(feature, latlng){
            var att = feature.properties
            var color;
            var fill_color;
            var radius = 9;
            var fillOpacity = 0.8;

            valves_array.push(att.valve_id);

            switch(att.valve_type){
                case 'Air Release Valve':
                    color = '#D35400';
                    fill_color = '#D35400';
                    break;
                case 'Gate Valve':
                    color = '#2E86C1';
                    fill_color = '#2E86C1';
                    break;
                case 'Washout Valve':
                    color = '#8E44AD';
                    fill_color = '#8E44AD';
                    break;
                default:
                    color = '#16A085';
                    fill_color = '#16A085';
                    break;
            }

            var style = {radius: radius,
                         fillColor: fill_color,
                         color: color,
                        //  weight: 1,
                        //  opacity: 100,
                         fillOpacity: fillOpacity
                        };

            return L.circleMarker(latlng, style).bindTooltip('Valve ID: ' + att.valve_id + '<br>Valve Type: ' + att.valve_type +'<br>Diameter (mm): '+ att.valve_diameter+
                                                            '<br>Location: ' + att.valve_location+ '<br>Valve DMA ID: ' + att.valve_dma_id+ '<br>Valve Visibility: ' + att.valve_visibility).bindPopup(

                                                            `<div class="popup-container">

                                                                <input type="hidden" name="valve_database_id" class="updateValve" value='${att.valve_database_id}'> 

                                                                <input type="hidden" name="valve_id_old" class="updateValve" value='${att.valve_id}'>

                                                                <div class="popup-form-group">
                                                                    <label class="control-label popup-label">Valve ID.</label>
                                                                    <input type="text" class="form-control popup-input text-center updateValve" value='${att.valve_id}' name="valve_id">
                                                                </div>
                                                                <div class="popup-form-group">
                                                                    <label class="control-label popup-label">Type</label>
                                                                    <input type="text" class="form-control popup-input text-center updateValve" value='${att.valve_type}' name="valve_type">
                                                                </div>
                                                                <div class="popup-form-group">
                                                                    <label class="control-label popup-label">Diameter (mm)</label>
                                                                    <input type="number" class="form-control popup-input text-center updateValve" value='${att.valve_diameter}' name="valve_diameter">
                                                                </div>
                                                                <div class="popup-form-group">
                                                                    <label class="control-label popup-label">Visibility</label>
                                                                    <input type="text" class="form-control popup-input text-center updateValve" value='${att.valve_visibility}' name="valve_visibility">
                                                                </div>
                                                                <div class="popup-form-group">
                                                                    <label class="control-label popup-label">Location</label>
                                                                    <input type="text" class="form-control popup-input text-center updateValve" value='${att.valve_location}' name="valve_location">
                                                                </div>
                                                                <div class="popup-form-group">
                                                                    <label class="control-label popup-label">DMA ID</label>
                                                                    <input type="text" class="form-control popup-input text-center updateValve" value='${att.valve_dma_id}' name="valve_dma_id">
                                                                </div>

                                                                <div class="popup-button-group">
                                                                    <button type="submit" class="btn btn-success popup-button" onclick="updateValve()">Update</button>
                                                                    <button type="submit" class="btn btn-danger popup-button" onclick="deleteValve()">Delete</button>
                                                                </div>
                                                            </div>`);
                                                    
                                                            

        }
        function updateValve(){
            var jsn = returnFormData('updateValve');
            jsn.request= 'valves'
            Swal.fire({
                title: "Do you want to save the changes?",
                showDenyButton: true,
                showCancelButton: true,
                confirmButtonText: "Save",
                denyButtonText: `Don't save`
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: 'update_data.php',
                        type: 'POST',
                        data: jsn,
                        success: function(response) {
                              Swal.fire("Saved!", "", "success");
                              load_valves(dma_id); // Reload valves to show the updated one
                        },
                        error: function(xhr, status, error) {
                            alert(`Error updating valve: ${error}`);
                        }
                    });
                } else if (result.isDenied) {
                    Swal.fire("Changes are not saved", "", "info");
                }
            });

        }
        function deleteValve(){
            var jsn = returnFormData('updateValve');
            jsn.request= 'valves'
            Swal.fire({
                title: "Are you sure you want to delete this valve?",
                showDenyButton: true,
                showCancelButton: true,
                confirmButtonText: "Delete",
                denyButtonText: `Don't delete`
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: 'delete_data.php',
                        type: 'POST',
                        data: jsn,
                        success: function(response) {
                              Swal.fire("Deleted!", "", "success");
                              load_valves(dma_id); // Reload valves to remove the deleted one
                        },
                        error: function(xhr, status, error) {
                            alert(`Error deleting valve: ${error}`);
                        }
                    });
                } else if (result.isDenied) {
                    Swal.fire("Valve is not deleted", "", "info");
                }
            });

        }

        $('#findValve').on('click', function(){
            var valve_id = $('#valve_id').val();
            returnLayerByAttribute("valves", 'valve_id', valve_id, function(lyr){
                if(lyr){
                    var att = lyr.feature.properties;
                    if(lyrSearch){
                        lyrSearch.remove();
                    }
                    lyrSearch = L.circle(lyr.getLatLng(), {
                        color: 'red',
                        opacity: 0.6,
                        fillColor: '#f03',
                        fillOpacity: 0.3,
                        radius: 10,
                        weight: 10
                    }).addTo(map);

                    map.setView(lyr.getLatLng(), 20);

                    layerValves.bringToFront();

                    $("#valve_information").html(
                        '<br>Valve Type: ' + att.valve_type + 
                        '<br>DMA ID: ' + att.valve_dma_id +
                        '<br>Diameter (mm):</b> ' + att.valve_diameter +
                        '<br>Visibility: ' + att.valve_visibility+
                        '<br>Location: ' + att.valve_location
                    );
                    
                }
                else{
                    $('#valve_error').html('Error: Valve ID ' + valve_id + ' not found.');
                }
            });
        });

        $("#btn_valve_form").on('click', function(){
            $("#new_valve_information").show();
        });

        $("#btn_valve_cancel").on('click', function(){
            $("#new_valve_information").hide();
        });

        $("#btn_valve_insert").on('click', function(){
            // Collect form data
            var valveData = {
                valve_id: $("#valve_id_new").val(),
                valve_type: $("#valve_type").val(),
                valve_dma_id: $("#valve_dma_id").val(),
                valve_diameter: $("#valve_diameter").val(),
                valve_visibility: $("#valve_visibility").val(),
                valve_location: $("#valve_location").val(),
                valve_geometry: $("#valve_geometry").val(),
                request:'valves'}

            if(!valveData.valve_id || !valveData.valve_type || !valveData.valve_dma_id || !valveData.valve_diameter || !valveData.valve_visibility || !valveData.valve_location || !valveData.valve_geometry){
                $('#valve_status').html('<p class="text-danger">Error: Please fill in all fields.</p>' );
                return;
            } else {
            // Send data to server via AJAX
                $.ajax({
                    url: 'insert_data.php',
                    type: 'POST',
                    data: valveData,
                    success: function(response) {
                        if (response.trim().substr(0,5) == 'ERROR') {
                            $('#valve_status').html('<p class="text-danger">Error inserting valve: ' + response + '</p>' );
                        } else {
                            $('#valve_status').html('<p class="text-success">Valve inserted successfully!</p>' );
                            refresh_valves(dma_id); // Reload valves to show the new one

                            $("#valve_id_new").val("")
                            $("#valve_type").val("")
                            $("#valve_dma_id").val("")
                            $("#valve_diameter").val("")
                            $("#valve_visibility").val("")
                            $("#valve_location").val("")
                            $("#valve_geometry").val("")
                        }


                    },
                    error: function(xhr, status, error) {
                        alert('Error inserting valve: ' + error);
                    }
                });
            }

        });
        $("#btn_valve_refresh").on('click', function(){
            refresh_valves(dma_id);
        });

        // PIPELINES
        function load_pipelines(dma_id){
            $.ajax({
                // dataType: "json",
                url: "load_data.php",
                data: {table:"pipelines", dma_id: dma_id},
                type: "POST",
                success: function(response){
                    if (response.trim().substr(0,5) == 'ERROR') {
                        console.log(response);
                    }else{
                        var jsnPipeline = JSON.parse(response);

                        if(layerPipelines){
                            layerPipelines.remove();
                            controlLayers.removeLayer(layerPipelines);
                        }

                        layerPipelines = L.geoJSON(jsnPipeline, {style: style_pipelines, onEachFeature: process_pipelines}).addTo(map);
                        controlLayers.addOverlay(layerPipelines, 'Pipelines');
                        // map.fitBounds(layerPipelines.getBounds());


                    }
                },
                error:function(xhr, status, error){
                    console.log("Error loading valves data: " + error);
                }
            });
        }

            $("#pipeline_id").autocomplete({
                source:pipeline_array
            });

            function style_pipelines(feature){
                var att = feature.properties
                switch (att.pipeline_category) {
                    case 'Distribution Pipeline':
                        color = '#2980B9';
                        break;
                    case 'Reticulation Pipeline':
                        color = '#FFA07A';
                        break;
                    case 'Transmission Pipeline':
                        color = '#16A085';
                        break;
                    default:
                        color = '#17202A';
                        break;
                }

                return {color:color};
        }

        function process_pipelines(feature, layer){
            var att = feature.properties;

            pipeline_array.push(att.pipe_id);

            layer.bindTooltip('Pipeline ID: ' + att.pipe_id + '<br>Category: ' + att.pipeline_category +'<br>Diameter (mm): '+ att.pipeline_diameter+'<br>Location: ' + att.pipeline_location+'<br>Length: ' + att.length).bindPopup(

                `<div class="popup-container">

                    <input type="hidden" name="pipeline_database_id" class="updatePipeline" value='${att.pipeline_database_id}'> 

                    <input type="hidden" name="pipeline_id_old" class="updatePipeline" value='${att.pipe_id}'>

                    <div class="popup-form-group">
                        <label class="control-label popup-label">Pipeline ID.</label>
                        <input type="text" class="form-control popup-input text-center updatePipeline" value='${att.pipe_id}' name="pipe_id">
                    </div>
                    <div class="popup-form-group">
                        <label class="control-label popup-label">Category</label>
                        <input type="text" class="form-control popup-input text-center updatePipeline" value='${att.pipeline_category}' name="pipeline_category">
                    </div>
                    <div class="popup-form-group">
                        <label class="control-label popup-label">Diameter (mm)</label>
                        <input type="number" class="form-control popup-input text-center updatePipeline" value='${att.pipeline_diameter}' name="pipeline_diameter">
                    </div>
                    <div class="popup-form-group">
                        <label class="control-label popup-label">Length (m)</label>
                        <input type="number" class="form-control popup-input text-center updatePipeline" value='${att.length}' name="length">
                    </div>
                    <div class="popup-form-group">
                        <label class="control-label popup-label">Location</label>
                        <input type="text" class="form-control popup-input text-center updatePipeline" value='${att.pipeline_location}' name="pipeline_location">
                    </div>
                    <div class="popup-form-group">
                        <label class="control-label popup-label">DMA ID</label>
                        <input type="text" class="form-control popup-input text-center updatePipeline" value='${att.pipeline_dma_id}' name="pipeline_dma_id">
                    </div>

                    <div class="popup-button-group">
                        <button type="submit" class="btn btn-success popup-button" onclick="updatePipeline()">Update</button>
                        <button type="submit" class="btn btn-danger popup-button" onclick="deletePipeline()">Delete</button>
                    </div>
                </div>`);
        }
        function updatePipeline(){
            var jsn = returnFormData('updatePipeline');
            jsn.request= 'pipelines'
            Swal.fire({
                title: "Do you want to save the changes?",
                showDenyButton: true,
                showCancelButton: true,
                confirmButtonText: "Save",
                denyButtonText: `Don't save`
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: 'update_data.php',
                        type: 'POST',
                        data: jsn,
                        success: function(response) {
                              Swal.fire("Saved!", "", "success");
                              load_pipelines(dma_id); // Reload pipelines to show the updated one
                        },
                        error: function(xhr, status, error) {
                            alert(`Error updating pipeline: ${error}`);
                        }
                    });
                } else if (result.isDenied) {
                    Swal.fire("Changes are not saved", "", "info");
                }
            });

        }
        function deletePipeline(){
            var jsn = returnFormData('updatePipeline');
            jsn.request= 'pipelines'
            Swal.fire({
                title: "Are you sure you want to delete this pipeline?",
                showDenyButton: true,
                showCancelButton: true,
                confirmButtonText: "Delete",
                denyButtonText: `Don't delete`
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: 'delete_data.php',
                        type: 'POST',
                        data: jsn,
                        success: function(response) {
                              Swal.fire("Deleted!", "", "success");
                              load_pipelines(dma_id); // Reload pipelines to remove the deleted one
                        },
                        error: function(xhr, status, error) {
                            alert(`Error deleting pipeline: ${error}`);
                        }
                    });
                } else if (result.isDenied) {
                    Swal.fire("Pipeline is not deleted", "", "info");
                }
            });

        }
        $('#findPipeline').on('click', function(){
            var pipeline_id = $('#pipeline_id').val();
            returnLayerByAttribute("pipelines", 'pipe_id', pipeline_id, function(lyr){

                if(lyr){
                    var att = lyr.feature.properties;
                    if(lyrSearch){
                        lyrSearch.remove();
                    }
                    lyrSearch = L.geoJSON(lyr.toGeoJSON(), {style:{
                        color: 'black',
                        opacity: 0.6,
                        weight: 10
                    }}).addTo(map);

                    map.fitBounds(lyr.getBounds());

                    // layerPipelines.bringToFront();

                    $("#pipeline_information").html(
                        '<br>Category: ' + att.pipeline_category + 
                        '<br>Diameter (mm): ' + att.pipeline_diameter +
                        '<br>Material: ' + att.pipeline_material +
                        // '<br>Installation Year: ' + att.pipeline_install_year +
                        '<br>Length: ' + att.length +
                        ' m<br>Location: ' + att.pipeline_location
                    );
                    
                }
                else{
                    $('#pipeline_error').html('Error: Pipeline ID ' + pipeline_id + ' not found.');
                }
            });
        });

        $("#btn_pipeline_form").on('click', function(){
            $("#new_pipeline_information").show();
        });
        $("#btn_pipeline_cancel").on('click', function(){
            $("#new_pipeline_information").hide();
        });
        $("#btn_pipeline_insert").on('click', function(){
            // Collect form data
            var pipelineData = {
                pipeline_id: $("#pipe_id_new").val(),
                pipeline_category: $("#pipeline_category").val(),
                pipeline_material: $("#pipeline_material").val(),
                pipeline_diameter: $("#pipeline_diameter").val(),
                pipeline_dma_id: $("#pipeline_dma_id").val(),
                pipeline_location: $("#pipeline_location").val(),
                pipeline_geometry: $("#pipeline_geometry").val(),
                request:'pipelines'}

            console.log(pipelineData);

            if(!pipelineData.pipeline_id || !pipelineData.pipeline_category || !pipelineData.pipeline_diameter || !pipelineData.pipeline_dma_id || !pipelineData.pipeline_material || !pipelineData.pipeline_location || !pipelineData.pipeline_geometry){
                $('#pipeline_status').html('<p class="text-danger">Error: Please fill in all fields.</p>' );
                return;
            } else {
            // Send data to server via AJAX
                $.ajax({
                    url: 'insert_data.php',
                    type: 'POST',
                    data: pipelineData,
                    success: function(response) {
                        if (response.trim().substr(0,5) == 'ERROR') {
                            $('#pipeline_status').html('<p class="text-danger">Error inserting pipeline: ' + response + '</p>' );
                        } else {
                            $('#pipeline_status').html('<p class="text-success">Pipeline inserted successfully!</p>' );
                            load_pipelines(dma_id); // Reload pipelines to show the new one

                            $("#pipe_id_new").val("")
                            $("#pipeline_category").val("")
                            $("#pipeline_diameter").val("")
                            $("#pipeline_dma_id").val("")
                            $("#pipeline_material").val("")
                            $("#pipeline_location").val("")
                            $("#pipeline_geometry").val("")
                        }
                    },
                    error: function(xhr, status, error) {
                        alert('Error inserting pipeline: ' + error);
                    }
                });
            }

        });

        // REFRESH PIPELINES
        $("#btn_pipeline_refresh").on('click', function(){
            load_pipelines(dma_id);
        });

        // BUILDINGS

        function load_buildings(dma_id){
            $.ajax({
                // dataType: "json",
                url: "load_data.php",
                data: {table:"buildings", dma_id: dma_id},
                type: "POST",
                success: function(response){
                    if (response.trim().substr(0,5) == 'ERROR') {
                        console.log(response);
                    }else{
                        var jsnBuildings = JSON.parse(response);

                        if(layerBuildings){
                            layerBuildings.remove();
                            controlLayers.removeLayer(layerBuildings);
                        }

                        layerBuildings = L.geoJSON(jsnBuildings, {style: style_buildings, onEachFeature: process_buildings}).addTo(map);
                        controlLayers.addOverlay(layerBuildings, 'Buildings');
                        // map.fitBounds(layerBuildings.getBounds());


                    }
                },
                error:function(xhr, status, error){
                    console.log("Error loading valves data: " + error);
                }
            });
        }
        $("#building_id").autocomplete({
                source:building_array
            });        

        function style_buildings(feature){
            var att = feature.properties
            var storeys = att.building_storey;
            var color;
            var fill_color;
            var fill_opacity = 1;

            building_array.push(att.account_no);

            switch(att.building_category){
				case 'Building':
					if (storeys >= 10) {
						color = '#c0392b';
						fill_color = '#c0392b';
					} else if (storeys >= 8) {
						color = '#cd6155';
						fill_color = '#cd6155';
					} else if (storeys >= 5) {
						color = '#d98880';
						fill_color = '#d98880';
					} else if (storeys >= 3) {
						color = '#e6b0aa';
						fill_color = '#e6b0aa';
					} else {
						color = '#f2d7d5';
						fill_color = '#f2d7d5';
					}
					break;
				case 'Tin Shed':
					color = '#BDB76B';
					fill_color = '#BDB76B';
					fill_opacity = 0.8;
					break;
				case 'Open Plot':
					color = '#808000';
					fill_color = '#808000';
					break;
				default:
					color = 'black';
					fill_color = 'black';
					break;
			}

			return {color:color, fillColor:fill_color, fillOpacity:fill_opacity};
        }
        function process_buildings(feature, layer){
            var att = feature.properties;
            layer.bindTooltip('Category: ' + att.building_category +'<br>Storeys: '+ att.building_storey+'<br>Location: ' + att.building_location+"<br>Account Number: "+att.account_no+"<br>Population: "+att.building_population).bindPopup(

                `<div class="popup-container">

                    <input type="hidden" name="building_database_id" class="updateBuilding" value='${att.building_database_id}'> 

                    <input type="hidden" name="account_no_old" class="updateBuilding" value='${att.account_no}'>

                    <div class="popup-form-group">
                        <label class="control-label popup-label">Account No.</label>
                        <input type="text" class="form-control popup-input text-center updateBuilding" value='${att.account_no}' name="account_no">
                    </div>
                    <div class="popup-form-group">
                        <label class="control-label popup-label">Category</label>
                        <input type="text" class="form-control popup-input text-center updateBuilding" value='${att.building_category}' name="building_category">
                    </div>
                    <div class="popup-form-group">
                        <label class="control-label popup-label">Storey</label>
                        <input type="number" class="form-control popup-input text-center updateBuilding" value='${att.building_storey}' name="building_storey">
                    </div>
                    <div class="popup-form-group">
                        <label class="control-label popup-label">Population</label>
                        <input type="number" class="form-control popup-input text-center updateBuilding" value='${att.building_population}' name="building_population">
                    </div>
                    <div class="popup-form-group">
                        <label class="control-label popup-label">Location</label>
                        <input type="text" class="form-control popup-input text-center updateBuilding" value='${att.building_location}' name="building_location">
                    </div>
                    <div class="popup-form-group">
                        <label class="control-label popup-label">DMA ID</label>
                        <input type="text" class="form-control popup-input text-center updateBuilding" value='${att.building_dma_id}' name="building_dma_id">
                    </div>

                    <div class="popup-button-group">
                        <button type="submit" class="btn btn-success popup-button" onclick="updateBuilding()">Update</button>
                        <button type="submit" class="btn btn-danger popup-button" onclick="deleteBuilding()">Delete</button>
                    </div>
                </div>`);
        }
        function updateBuilding(){
            var jsn = returnFormData('updateBuilding');
            jsn.request= 'buildings'
            Swal.fire({
                title: "Do you want to save the changes?",
                showDenyButton: true,
                showCancelButton: true,
                confirmButtonText: "Save",
                denyButtonText: `Don't save`
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: 'update_data.php',
                        type: 'POST',
                        data: jsn,
                        success: function(response) {
                              Swal.fire("Saved!", "", "success");
                              load_buildings(dma_id); // Reload buildings to show the updated one
                        },
                        error: function(xhr, status, error) {
                            alert(`Error updating building: ${error}`);
                        }
                    });
                } else if (result.isDenied) {
                    Swal.fire("Changes are not saved", "", "info");
                }
            });

        }

        function deleteBuilding() {
            var jsn = returnFormData('updateBuilding');
            jsn.request= 'buildings'
            Swal.fire({
                title: "Are you sure you want to delete this building?",
                showDenyButton: true,
                showCancelButton: true,
                confirmButtonText: "Delete",
                denyButtonText: `Don't delete`
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: 'delete_data.php',
                        type: 'POST',
                        data: jsn,
                        success: function(response) {
                              Swal.fire("Deleted!", "", "success");
                              load_buildings(dma_id); // Reload buildings to show the updated one
                        },
                        error: function(xhr, status, error) {
                            alert(`Error deleting building: ${error}`);
                        }
                    });
                } else if (result.isDenied) {
                    Swal.fire("Building is not deleted", "", "info");
                }
            });

        }

        $('#findBuilding').on('click', function(){
            var account_no = $('#building_id').val();
            returnLayerByAttribute("buildings", 'account_no', account_no, function(lyr){

                if(lyr){
                    var att = lyr.feature.properties;
                    if(lyrSearch){
                        lyrSearch.remove();
                    }
                    lyrSearch = L.geoJSON(lyr.toGeoJSON(), {style:{
                        color: 'purple',
                        opacity: 0.6,
                        weight: 10,
                        // fillOpacity: 0.5
                    }}).addTo(map);

                    map.fitBounds(lyr.getBounds());

                    $("#building_information").html(
                        '<br>Category: ' + att.building_category + 
                        '<br>Storeys: ' + att.building_storey +
                        // '<br>Construction Year: ' + att.construction_year +
                        '<br>Location: ' + att.building_location
                    );
                    
                }
                else{
                    $('#building_error').html('Error: Building Account Number ' + building_id + ' not found.');
                }
            });
        });

        $("#btn_building_form").on('click', function(){
            $("#new_building_information").show();
        });
        $("#btn_building_cancel").on('click', function(){
            $("#new_building_information").hide();
        });
        $("#btn_building_insert").on('click', function(){
            // Collect form data
            var buildingData = {
                account_no: $("#account_no_new").val(),
                building_category: $("#building_category").val(),
                building_dma_id: $("#building_dma_id").val(),
                building_storey: $("#building_storey").val(),
                building_population: $("#building_population").val(),
                building_location: $("#building_location").val(),
                building_geometry: $("#building_geometry").val(),
                request:'buildings'}
            console.log(buildingData);

            if(!buildingData.account_no || !buildingData.building_category || !buildingData.building_dma_id || !buildingData.building_storey || !buildingData.building_population || !buildingData.building_location || !buildingData.building_geometry){
                $('#building_status').html('<p class="text-danger">Error: Please fill in all fields.</p>' );
                return;
            } else {
            // Send data to server via AJAX
                $.ajax({
                    url: 'insert_data.php',
                    type: 'POST',
                    data: buildingData,
                    success: function(response) {
                        if (response.trim().substr(0,5) == 'ERROR') {
                            console.log(response);
                            $('#building_status').html('<p class="text-danger">Error inserting building: ' + response + '</p>' );
                        } else {
                            $('#building_status').html('<p class="text-success">Building inserted successfully!</p>' );
                            load_buildings(dma_id); // Reload buildings to show the new one

                            $("#account_no_new").val("")
                            $("#building_category").val("")
                            $("#building_dma_id").val("")
                            $("#building_storey").val("")
                            $("#building_population").val("")
                            $("#building_location").val("")
                            $("#building_geometry").val("")
                        }
                    },
                    error: function(xhr, status, error) {
                        alert('Error inserting building: ' + error);
                    }
                });
            }
        });

        // REFRESH BUILDINGS
        $("#btn_building_refresh").on('click', function(){
            load_buildings(dma_id);
        });

        // RASTER DATA
            // function load_rasterdata(dma_id){
            //     var path = 'raster_data/'+dma_id+'/{z}/{x}/{y}.png';
            //     console.log(path);
            //     if(raster_data){
            //         raster_data.remove();
            //         controlLayers.removeLayer(raster_data);
            //     }
            //     raster_data = L.tileLayer(path, {
            //         tms: true,
            //         opacity: 1,
            //         maxZoom: 22,
            //         minZoom: 12,
            //         attribution: ""
            //     });
            //     controlLayers.addOverlay(raster_data, 'Drone Image');
            // }


        // GENERAL FUNCTIONS
            function returnLayerByAttribute(table, field, value, callback) {
                $.ajax({
                    url: "find_data.php",
                    data: {table:table, field:field, value:value},
                    type: "POST",
                    success: function(response){
                        if (response.trim().substr(0,5) == 'ERROR') {
                            console.log(response);
                            callback(false);
                        } else {
                            var jsn = JSON.parse(response);
                            var layer = L.geoJSON(jsn);
                            var layers = layer.getLayers();
                            if (layers.length > 0) {
                                callback(layers[0]);
                            } else {
                                callback(false);
                            }
                        }
                    },
                    error:function(xhr, status, error){
                        console.log("Error loading data: " + error);
                        callback(null);
                    }
                });
            }
            
            function returnFormData(inpClass) {
                var objFromData = {};
                $("."+inpClass).each(function(){
                    objFromData[this.name] = this.value;
                });

                return objFromData;
            }


    </script>
</body>
</html>
