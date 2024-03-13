<x-layout>
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">Expense List</div>

                    <div class="card-body">
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
                                    <td>{{ $expense->amount }}</td>
                                    <td>{{ $expense->description }}</td>
                                    <td>{{ $expense->status }}</td>
                                    <td class="actions-column">
                                        @if (auth()->user()->id === $expense->user_id)
                                            <a href="{{ route('expenses.edit', $expense->id) }}" class="btn btn-edit">Edit</a>
                                        @endif
                                        @if (auth()->user()->role === 'admin' && $expense->status === 'pending')
                                            <div class="btn-group">
                                                <form action="{{ route('expenses.approve', $expense->id) }}" method="POST">
                                                    @csrf
                                                    <button type="submit" class="approve-button">Approve</button>
                                                </form>
                                                <form action="{{ route('expenses.deny', $expense->id) }}" method="POST">
                                                    @csrf
                                                    <button type="submit" class="deny-button">Deny</button>
                                                </form>
                                            </div>
                                        @endif
                                        @if (auth()->user()->role === 'admin' && $expense->status !== 'pending')
                                            <form action="{{ route('expenses.revert', $expense->id) }}" method="POST">
                                                @csrf
                                                <button type="submit" class="btn btn-revert">Revert</button>
                                            </form>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>