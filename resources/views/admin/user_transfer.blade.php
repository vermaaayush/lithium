@extends('admin.layout.main')
@section('title', 'All Deposits')
@section('main-container')
<div class="app-content content">
    <div class="content-wrapper">
      
      <div class="content-detached content-right">
       
  <div class="col-12">
    <!-- resources/views/user/index.blade.php -->


      <div class="card" >
          <div class="card-head">
              <div class="card-header">
                  <h4 class="card-title">User Transfer</h4>
                  <a class="heading-elements-toggle"><i class="ft-ellipsis-h font-medium-3"></i></a>
                  <div class="heading-elements">
                      
                   
                     
                  </div>
              </div>
          </div>
          <div class="card-content">
              <div class="card-body">
                  <!-- Task List table -->
                  <div class="table-responsive" style="padding-bottom:100px ">
                      <table id="users-contacts" class="table table-white-space table-bordered row-grouping display no-wrap icheck table-middle">
                          <thead>
                              <tr>
                                 
                                  <th>Sender ID</th>
                                  <th>Receiver ID</th>
                                  <th>Receiver Email</th>
                                  <th>Amount</th>
                                  <th>Transaction</th>
                                  <th>Date/Time</th>
                                  
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
</section>
        </div>
      </div>

    </div>
  </div>


  <script>
    const appUrl = '{{ env('APP_URL') }}';
</script>
  <script>
    // Fetch data from API using fetch API
    fetch(appUrl+'/api_user_transfer')
        .then(response => response.json())
        .then(data => {
            const tbody = document.querySelector('#users-contacts tbody');
            tbody.innerHTML = ''; // Clear existing table rows

            data.forEach(transfer => {
                const newRow = `
                    <tr>
                        <td>${transfer.user_id}</td>
                        <td>${transfer.receiver_user_id}</td>
                        <td>${transfer.receiver_email}</td>
                        <td>$${transfer.amount}</td>
                        <td>${transfer.transaction_id}</td>
                        <td>${new Date(transfer.created_at).toLocaleString()}</td>
                    </tr>
                `;
                tbody.insertAdjacentHTML('beforeend', newRow);
            });
        })
        .catch(error => console.error('Error fetching data:', error));
</script>

@endsection