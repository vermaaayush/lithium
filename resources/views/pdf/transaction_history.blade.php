<!DOCTYPE html>
<html>
<head>
    <title>Transaction History</title>
</head>
<body>
    <h1>Transaction History</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <!-- Add more columns as needed -->
            </tr>
        </thead>
        <tbody>
            @foreach($data as $data)
            <tr>

                <td class="border-b border-[#E6E6E6] dark:border-[#ffffff1a] text-[13px] py-[0.625rem] px-5 font-normal whitespace-nowrap">{{ $data->subject }}</td>
                <td class="border-b border-[#E6E6E6] dark:border-[#ffffff1a] text-[13px] py-[0.625rem] px-5 font-normal whitespace-nowrap">{{ $data->name }}</td>
                <td class="border-b border-[#E6E6E6] dark:border-[#ffffff1a] text-[13px] py-[0.625rem] px-5 font-normal whitespace-nowrap">${{ number_format($data->amount) }}</td>
                <td class="border-b border-[#E6E6E6] dark:border-[#ffffff1a] text-[13px] py-[0.625rem] px-5 font-normal whitespace-nowrap">
                    {{ $data->created_at }}
                </td>
                @if ($data->status == 'Debit')
                <td class="border-b border-[#E6E6E6] dark:border-[#ffffff1a] text-[13px] py-[0.625rem] px-5 font-normal whitespace-nowrap">
                    <span class="text-xs py-[5px] px-3 rounded leading-[1.5] inline-block text-danger bg-danger-light">DEBIT</span>
                </td>

                @else

              
                <td class="border-b border-[#E6E6E6] dark:border-[#ffffff1a] text-[13px] py-[0.625rem] px-5 font-normal whitespace-nowrap">
                    <span class="text-xs py-[5px] px-3 rounded leading-[1.5] inline-block text-success bg-success-light dark:text-white dark:bg-[#3a9b941a]">CREDIT</span>
                </td>
                @endif
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
