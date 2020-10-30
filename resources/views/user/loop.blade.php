
@foreach ($record as $item)
<tr>
    <td>{{ $loop->iteration }}</td>
    <td>
        <img src="{{ url('assets/img') .'/'. $item->photo }}" class="rounded mx-auto d-block" width="60">
    </td>
    <td>{{ $item->name }}</td>
    <td>{{ $item->username }}</td>
    <td> <a href="mailto:{{ $item->email }}" target="_blank">{{ $item->email }}</a></td>
    <td>{{ $item->last_login }}</td>
    <td>
        @php
            $parameter= Crypt::encryptString($item->id);
        @endphp
        <a href="/user/detail_user/{{ $parameter }}" class="to-action text-primary text-decoration-none btn-sm detail-user "><i class="fas fa-edit"></i> </a>
        <a class="to-action text-danger btn-sm delete-user"onclick="deleteUser('{{ $item->id }}')"><i class="fas fa-trash"></i> </a>
    </td>
</tr>
<script src="{{ url('modjs/Main.js') }}"></script>
@endforeach