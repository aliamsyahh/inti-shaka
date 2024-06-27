<table width="100%">
    <thead>
        <tr>
            <th>Asset Code</th>
            <th>Asset Name</th>
            <th>Asset Description</th>
            <th>Asset PIC</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($pics as $data)
            <tr>
                <td>{{ $data->asset->code }}</td>
                <td>{{ $data->asset->name }}</td>
                <td width="20%">{{ $data->asset->description }}</td>
                <td width="20%">{{ $data->pic }}</td>
                <td>{{ $data->is_active }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
