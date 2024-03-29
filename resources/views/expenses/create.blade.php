   <x-layout>
   
   <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Create Expense</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('expenses.store') }}">
                            @csrf

                            <div class="form-group">
                                <label for="amount">Amount:</label>
                                <input type="number" step="0.01" min="0" class="form-control" id="amount" name="amount" required>
                            </div>

                            <div class="form-group">
                                <label for="description">Description:</label>
                                <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
                            </div>

                            <div class="form-group text-center"> <!-- Add text-center class to center the button -->
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    </x-layout>