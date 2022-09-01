@include('admin.includes.header');
@include('admin.includes.aside');

  <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <h1 style="text-align: center;">Users Profile</h1>
          </div>
        </div>
      </div>
    </section>


    <section class="content">
      <div class="container-fluid">
        <div class="row" style="display: flex; justify-content: center;">
          <div class="col-md-8">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  @if($customer_data->profile_photo_path && $customer_data->profile_photo_path != '')
                    <img class="profile-user-img img-fluid img-circle" src="{{asset('assets/img/profile/').'/'.$customer_data->profile_photo_path}}" alt="User profile picture">
                    @else
                    <img class="profile-user-img img-fluid img-circle img_custom" src="{{asset('assets/img/profile/default/default.png')}}" />
                  @endif
                </div>
                <h3 class="profile-username text-center">{{$customer_data->first_name." ".$customer_data->last_name}}</h3>
                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>User ID: </b> <a class="float-right">{{$customer_data->id}}</a>
                  </li>
                  <li class="list-group-item">
                    <b>Email Address: </b> <a class="float-right">{{$customer_data->email}}</a>
                  </li>
                  <li class="list-group-item">
                    <b>Status: </b> <a class="float-right">
                      @if($customer_data->status == 1)
                        <img src="{{asset('assets/img/images/tick.png')}}" title="Active" style="width: 26px;" />
                        @else
                        <img src="{{asset('assets/img/images/cross.png')}}" title="In-Active" style="width: 26px;" />
                      @endif
                    </a>
                  </li>
                  <li class="list-group-item">
                    <b>Date of Birth: </b> <a class="float-right">{{date("d F, Y", strtotime($customer_data->dob))}}</a>
                  </li>
                  <li class="list-group-item">
                    <b>Zip Code: </b> <a class="float-right">{{$customer_data->zip_code}}</a>
                  </li>

                  <li class="list-group-item">
                    <b>Redit Link: </b> <a class="float-right">{{$customer_data->redit_link}}</a>
                  </li>
                  <li class="list-group-item">
                    <b>Discord Link: </b> <a class="float-right">{{$customer_data->discord_link}}</a>
                  </li>
                  
                </ul>

              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

  </div>
@include('admin.includes.footer');