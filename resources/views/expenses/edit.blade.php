<x-layout>
    <div class="container">
        <div class="row">
            <div class="edit-expense-container">
                <div class="card">
                    <div class="card-header">Edit Expense</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('expenses.update', $expense->id) }}">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label for="amount">Amount:</label>
                                <input type="number" step="0.01" min="0" class="form-control" id="amount" name="amount" value="{{ old('amount', $expense->amount) }}" required>
                            </div>

                            <div class="form-group">
                                <label for="description">Description:</label>
                                <textarea class="form-control" id="description" name="description" rows="3" required>{{ old('description', $expense->description) }}</textarea>
                            </div>

                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>