<table>
    <thead/>
    <tbody>
    <tr>
        <td> &nbsp;</td>
        <td>{{ $address->name }}</td>
    </tr>
    <tr>
        <th scope="row"></th>
        <td>{{ $address->country->name }}
            , {{ $address->postcode }}
            , {{ $address->city }} {{ $address->street }} {{ $address->house }}</td>
    </tr>
    <tr>
        <th scope="row"></th>
        <td><span
                    class="fw-bold">Tel:</span> {{ $address->phone }}
        </td>
    </tr>
    <tr>
        <th scope="row"></th>
        <td><span
                    class="fw-bold">Note:</span> {{ $address->note ?? 'None' }}
        </td>
    </tr>
    </tbody>
</table>
