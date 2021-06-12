<table class="table-responsive table-bordered">
    <thead>
    <tr>
        <th scope="col" class="p-3">Role name</th>
        <th scope="col" class="p-3">Abilities</th>
    </tr>
    </thead>
    <tbody>
    @forelse($roles as $role)
        <tr>
            <th scope="row">{{ $role->title }}</th>
            <td>
                <ul class="m-3">
                    @forelse($role->abilities as $ability)
                        <li>{{ $ability->title }}</li>
                    @empty
                        <li>Nothing</li>
                    @endforelse
                </ul>
            </td>
        </tr>
    @empty
        <tr>
            <th scope="row" colspan="2">
                <div class="text-center">
                    Nothing
                </div>
            </th>
        </tr>
    @endforelse
    </tbody>
</table>
