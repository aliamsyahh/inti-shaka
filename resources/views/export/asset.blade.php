<table width="100%">
    <thead>
        <tr>
            <th>Asset Code</th>
            <th>Asset Name</th>
            <th>Asset Description</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($assets as $data)
            <tr>
                <td>{{ $data->code }}</td>
                <td>{{ $data->name }}</td>
                <td width="20%">{{ $data->description }}</td>
                <td>{{ $data->is_active }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
