@include('admin.includes.header');
@include('admin.includes.aside');
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <!-- <h1 class="m-0">Add Customer</h1> -->
          </div>
          
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Add New Banner</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              


                <div id="accordion">
                  
                  <div class="card" style="width: 96%;margin:20px 0 0 20px;">
                    
                    <div class="card-header">
                      <h5 class="mb-0"  data-toggle="collapse" data-target="#collapseOne">
                        <button class="btn btn-link" type="button">
                          Add Website Banner
                        </button>
                      </h5>
                    </div>

                    <div id="collapseOne" class="collapse show">
                            <form action="{{ route('admin_banner_add_process') }}" method="post" enctype="multipart/form-data">
                              @csrf
                              <div class="card-body">
                                <div class="row">
                                    
                                  <div class="col-4">
                                    <div class="form-group">
                                      <label for="name">Select Location</label>
                                      <input type="text" class="form-control" id="name_location" name="name" placeholder="Location Name" autocomplete="off" value="{{ old('name') }}" required>
                                      @error('name')
                                          <span class="text-danger">{{ $message }}</span>
                                      @enderror
                                    </div>
                                  </div>

                                    <div class="col-4">
                                      <div class="form-group">
                                        <label for="banner_location">Banner Location</label>
                                        <select class="form-control" id="banner_location" name="banner_location" required>
                                          <option value="">Select Banner Location</option>
                                          <option value="user_profile">User Profile page</option>
                                          <option value="map_page">Map Layout Pages</option>
                                        </select>
                                        @error('banner_location')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                      </div>
                                    </div>

                                    <div class="col-4">
                                      <div class="form-group">
                                        <label for="url">Redirect URL</label>
                                        <input type="text" class="form-control" id="url" name="url" placeholder="Banner Redirect Url" autocomplete="off" value="{{ old('url') }}" >
                                      </div>
                                    </div>

                                    <div class="col-4">
                                      <div class="form-group">
                                        <label for="c_image">Banner Image</label>
                                        <input type="file" class="form-control" id="c_image" name="c_image" required>
                                        @error('c_image')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                      </div>
                                    </div>
                                </div>
                                <a href="{{ route('admin_advertiements') }}"><button type="button" class="btn btn-warning">Back</button></a>
                                <button type="submit" class="btn btn-primary">Add Website Banner</button>
                              </div>
                              <input type="hidden" name="lat" id="lat">
                              <input type="hidden" name="lng" id="lng">
                          </form>
                    </div>

                  </div>
                  <?php
                  $data = \App\Http\Controllers\web\Home::portalSettings();
                  if( isset($data[0]->google_api_key) ) {?>
                    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&libraries=places&key=<?php echo $data[0]->google_api_key;?>"></script>
                  <?php
                  }
                  ?>
                   <script type="text/javascript">
                    function initialize(access_from) {
                      const options = {
                        fields: ["formatted_address", "geometry", "name"],
                        strictBounds: false,
                        types: ["address"],
                        // []
                        // ["address"]
                        // ["establishment"]
                        // ["geocode"]
                        // ["(cities)"]
                        // ["(regions)"]
                      }

                      var input = document.getElementById("name_location");
                      var autocomplete = new google.maps.places.Autocomplete(input,options);
                      google.maps.event.addListener(autocomplete, 'place_changed', function () {
                        var place = autocomplete.getPlace();
                        document.getElementById('lat').value = place.geometry.location.lat();
                        document.getElementById('lng').value = place.geometry.location.lng();
                      });
                      }
                      initialize("home");
                      </script>

                  <?php
                  /*
                  <div class="card" style="width: 96%;margin:20px 0 30px 20px;">

                    <div class="card-header">
                      <h5 class="mb-0" data-toggle="collapse" data-target="#collapseTwo">
                        <button class="btn btn-link collapsed">
                          Embed 3rd Party Code
                        </button>
                      </h5>
                    </div>

                    <div id="collapseTwo" class="collapse">
                      <div class="card-body">
                          <form action="{{ route('admin_banner_add_process') }}" method="post" enctype="multipart/form-data">
                              @csrf
                              <input type="hidden" name="embed_code" value="embed_code">
                              <div class="card-body">
                                <div class="row">
                                    
                                    <div class="col-4">
                                      <div class="form-group">
                                        <label for="banner_location">Banner Location</label>
                                        <select class="form-control" id="banner_location" name="banner_location" required>
                                          <option value="">Select Banner Location</option>
                                          <option value="header">Page Header</option>
                                          <option value="footer">Page Footer</option>
                                          <option value="body">Page Body</option>
                                          <option value="user_profile">User Profile page</option>
                                          <option value="sidebar">SideBar</option>
                                        </select>
                                        @error('banner_location')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                      </div>
                                    </div>

                                    <div class="col-4">
                                      <div class="form-group">
                                        <label for="embed_code">Third Party Embed Code Here</label>
                                        <textarea class="form-control" id="embed_code" name="embed_code" required></textarea>
                                        @error('embed_code')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                      </div>
                                    </div>

                                </div>
                                <a href="{{ route('admin_advertiements') }}"><button type="button" class="btn btn-warning">Back</button></a>
                                <button type="submit" class="btn btn-primary">Add Website Banner</button>
                              </div>
                          </form>
                      </div>
                    </div>
                  </div>
                  */
                  ?>

                </div>
            <!-- /.card -->


          </div>
         
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
  </div>
@include('admin.includes.footer');