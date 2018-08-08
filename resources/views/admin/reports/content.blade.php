<table class="table">
    <thead>
        <th class="w-5">{{ __('Num.') }}</th>
        <th class="w-15">{{ __('Type') }}</th>
        <th class="w-25">{{ __('Content') }}</th>
        <th class="w-15">{{ __('Product Name') }}</th>
        <th class="w-15">{{ __('User Email') }}</th>
        <th class="w-10"></th>
    </thead>
    <tbody>
        @php($i = --$page * config('database.paginate') + 1)
        @forelse($reports as $report)
            <tr class="{{ $i % 2 == 0 ? 'table-warning' : 'table-primary' }}">
                <td>{{ $i++ }}</td>
                <td>{{ __(config('message.type.' . $report->type)) }}</td>
                <td>{{ $report->content }}</td>
                <td><a class="text-danger" href="{{ route('client.products.show', ['id' => $report->product_id]) }}" target="_blank">{{ $report->product->name }}</a></td>
                <td>{{ $report->user->email }}</td>
                <td>
                    <button onclick="destroy('{{ route('admin.reports.destroy') }}', {{ $report->id }})" class="btn btn-danger">{{ __('Delete') }}</button>
                </td>
            </tr>
        @empty
            <tr class="table-primary">
                <td colspan="6" class="text-center">{{ __('No Data') }}</td>
            </tr>
        @endforelse
    </tbody>
</table>

<div class="paginate">
    {{ $reports->links() }}
</div>

@section('js')
    <script src="{{ asset('js/destroy.js') }}"></script>
@endsection