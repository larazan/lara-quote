<section aria-labelledby="billing_settings_heading" >
    <div class="shadow sm:rounded-md sm:overflow-hidden">
        <div class="bg-white py-6 px-4 space-y-6 sm:p-6">
            <div>
                <h2 id="billing_settings_heading" class="text-lg leading-6 font-medium text-gray-900">
                    Billing
                </h2>
                <p class="mt-1 text-sm leading-5 text-gray-500">
                    Update the password used for logging into your account.
                </p>
            </div>
            <div class="">
                <div class="overflow-hidden w-full border-b border-gray-200">
                    <table class="min-w-full">
                        <thead class="bg-gray-200">
                            <th>
                                <td>Date</td>
                                <td>Total</td>
                                <td>Action</td>
                            </th>
                        </thead>
                        <tbody class="divide-y divide-gray-200 divide-solid">
                            @foreach($invoices as $invoice)
                            <tr>
                                <td>{{ $invoice->date()->toFormattedDateString() }}</td>
                                <td>{{ $invoice->total() }}</td>
                                <td>
                                    <a href="{{ route('download', $invoice->id) }}" target="_blank">Download</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        
    </div>
</section>