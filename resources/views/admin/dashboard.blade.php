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
                                  <span class="font-large-2 text-bold-300 danger float-right" id="total_account">0</span>
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
                                  <span class="font-large-2 text-bold-200 success float-right"  id="total_deposite" style="font-size: 12px">0</span>
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
            <h4 class="card-title text-success">Withdrawal</h4>
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
              <h4 class="card-title text-primary">Last 10 Transactions</h4>
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
              <h4 class="card-title text-success">Top Investers</h4>
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
            <h4 class="card-title text-warning">Recent Orders</h4>
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
</div>
      </div>
      </div>
    </div>
  </div>
  <!-- ////////////////////////////////////////////////////////////////////////////-->
  <script>
    // Fetch data from API using fetch API
    fetch('http://127.0.0.1:8000/api_dashboard')
        .then(response => response.json())
        .then(data => {
          
                document.getElementById('total_account').innerHTML = `${data.totalUsers.toLocaleString()}`;
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