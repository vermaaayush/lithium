@extends('admin.layout.main')
@section('title', 'Dashboard')
@section('main-container')
<div class="app-content content">
    <div class="content-wrapper">
      <div class="content-header row">
      </div>
      <div class="content-body"><!-- Sales stats -->
<div class="row">
  <div class="col-12">
      <div class="card">
          <div class="card-content">
              <div class="card-body">
                  <div class="row">
                     
                      <div class="col-lg-3 col-sm-12 border-right-blue-grey border-right-lighten-5">
                          <div class="pb-1">
                              <div class="clearfix mb-1">
                                  <i class="icon-user font-large-1 blue-grey float-left mt-1"></i>
                                  <span class="font-large-2 text-bold-300 danger float-right" id="total_account">423</span>
                              </div>
                              <div class="clearfix">
                                  <span class="text-muted">Total Accounts</span>
                                  
                              </div>
                          </div>
                          <div class="progress mb-0" style="height: 7px;">
                              <div class="progress-bar bg-danger" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                          </div>
                      </div>
                      <div class="col-lg-3 col-sm-12 border-right-blue-grey border-right-lighten-5">
                          <div class="pb-1">
                              <div class="clearfix mb-1">
                                  <i class="icon-shuffle font-large-1 blue-grey float-left mt-1"></i>
                                  <span class="font-large-2 text-bold-300 success float-right"  id="total_deposite">0</span>
                              </div>
                              <div class="clearfix">
                                  <span class="text-muted">Total Deposite</span>

                              </div>
                          </div>
                          <div class="progress mb-0" style="height: 7px;">
                              <div class="progress-bar bg-success" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                          </div>
                      </div>
                      <div class="col-lg-3 col-sm-12">
                          <div class="pb-1">
                              <div class="clearfix mb-1">
                                  <i class="icon-wallet font-large-1 blue-grey float-left mt-1"></i>
                                  <span class="font-large-2 text-bold-300 warning float-right" id="today_deposite">0</span>
                              </div>
                              <div class="clearfix">
                                  <span class="text-muted">Today Deposite</span>

                              </div>
                          </div>
                          <div class="progress mb-0" style="height: 7px;">
                              <div class="progress-bar bg-warning" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                          </div>
                      </div>
                      <div class="col-lg-3 col-sm-12 border-right-blue-grey border-right-lighten-5">
                        <div class="pb-1">
                            <div class="clearfix mb-1">
                                <i class="icon-star font-large-1 blue-grey float-left mt-1"></i>
                                <span class="font-large-2 text-bold-300 info float-right"  id="total_withraw">0</span>
                            </div>
                            <div class="clearfix">
                                <span class="text-muted">Total Withrawals</span>
                                
                            </div>
                        </div>
                        <div class="progress mb-0" style="height: 7px;">
                            <div class="progress-bar bg-info" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
</div>
<!--/ Sales stats -->

<div class="row">
  
  <div class="col-xl-6 col-lg-12">
      <div class="card">
          <div class="card-header">
              <h4 class="card-title text-success">Deposite</h4>
              <a class="heading-elements-toggle"><i class="ft-more-horizontal font-medium-3"></i></a>
              <div class="heading-elements">
                  <ul class="list-inline mb-0">
                     
                      <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                  </ul>
              </div>
          </div>
          <div class="card-content">
             
              <div class="table-responsive">
                  <table id="deposite_table" class="table table-hover mb-0">
                      <thead>
                          <tr>
                              <th>User Id</th>
                              <th>Name</th>
                              <th>Amount</th>
                              <th>Transaction Id</th>
                              <th>Mode</th>
                          </tr>
                      </thead>
                      <tbody>
                        
                      </tbody>
                  </table>
              </div>
          </div>
      </div>
  </div>

  <div class="col-xl-6 col-lg-12">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Withdrawal</h4>
            <a class="heading-elements-toggle"><i class="ft-more-horizontal font-medium-3"></i></a>
            <div class="heading-elements">
                <ul class="list-inline mb-0">
                 
                    <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                </ul>
            </div>
        </div>
        <div class="card-content">
          
            <div class="table-responsive">
                <table id="withraw_table" class="table table-hover mb-0">
                    <thead>
                        <tr>
                            <th>User Id</th>
                            <th>Name</th>
                            <th>Amount</th>
                            <th>Transaction Id</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody>
                      
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- Sales by Campaigns & Year -->
<div class="row">
  <div class="col-xl-8 col-lg-12">
      <div class="card">
          <div class="card-header">
              <h4 class="card-title">Last 10 Transactions</h4>
              <br>
              <div class="table-responsive" style="padding-bottom:100px ">
                <table id="users-contacts" class="table table-white-space table-bordered row-grouping display no-wrap icheck table-middle">
                    <thead>
                        <tr>
                           
                            <th>User Id</th>
                            <th>Name</th>
                            <th>Subject</th>
                            <th>Amount</th>
                            <th>Status</th>
                           
                            
                        </tr>
                    </thead>
                    <tbody>
                     
                    </tbody>
                   
                </table>
            </div>
          </div>
         
      </div>
  </div>
  <div class="col-xl-4 col-lg-12">
      <div class="card">
          <div class="card-content">
              <div class="card-body sales-growth-chart">
                  <div id="mobile-sales" class="height-300"></div>
              </div>
          </div>
          <div class="card-footer">
              <div class="chart-title mb-1">
                  <span class="text-muted">Total mobile units sold and total earning statistics.</span>
              </div>
              <ul class="list-inline text-center clearfix mt-1">
                  <li class="mr-3"><span class="text-muted">Total Units Sold</span><h2 class="block">18.6 k</h2></li>
                  <li><span class="text-muted">Total Earnings</span><h2 class="block">64.54 M</h2></li>
              </ul>
          </div>
      </div>
  </div>
</div>
<!--/ Sales by Campaigns & Year -->

<!-- Recent Orders -->
<div class="row">
  
  <div class="col-xl-6 col-lg-12">
      <div class="card">
          <div class="card-header">
              <h4 class="card-title">Top Investers</h4>
              <a class="heading-elements-toggle"><i class="ft-more-horizontal font-medium-3"></i></a>
              <div class="heading-elements">
                  <ul class="list-inline mb-0">
                      
                      <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                  </ul>
              </div>
          </div>
          <div class="card-content">
            
              <div class="table-responsive">
                  <table id="top_investor" class="table table-hover mb-0">
                      <thead>
                          <tr>
                              <th>User Id</th>
                              <th>Name</th>
                              <th>Email</th>
                              <th>Total Deposite</th>
                              <th>Total Invested</th>
                          </tr>
                      </thead>
                      <tbody>
                        
                      </tbody>
                  </table>
              </div>
          </div>
      </div>
  </div>

  <div class="col-xl-6 col-lg-12">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Recent Orders</h4>
            <a class="heading-elements-toggle"><i class="ft-more-horizontal font-medium-3"></i></a>
            <div class="heading-elements">
                <ul class="list-inline mb-0">
                    <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                    <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                </ul>
            </div>
        </div>
        <div class="card-content">
            <div class="card-body">
                <p>Total paid invoices 240, unpaid 150. <span class="float-right"><a href="project-summary.html" target="_blank">Invoice Summary <i class="ft-arrow-right"></i></a></span></p>
            </div>
            <div class="table-responsive">
                <table id="recent-orders" class="table table-hover mb-0">
                    <thead>
                        <tr>
                            <th>SKU</th>
                            <th>Invoice#</th>
                            <th>Customer Name</th>
                            <th>Status</th>
                            <th>Amount</th>
                        </tr>
                    </thead>
                    <tbody>
                      
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div>
<!--/ Recent Orders -->
<!-- Map Based Selling -->
<div class="row">
  <div class="col-12">
      <div class="card box-shadow-0">
          <div class="card-content">
              <div class="row">
                  <div class="col-xl-8 col-lg-12">
                      <div id="world-map-markers" class="height-450"></div>
                  </div>
                  <div class="col-xl-4 col-lg-12">
                      <div class="card-body">
                          <h4 class="card-title py-1 text-center">Sales All Over The World</h4>
                          <div class="row">
                              <div class="col-xl-12 col-lg-4 col-sm-12">
                                  <div class="media">
                                      <div class="media-body">
                                          <span>Total Profit <i class="ft-arrow-up success"></i> <span class="teal accent-3">6.89%</span></span>
                                          <h2 class="mb-0">$47.8K</h2>
                                      </div>
                                      <div class="media-right media-top pr-2">
                                          <i class="ft-trending-up font-large-1"></i>
                                      </div>
                                  </div>
                                  <div id="map-total-profit" class="height-75"></div>
                              </div>
                              <div class="col-xl-12 col-lg-4 col-sm-12">
                                  <div class="media">
                                      <div class="media-body">
                                          <span>Total Orders <i class="ft-arrow-down deep-orange accent-3"></i> <span class="deep-orange accent-3">4.27%</span></span>
                                          <h2 class="mb-0">789</h2>
                                      </div>
                                      <div class="media-right media-top pr-2">
                                          <i class="ft-shopping-cart font-large-1"></i>
                                      </div>
                                  </div>
                                  <div id="map-total-orders" class="height-75"></div>
                              </div>
                              <div class="col-xl-12 col-lg-4 col-sm-12">
                                  <div class="sales pr-2">
                                      <div class="sales-today mb-1">
                                          <p class="m-0">Today <span class="sucess float-right"><i class="ft-arrow-up success"></i> 6.89%</span></p>
                                          <div class="progress mt-1 mb-0" style="height: 7px;">
                                              <div class="progress-bar bg-success" role="progressbar" style="width: 70%" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"></div>
                                          </div>
                                      </div>
                                      <div class="sales-yesterday">
                                          <p class="m-0">Yesterday <span class="deep-orange accent-2 float-right"><i class="ft-arrow-down deep-orange accent-3"></i> 4.18%</span></p>
                                          <div class="progress mt-1 mb-0" style="height: 7px;">
                                              <div class="progress-bar bg-deep-orange" role="progressbar" style="width: 60%" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
</div>
<!--/ Map Based Selling -->

<!-- social updates -->
<div class="row">
  <div class="col-xl-4 col-md-12 col-sm-12">
      <div class="card bg-twitter white">
          <div class="card-content p-2">
              <div class="card-body">
                  <div class="text-center mb-1">
                      <i class="ft-twitter font-large-3"></i>
                  </div>
                  <div class="tweet-slider">
                      <ul class="text-center">
                          <li>Congratulations to Rob Jones in accounting for winning our <span class="yellow">#NFL</span> football pool!</li>
                          <li>Contests are a great thing to partner on. Partnerships immediately <span class="yellow">#DOUBLE</span> the reach.</li>
                          <li>Puns, humor, and quotes are great content on <span class="yellow">#Twitter</span>. Find some related to your business.</li>
                          <li>Are there <span class="yellow">#common-sense</span> facts related to your business? Combine them with a great photo.</li>
                      </ul>
                  </div>
              </div>
          </div>
      </div>
  </div>

  <div class="col-xl-4 col-md-12 col-sm-12">
      <div class="card border-info text-center bg-transparent">
          <div class="card-content">
              <img src="app-assets/images/elements/07.png" alt="element 04" width="140" class="float-left mt-3">
              <div class="card-body pt-3">
                  <h4 class="mt-3">New Arriaval</h4>
                  <p class="card-text">Donut toffee candy brownie soufflé macaroon.</p>
                  <button class="btn btn-info">Buy Now</button>
              </div>
          </div>
      </div>
  </div>
  <div class="col-xl-4 col-md-12 col-sm-12">
      <div class="card bg-facebook white">
          <div class="card-content p-2">
              <div class="card-body">
                  <div class="text-center mb-1">
                      <i class="ft-facebook font-large-3"></i>
                  </div>
                  <div class="fb-post-slider">
                      <ul class="text-center">
                          <li>Congratulations to Rob Jones in accounting for winning our #NFL football pool!</li>
                          <li>Contests are a great thing to partner on. Partnerships immediately #DOUBLE the reach.</li>
                          <li>Puns, humor, and quotes are great content on #Twitter. Find some related to your business.</li>
                          <li>Are there #common-sense facts related to your business? Combine them with a great photo.</li>
                      </ul>
                  </div>
              </div>
          </div>
      </div>
  </div>
</div>
<!--/ social updates -->
<!-- most selling products -->
<div class="row">
  <div class="col-lg-4 col-md-12">
      <div class="card">
          <div class="card-content">
              <img class="card-img-top img-fluid" src="app-assets/images/carousel/25.jpg" alt="Card image cap">
              <div class="card-body">
                  <h4>Smart Wearable</h4>
                  <p class="card-text">Oat cake ice cream candy chocolate cake.</p>
              </div>
          </div>
          <div class="card-footer text-muted">
              <span class="float-left">$349</span>
              <span class="float-right">Add To Cart <i class="ft-shopping-cart"></i></span>
          </div>
      </div>
  </div>
  <div class="col-lg-4 col-md-12">
      <div class="card text-center">
          <div class="card-content">
              <img class="card-img-top img-fluid" src="app-assets/images/carousel/24.png" alt="Card image cap">
              <div class="card-body">
                  <h4>Formal Shoes</h4>
                  <p class="card-text">Some quick example text.</p>
                  <div class="btn-group" role="group" aria-label="Basic example">
                      <span class="btn btn-outline-grey">$159</span>
                      <button type="button" class="btn btn-outline-grey">Shop Now <i class="ft-shopping-cart"></i></button>
                  </div>
              </div>
          </div>
      </div>
  </div>
  <div class="col-lg-4 col-md-12">
      <div class="card">
          <div class="card-content">
              <img class="card-img-top img-fluid" src="app-assets/images/carousel/22.jpg" alt="Card image cap">
              <div class="card-body">
                  <h4>Sunglass</h4>
                  <p class="card-text">Some quick example text.</p>
              </div>
          </div>
          <div class="card-footer text-muted">
              <span class="float-left">
                  <del class="grey">$99</del>
                  <span class="ml-1">$49</span>
              </span>
              <span class="float-right"><i class="ft-heart"></i> Like</span>
          </div>
      </div>
  </div>
</div>
<!--/ most selling products-->

      </div>
    </div>
  </div>
  <!-- ////////////////////////////////////////////////////////////////////////////-->
  <script>
    // Fetch data from API using fetch API
    fetch('http://127.0.0.1:8000/api_dashboard')
        .then(response => response.json())
        .then(data => {
          
                document.getElementById('total_account').innerHTML = `$${data.totalUsers.toLocaleString()}`;
                document.getElementById('total_deposite').innerHTML = `$${data.totalDeposite.toLocaleString()}`;
                document.getElementById('today_deposite').innerHTML = `$${data.todayDeposite.toLocaleString()}`;
                document.getElementById('total_withraw').innerHTML = `$${data.withdrawalTotal.toLocaleString()}`;

                const topDepositsTable = document.getElementById('deposite_table');
            const topDepositsBody = topDepositsTable.getElementsByTagName('tbody')[0];
            topDepositsBody.innerHTML = ''; // Clear existing table rows

            data.top_depsoite.forEach(deposit => {
                const newRow = `
                    <tr>
                        
                        <td>${deposit.user_id}</td>
                        <td>${deposit.name}</td>
                        <td>${deposit.amount}</td>
                        <td>${deposit.transaction_id}</td>
                        <td>${deposit.pay_mode}</td>
                    </tr>
                `;
                topDepositsBody.insertAdjacentHTML('beforeend', newRow);
            });


            const topwithTable = document.getElementById('withraw_table');
            const topwithBody = topwithTable.getElementsByTagName('tbody')[0];
            topwithBody.innerHTML = ''; // Clear existing table rows

            data.top_withraw.forEach(withraw => {
                const newRow = `
                    <tr>
                        <td>${withraw.user_id}</td>
                        <td>${withraw.name}</td>
                        <td>${withraw.amount}</td>
                        <td>${withraw.transaction_id}</td>
                        
                        <td>${withraw.created_at}</td>
                    </tr>
                `;
                topwithBody.insertAdjacentHTML('beforeend', newRow);
            });

            const topinvestor = document.getElementById('top_investor');
            const topinvestorBody = topinvestor.getElementsByTagName('tbody')[0];
            topinvestorBody.innerHTML = ''; // Clear existing table rows

            data.usersWithTopDeposits.forEach(usersWithTopDeposits => {
                const newRow = `
                    <tr>
                        <td>${usersWithTopDeposits.user_id}</td>
                        <td>${usersWithTopDeposits.name}</td>
                        <td>${usersWithTopDeposits.email}</td>
                        <td>${usersWithTopDeposits.deposite}</td>
                        
                        <td>${usersWithTopDeposits.funded}</td>
                    </tr>
                `;
                topinvestorBody.insertAdjacentHTML('beforeend', newRow);
            });
    
        })
        .catch(error => console.error('Error fetching data:', error));
</script>

<script>
    // Fetch data from API using fetch API
    fetch('http://127.0.0.1:8000/api_history')
        .then(response => response.json())
        .then(data => {
            const tbody = document.querySelector('#users-contacts tbody');
            tbody.innerHTML = ''; // Clear existing table rows

            // Fetch only the latest 10 records
            const latestRecords = data.slice(0, 10);

            latestRecords.forEach(data => {
                const newRow = `
                    <tr>
                        <td>${data.user_id}</td>
                        <td>${data.name}</td>
                        <td>${data.subject}</td>
                        <td>${data.amount}</td>
                        <td style="color: ${data.status === 'Debit' ? 'red' : 'green'}">${data.status}</td>
                      
                    </tr>
                `;
                tbody.insertAdjacentHTML('beforeend', newRow);
            });
        })
        .catch(error => console.error('Error fetching data:', error));
</script>


  @endsection