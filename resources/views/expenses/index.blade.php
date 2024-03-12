<x-layout>

<table class="expenses-table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Amount</th>
            <th>Description</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($expenses as $expense)
        <tr>
            <td>{{ $expense->id }}</td>
            <td>{{ $expense->name }}</td>
            <td>${{ $expense->amount }}</td>
            <td>{{ $expense->description }}</td>
            <td>{{ $expense->status }}</td>
            <td class="actions-column">
                @if (auth()->user()->role === 'admin')
                    <form action="{{ route('expenses.approve', $expense) }}" method="POST">
                        @csrf
                        <button type="submit" class="approve-button">Approve</button>
                    </form>
                    <form action="{{ route('expenses.deny', $expense) }}" method="POST">
                        @csrf
                        <button type="submit" class="deny-button">Deny</button>
                    </form>
                @endif
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

</x-layout>