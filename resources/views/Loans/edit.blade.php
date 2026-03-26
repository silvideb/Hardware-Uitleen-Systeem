<x-base-layout>

    <div class="container">
        <h1>Edit Loan</h1>

        <form action="{{ route('loans.update', $loan->id) }}" method="POST">
          @crsf
           @method('PUT')
            <div class="form-group">
                <label for="user_id">User:</label>
                <select name="user_id" id="user_id" class="form-control">
                    @foreach($users as $user)
                        <option value="{{ $user->id }}" {{ $loan->user_id == $user->id ? 'selected' : '' }}>{{ $user->name }}</option>
                        <option value="{{ $item->id }}" {{ $loan->item_id == $item->id ? 'selected' : '' }}>{{ $item->name }}</option>
                        <option value="active" {{ $loan->status == 'active' ? 'selected' : '' }}>Active</option>
                    @endforeach
                </select>

          

            
            <button type="submit" class="btn btn-primary">Update Loan</button>
        </form>
    </div>

</x-base-layout>