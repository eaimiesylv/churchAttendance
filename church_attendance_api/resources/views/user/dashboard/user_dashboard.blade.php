@extends('layouts.user_admin')
<style>
.icon-container {
  display: flex;
  align-items: center;
  justify-content: center;
  height: 100%;
  margin-right: 10px;
  
}
.content-title {
  margin-bottom: 5px;
}

.content-description {
  margin-top: 5px;
}
.mb{
  margin-bottom: 1em
}
@media (max-width: 576px) { /* Adjust the breakpoint as needed */
  .content-description {
    margin-top: 3em; /* Increase the margin-top value for smaller screens */
  }
}
h5,h6{
   color:orange !important
}
</style>
@section('content')
 
  <div class="row">
    <div class="col-lg-3 col-md-4 col-sm-6 mb">
      <div class="d-flex align-items-center">
        <div class="icon-container">
          <i class="fa fa-user"></i>
        </div>
        <div class="content">
          <h6 class="content-title">Register Member</h6>
          <p class="content-description">500</p>
        </div>
      </div>
    </div>
    <div class="col-lg-3 col-md-4 col-sm-6 mb">
      <div class="d-flex align-items-center">
        <div class="icon-container">
          <i class="fa fa-envelope"></i>
        </div>
        <div class="content">
          <h6 class="content-title">First Timer</h6>
          <p class="content-description">30</p>
        </div>
      </div>
    </div>
	 <div class="col-lg-3 col-md-4 col-sm-6 mb">
      <div class="d-flex align-items-center">
        <div class="icon-container">
          <i class="fa fa-envelope"></i>
        </div>
        <div class="content">
          <h6 class="content-title">Cell Unit</h6>
          <p class="content-description">30</p>
        </div>
      </div>
    </div>
	 <div class="col-lg-3 col-md-4 col-sm-6 mb">
      <div class="d-flex align-items-center">
        <div class="icon-container">
          <i class="fa fa-envelope"></i>
        </div>
        <div class="content">
          <h6 class="content-title">Zone</h6>
          <p class="content-description">30</p>
        </div>
      </div>
    </div>


    <div class="col-lg-3 col-md-4 col-sm-6 mb">
      <div class="d-flex align-items-center">
        <div class="icon-container">
          <i class="fa fa-user"></i>
        </div>
        <div class="content">
          <h6 class="content-title">District</h6>
          <p class="content-description">500</p>
        </div>
      </div>
    </div>
    <div class="col-lg-3 col-md-4 col-sm-6">
      <div class="d-flex align-items-center">
        <div class="icon-container">
          <i class="fa fa-envelope"></i>
        </div>
        <div class="content">
          <h6 class="content-title">Service Unit</h6>
          <p class="content-description">30</p>
        </div>
      </div>
    </div>
	 <div class="col-lg-3 col-md-4 col-sm-6 mb">
      <div class="d-flex align-items-center">
        <div class="icon-container">
          <i class="fa fa-envelope"></i>
        </div>
        <div class="content">
          <h6 class="content-title">Water Baptism</h6>
          <p class="content-description">30</p>
        </div>
      </div>
    </div>
	 <div class="col-lg-3 col-md-4 col-sm-6 mb">
      <div class="d-flex align-items-center">
        <div class="icon-container">
          <i class="fa fa-envelope"></i>
        </div>
        <div class="content">
          <h6 class="content-title">Believer Foundation</h6>
          <p class="content-description">30</p>
        </div>
      </div>
    </div>
	
    <div class="col-lg-3 col-md-4 col-sm-6 mb">
      <div class="d-flex align-items-center">
        <div class="icon-container">
          <i class="fa fa-envelope"></i>
        </div>
        <div class="content">
          <h6 class="content-title">Birthday Celebrate</h6>
          <p class="content-description">30</p>
        </div>
      </div>
    </div>
	
   
  </div>

<div class="row" style="margin-top:2em">
 
  <div class="col-lg-12 col-md-12 col-sm-12 mb">
    <div class="table-responsive">
    <h5>Sunday Service Attendance</h5>
      <table class="table">
        <thead>
          <tr>
            <th>SN</th>
          
            <th>M</th>
            <th>F</th>
            <th>Children</th>
            <th>Total</th>
            <th>Submitted By</th>
          </tr>
        </thead>
        <tr>
            <td>1</td>
           
            <td>3</td>
            <td>4</td>
            <td>5</td>
            <td>14</td>
            <td>Emmanuel</td>
          </tr>
        <tbody>
          <!-- Table 1 data rows go here -->
        </tbody>
      </table>
    </div>
  </div>
  
  <div class="col-lg-12 col-md-12 col-sm-12 mb">
 
    <div class="table-responsive">
    <h5 style="color:orange">MidWeek Service Attendance</h5>
      <table class="table">
        <thead>
          <tr>
            <th>SN</th>
            <th>M</th>
            <th>F</th>
            <th>Children</th>
            <th>Total</th>
            <th>Submitted By</th>
          </tr>
        </thead>
        <tr>
            <td>1</td>
            
            <td>3</td>
            <td>4</td>
            <td>5</td>
            <td>14</td>
            <td>Emmanuel</td>
          </tr>
        <tbody>
          <!-- Table 2 data rows go here -->
        </tbody>
      </table>
    </div>
  </div>
  <div class="col-lg-12 col-md-12 col-sm-12 mb">
    <div class="table-responsive">
    <h5>Cell Meeting Attendance</h5>
      <table class="table">
        <thead>
          <tr>
            <th>SN</th>
            <th>Cell Name</th>
            <th>M</th>
            <th>F</th>
            <th>Children</th>
            <th>Total</th>
            <th>Submitted By</th>
          </tr>
        </thead>
        <tr>
            <td>1</td>
            <td>Zion</td>
            <td>3</td>
            <td>4</td>
            <td>5</td>
            <td>14</td>
            <td>Emmanuel</td>
          </tr>
        <tbody>
          <!-- Table 1 data rows go here -->
        </tbody>
      </table>
    </div>
  </div>
</div>








@endsection
