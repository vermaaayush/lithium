@php

    use App\Models\Plan;
    use App\Models\Stock;
    use Carbon\Carbon; 
@endphp
@extends('user.layout.main')
@section('title', 'Portfolio')
@section('main-container')

<div class="w-full" style="padding: 0% 3% 0% 3%">
    <div class="card">
        <div class="card-body p-0">
            <div class="overflow-x-auto active-projects task-table dz-scroll">
                <div class="p-5">
                    <h2>Portfolio</h2>
                </div>
                <table  class="table  w-full">
                  
                    <tbody id="portfolio-table">
                        <!-- Table rows will be dynamically populated by JavaScript -->
                        <tr></tr>
                    </tbody>
                </table>

                <script>
                    const appUrl = '{{ env('APP_URL') }}';
                </script>
                <script>
                    document.addEventListener('DOMContentLoaded', async () => {
    const apiUrl = appUrl+'/api_portfolio';
    const tbody = document.querySelector('#portfolio-table');

    // Define a function to fetch and update data
    const fetchDataAndUpdate = async () => {
        try {
            const response = await fetch(apiUrl);
            const data = await response.json();
            // console.log(data);
            tbody.innerHTML = '';

            data.investments.forEach(async (investment) => {
                const {cp_value, stock_value, t_investment, plan_name, investment_id, img } = investment;

        
                
                // Create table row
                let newRowHTML = `
    <tr id="row-${investment_id}">
        <td class="border-b border-[#E6E6E6] dark:border-[#ffffff1a] text-[13px] py-[0.625rem] px-5 font-normal whitespace-nowrap">
            <div class="flex">
                <img src="${img}" class="inline-block w-9 min-w-[40px] h-9 rounded-md relative object-cover" alt="">
                <div>
                    <h6 class="text-base">${plan_name}</h6>
                    <span class="text-[13px] font-normal text-body-color dark:text-white">ID-${investment_id}</span>
                </div>	
            </div>
        </td>
        <td class="border-b border-[#E6E6E6] dark:border-[#ffffff1a] text-[15px] py-[0.625rem] px-5 font-normal whitespace-nowrap">
            <span style="float: right" class="text-[13px] font-normal text-body-color dark:text-white"><strong>Total Invested: </strong>$${t_investment}</span> <br>
            <span id="xxx" style="float: right; color: green;" class="text-[15px] font-normal text-body-color dark:text-white"><strong style="color: green;">Current Price: $<span id="profit_amount">${cp_value}</span></strong></span>
`;



newRowHTML += `
        </td>
    </tr>
`;

                // Append row to table
                tbody.insertAdjacentHTML('beforeend', newRowHTML);
            });
        } catch (error) {
            console.error('Error fetching or updating data:', error);
        }
    };

    // Call fetchDataAndUpdate initially
    fetchDataAndUpdate();

    // Call fetchDataAndUpdate every 2 seconds (2000 milliseconds)
    setInterval(fetchDataAndUpdate, 3000);
});

                </script>



                
            </div>
        </div>
    </div>
</div>




@endsection