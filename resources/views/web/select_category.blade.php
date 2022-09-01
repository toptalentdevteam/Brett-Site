@include('web.includes.header');
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<style type="text/css">
    .stripe_container, .if_payment_plan_amount_is_free {
      display: none;
    }
    .container {
        margin-top: 40px;
    }
    .panel-heading {
    display: inline;
    font-weight: bold;
    }
    .flex-table {
        display: table;
    }
    .display-tr {
        display: table-row;
    }
    .display-td {
        display: table-cell;
        vertical-align: middle;
        width: 55%;
    }
    .from-ordd:hover {
    background: #306F29;
    color: #FFF; 
  }
</style>

<form action="{{ route('buyPlanProcess') }}" method="post" class="validation" enctype="multipart/form-data" id="payment-form" data-cc-on-file="false">
@csrf
<div class="container">
  <div class="Rtunin">
    <h3 class="ppp" style="color: #FFF;">Please Choose Business Category First</h3>
    <div class="row" style="justify-content: center;">

      <div class="col-sm-4">
        <a href="{{url('businessProfile/doctor')}}" style="color: #306F29">
          <div class="order-rdit" style="border: 2px solid #306F29; border-radius: 8px;">
            <div class="from-ordd">
                <h2 class="text-center">DOCTOR</h2>
            </div>
          </div>
        </a>
      </div>

      <div class="col-sm-4">
        <a href="{{url('businessProfile/dispensary')}}" style="color: #306F29">
          <div class="order-rdit" style="border: 2px solid #306F29; border-radius: 8px;">
            <div class="from-ordd">
                <h2 class="text-center">DISPENSARY</h2>
            </div>
          </div>
        </a>
      </div>

      <div class="col-sm-4">
        <a href="{{url('businessProfile/delivery')}}" style="color: #306F29">
          <div class="order-rdit" style="border: 2px solid #306F29; border-radius: 8px;">
            <div class="from-ordd">
                <h2 class="text-center">DELIVERY SERVICE</h2>
            </div>
          </div>
        </a>
      </div>

    </div>
   </div>
</div>

</div>

<form>


@include('web.includes.footer');