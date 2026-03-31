<x-base-layout>

    <div class="container">
        <h1>Edit Loan</h1>

        <form action="{{ route('loans.update', $loan->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="user_id">User:</label>
                <select name="user_id" id="user_id" class="form-control">
                    @foreach($users as $user)
                    <option value="{{ $user->id }}" {{ $loan->user_id == $user->id ? 'selected' : '' }}>{{ $user->name }}</option>
                    @endforeach
                </select>

            <div class="form-group">
                <label for="hardware_item_id">Hardware Item:</label>
                <select name="hardware_item_id" id="hardware_item_id" class="form-control">
                    @foreach($hardwareItems as $item)
                    <option value="{{ $item->id }}" {{ $loan->hardware_item_id == $item->id ? 'selected' : '' }}>{{ $item->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="start_date">Start Date:</label>
                <input type="date" name="start_date" id="start_date" class="form-control" value="{{ $loan->start_date }}" required>
            </div>

            <div class="form-group">
                <label for="due_date">Due Date:</label>
                <input type="date" name="due_date" id="due_date" class="form-control" value="{{ $loan->due_date }}" required>
            </div>

            <div class="form-group">
                <label for="status">Status:</label>
                <select name="status" id="status" class="form-control">
                    <option value="active" {{ $loan->status == 'active' ? 'selected' : '' }}>Active</option>
                    <option value="returned" {{ $loan->status == 'returned' ? 'selected' : '' }}>Returned</option>
                    <option value="rejected" {{ $loan->status == 'rejected' ? 'selected' : '' }}>Rejected</option>
                    <option value="pending" {{ $loan->status == 'pending' ? 'selected' : '' }}>Pending</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Update Loan</button>
        </form>
    </div>

</x-base-layout>