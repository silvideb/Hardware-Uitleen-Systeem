<x-base-layout>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Create Loan') }}</div>

                <div class="card-body">
                    <form action="{{ route('loans.store') }}" method="POST">
                        @csrf

                        <div class="form-group mb-3">
                            {{-- <label for="user_id">{{ __('User') }}</label>
                            <input type="hidden" name="user_id" value="{{ auth()->id() }}">
                            <input type="text" class="form-control" value="{{ auth()->user()->name }}" disabled> --}}
                        </div>

                        <div class="form-group mb-3">
                            <label for="hardware_id">{{ __('Hardware Item') }}</label>
                            <select name="hardware_id" class="form-control" required>
                                <option value="">{{ __('Select hardware item') }}</option>
                                @foreach($items as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group mb-3">
                            <label for="start_date">{{ __('Start Date') }}</label>
                            <input type="date" name="start_date" class="form-control" required>
                        </div>

                        <div class="form-group mb-3">
                            <label for="due_date">{{ __('Due Date') }}</label>
                            <input type="date" name="due_date" class="form-control" required>
                        </div>

                        <button type="submit" class="btn btn-primary">{{ __('Create Loan') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</x-base-layout>